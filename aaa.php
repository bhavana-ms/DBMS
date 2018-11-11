if(empty($_POST['Project_Name'])){
        $data_missing[] = 'Project Name';
    } else {
        $name= trim($_POST['Project_Name']);
    }

    if(empty($_POST['E_Id'])){
        $data_missing[] = 'E_Id';
    } else{
        $eid = trim($_POST['E_Id']);
    }

    if(empty($_POST['PID'])){
        $data_missing[] = 'P Id';
    } else {
        $id = trim($_POST['PID']);
    }

    if(empty($_POST['Product'])){
        $data_missing[] = 'Product';
    } else {
        $pro = trim($_POST['Product']);
    }

    if(empty($_POST['Year_started'])){
        $data_missing[] = 'Year';
    } else {
        $year = trim($_POST['Year_started']);
    }

      if(empty($_POST['Location'])){
        $data_missing[] = 'Location';
    } else {
        $loc = trim($_POST['Location']);
    }



      $query="UPDATE major_projects set Project_name=?, E_Id=?, Product=?, Year_started=?, Location=? where PID=? ";

    $stmt = mysqli_prepare($dbc, $query);


        mysqli_stmt_bind_param( $stmt, "sssiss", $name, $eid, $pro, $year, $loc, $id);
     
     

      mysqli_stmt_execute($stmt);



         

        $affected_rows = mysqli_stmt_affected_rows($stmt);

         

        if($affected_rows == 1){

            echo 'Project Information Changed';
            $quer ="SELECT * from major_projects where PID= '$id'";
            $response = @mysqli_query($dbc, $quer);

  
         $response = @mysqli_query($dbc, $quer);






<?php

  require_once('p1_connect.php');

  $query = "SELECT P_Id, Project_Name, E_Id, Name, Email_Id, Phone, Year, Location, Fund_Amt from minor_projects";
  $response = @mysqli_query($dbc, $query);
 
  if($response){

    echo '<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Types of Clean Energy</title>
  <style>
    nav a{
  background: #ffffff;
  background: rgba(255,255,255,0.3);
  color: #000000;
  display: inline-block;
  text-decoration: none;
  text-align: center;
  width: 100px;
  padding: 10px;
  margin: 40px;
  border-radius: 5px;
  font-size: 20px;
}
a:visited{
  color: #4a235a;
}
header{
  background: #fdfefe;
  background-image: url("https://pbs.twimg.com/media/CbAwXY-UsAAaR0c.jpg");
  background-repeat: no-repeat;
  background-size: 100%;
}
.active{
  background-color: white;
  color: blue;
}
h1{
  text-align:center;
  margin:15px;
}

  </style> 
</head>
<body>
  <header>
  <h1>Submit Your Project and Ideas!</h1>
  <nav>
  <a href="main.html">Home</a>
  <a href="p2.php">Types</a>
  <a href="p3.php">Pioneers</a>
  <a href="p4.php">Projects</a>
  <a href="p5.php">Project Funds</a>
  <a href="p6.php" class="active">YOUR Ideas</a>
  </nav>

</header>

</footer>
</body>

    </html>';
    
    echo '<table align="center" cellspacing="5" cellpadding="8">
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
  }

  



  mysqli_close($dbc);

?>
<?php
 ob_start();
 session_start();
require_once('../p1_connect.php');
 
 
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

</head>
<body>

 <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        
        
              
     
              <ul class="dropdown-menu">
                <a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a>
              </ul>
           
          <a href="add_projects.php"><button>Submit my Project</button></a>
      
      </div>
    </nav> 

 
    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    
</body>
</html>
<?php ob_end_flush(); 





?>