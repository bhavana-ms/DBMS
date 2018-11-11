<?php
session_start();
  require_once('p1_connect.php');

  $query = "SELECT P_Id, Project_Name, E_Id, Name, Email_Id, Phone, Year, Location, Fund_Amt from minor_projects";
  $response = @mysqli_query($dbc, $query);
 
  if($response){
    echo '<!DOCTYPE html>
  <html lang="en">
  <head>
  <meta charset="UTF-8">
  <title>Your Ideas</title>
  
  <style>
nav a{
  background: #ffffff;
  background: rgba(255,255,255,0.5);
  color: #000000;
  display: inline-block;
  text-decoration: none;
  text-align: center;
  width: 100px;
  padding: 10px;
  margin: 40px;
  border-radius: 5px;
  font-size: 20px;
  font-family: "Segoe UI",Arial,sans-serif;
}

a:visited{
  color: #4a235a;
}

header{
  background: #fdfefe;
  background-image: url("a.jpg");
  background-repeat: no-repeat;
  background-size: 100%;
  font-family: "Segoe UI",Arial,sans-serif;
 
}
.active{
  background-color: #ffffff;
  color: blue;
}
.header{
  text-align:center;
  margin:5px;
  font-size: 45px;
}

h1{
  font-variant: small-caps;
  text-align: center;
  color: #FFFFFF;
  font-size: 40px;
  height: 1px;
  font-family: "Segoe UI",Arial,sans-serif;
}

</style> 
</head>

<body>
  <header>
  <p class="header"><b>Submit Your Ideas and Projects</b></p>
  <nav><b>
  <a href="main.html">Home</a>
  <a href="p2.php">Types</a>
  <a href="p3.php">Pioneers</a>
  <a href="p4.php">Projects</a>
  <a href="p5.php">Project Funds</a>
  <a href="p6.php"  class="active">YOUR Ideas</a>
  </b>
  </nav>

</header>
</body>

</html>';

echo '<style>
 
 table{
  margin: 0 auto;
  align: center;
  line-height: 150%;
  width: 80%;
  padding: 15px;
  font-size: 20px;
  font-family: "Segoe UI",Arial,sans-serif;
  border-color: #ffffff;
  border-style: solid-black;
}

th{
  border-color: #000000;
  border-style: solid;
  border-bottom-width: 6px;
  border-radius: 4px 4px 0 0;
 
  font-size: 20px;
  padding: 8px;
  color: #ffffff;
  text-shadow: 3px 2px #000000;
 }

tr{
  padding: 10px;
  font-size: 16px;
  color: #000000;
  background: #D9E1E3    ;
  opacity: 0.9;
}

tr:hover{
  opacity: 1;
}

tr:first-child{
  opacity: 1;
}
</style>

<table align="center" cellspacing="5" cellpadding="8" border-style="20px solid" border-color="black" >
    <tr>
    <td align="left"><b>P_Id</b></td>
    <td align="left"><b>Project Name</b></td>
    <td align="left"><b>Type</b></td>
    <td align="left"><b>Name</b></td>
    <td align="left"><b>Email-Id</b></td>
    <td align="left"><b>Phone No.</b></td>
    <td align="left"><b>Year</b></td>
    <td align="left"><b>Location</b></td>
    <td align="left"><b>Fund Amount</b></td>
    </tr>';

    while($row = mysqli_fetch_array($response)){

      echo '<tr><td align="left">' .
      $row['P_Id'] . '</td><td align="left">' .
      $row['Project_Name'] . '</td><td align="left">' .
      $row['E_Id'] . '</td><td align="left">' .
      $row['Name'] . '</td><td align="left">' .
      $row['Email_Id'] . '</td><td align="left">' . 
      $row['Phone'] . '</td><td align="left">' . 
      $row['Year'] . '</td><td align="left">' . 
      $row['Location'] . '</td><td align="left">' .
      $row['Fund_Amt'] . '</td></tr>';
    }

    echo '</table>';
  } else {

    echo "Couldn't issue database query<br />";
    echo mysqli_error($dbc);
    echo "gi";
  }

 
  
  mysqli_close($dbc);

?>
<?php
 ob_start();
 
require_once('p1_connect.php');
 
 
 if( !isset($_SESSION['user']) ) {
  header("Location: index.php");
  exit;
 }

 $res=@mysqli_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
 $userRow=@mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - <?php echo $userRow['userEmail']; ?></title>
<style>
      button{
        
        padding-top: 10px;
        padding-left: 5px;
        padding-right: 5px;
        padding-bottom: 10px;
       
      }
    </style>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <p  align="center">
  <a href="add_projects.php"><button>Submit my Project</button></a>
  <ul class="dropdown-menu" align="center">
                <a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a>
              </ul>
         
      
      </div>
    </nav> 
  
 

 
    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    
</body>
</html>
<?php ob_end_flush(); 

?>