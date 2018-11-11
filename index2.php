<?php
 ob_start();
 session_start();
require_once('p1_connect.php');
 

 if ( isset($_SESSION['user'])!="" ) {
  header("Location: home2.php");
  exit;
 }
 
 $error = false;
 
 if( isset($_POST['btn-login']) ) { 

  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);

  
  if(empty($email)){
   $error = true;
   $emailError = "Please enter your email address.";
  } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  }
  
  if(empty($pass)){
   $error = true;
   $passError = "Please enter your password.";
  }
  
 
  if (!$error) {
   
   $password = hash('sha256', $pass); 
  
   $res=@mysqli_query($dbc, "SELECT userId, userName, userPass FROM users1 WHERE userEmail='$email'");
   $row=@mysqli_fetch_array($res);
   $count = @mysqli_num_rows($res); 
   
   if( $count == 1 && $row['userPass']==$password ) {
    $_SESSION['user'] = $row['userId'];
    header("Location: home2.php");
   } else {
    $errMSG = "Incorrect Information, Try again...";
   }
    
  }
  
 }
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Login</title>
<style>
  .container{
                    font-size: 25px;
  font-family: "Segoe UI",Arial,sans-serif;
  }

  .form-group{
    font-size: 30px;
     font-family: "Segoe UI",Arial,sans-serif;
   }
   .l{
           font-size: 25px;
  font-family: "Segoe UI",Arial,sans-serif;
   }
   body{
                background-image: url("sky.jpg");
   background-repeat: no-repeat;
  background-size: 100%;
}

</style>
</head>
<body>
 <p align="center" class="l">Only Administrator can Change the data</p>

<div class="container" align="center">

 <div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    
     <div class="col-md-12">
        
         <div class="form-group">
             <h3 class="">Administrator Sign-In</h3>
            </div>
        
         <div class="form-group">
             <hr />
            </div>
            
            <?php
   if ( isset($errMSG) ) {
    
    ?>
    <div class="form-group">
             <div class="alert alert-danger">
    <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
             </div>
                <?php
   }
   ?>
            
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
             <input type="email" name="email" class="form-control" placeholder="Admin Email" value=" " maxlength="40" />
                </div>
                <span class="text-danger">  </span>
            </div>
            
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
             <input type="password" name="pass" class="form-control" placeholder="Admin Password" maxlength="15" />
                </div>
                <span class="text-danger"></span>
            </div>
            
            <div class="form-group">
             <hr />
            </div>
            
            <div class="form-group">
             <button type="submit" class="btn btn-block btn-primary" name="btn-login">Sign In</button>
            </div>
            
            <div class="form-group">
             <hr />
            </div>
 
           
        </div>
   
    </form>
    <a href="p4.php"><button>Back</button></a>
    </div> 

</div>

</body>
</html>
<?php ob_end_flush(); ?>