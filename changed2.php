<html>

<head>

<title>Change Result</title>

</head>
<body>

<?php

if(isset($_POST['submit'])){

    $data_missing = array();

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

    
    if(empty($data_missing)){

        require_once('p1_connect.php');

        
      $query="UPDATE major_projects set Project_name=?, E_Id=?, Product=?, Year_started=?, Location=? where PID=? ";


    $stmt = mysqli_prepare($dbc, $query);


        
        mysqli_stmt_bind_param( $stmt, "sssiss", $name, $eid, $pro, $year, $loc, $id);
     
     
     

      mysqli_stmt_execute($stmt);



         

        $affected_rows = mysqli_stmt_affected_rows($stmt);

         

        if($affected_rows == 1){

    
            $quer ="SELECT * from major_projects where PID= '$id'";
            $response = @mysqli_query($dbc, $quer);

  
         $response = @mysqli_query($dbc, $quer);

         if($response){
  echo '<style>
            p{
                    font-size: 45px;
  font-family: "Segoe UI",Arial,sans-serif;
            }
      body{
          background-image: url("leaf2.jpg");
          background-repeat: no-repeat;
          background-size: 100%;
            }

          </style>
          <p align="center"><b>Pioneer Data Changed</b></p>';
  
    echo '<style>
    table{
       font-size: 15px;
  font-family: "Segoe UI",Arial,sans-serif;
    }
    th{
  border-color: #000000;
  border-style: solid;


 
  font-size: 15px;
 
  color: #ffffff;

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
    <td align="center"><b>Project Name</b></td>
    <td align="center"><b>Type</b></td>
    <td align="center"><b>PID</b></td>
    <td align="center"><b>Product</b></td>
    <td align="center"><b>Year Started</b></td>
    <td align="center"><b>Location</b></td>
    </tr>';

    while($row = mysqli_fetch_array($response)){

      echo '<tr><td align="left">' .
      $row['Project_Name'] . '</td><td align="left">' .
      $row['E_Id'] . '</td><td align="left">' .
      $row['PID'] . '</td><td align="left">' .
      $row['Product'] . '</td><td align="left">' .
      $row['Year_started'] . '</td><td align="left">' . 
      $row['Location'] . '</td></tr>';
    }

    echo '</table>';

       echo '<style>
            button{
                margin: 15px;
                padding-top: 10px;
                padding-left: 20px;
                padding-right: 20px;
                padding-bottom: 10px;
            }
        </style>
        <p  align="center"><a href="home2.php"><button>Back</button></a></p>';

        


}else{
    echo "fail";
}

           
           

            mysqli_stmt_close($stmt);


            mysqli_close($dbc);


        } else {

             echo 'Error Occurred<br />';

            echo mysqli_error();

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);

        }

    } else {

         trigger_error("You need to enter all the data to proceed");


        foreach($data_missing as $missing){

            echo "$missing<br />";
        }

    }

}


 

?>



</body>

</html>
