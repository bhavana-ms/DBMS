<html>

<head>

<title>Altered</title>

</head>
<body>

<?php

if(isset($_POST['submit'])){

    $data_missing = array();

    if(empty($_POST['Id'])){
        $data_missing[] = 'Id';
    } else {
        $id = trim($_POST['Id']);
    }

    
    
    if(empty($data_missing)){

        require_once('p1_connect.php');

        $query="DELETE FROM pioneers where Id=? ";

    $stmt = mysqli_prepare($dbc, $query);


        mysqli_stmt_bind_param( $stmt, "s", $id);
     
     

      mysqli_stmt_execute($stmt);



         

        $affected_rows = mysqli_stmt_affected_rows($stmt);

         

        if($affected_rows == 1){

            echo '<style>
            p{
                    font-size: 45px;
  font-family: "Segoe UI",Arial,sans-serif;
            }
            body{
                background-image: url("water.jpg");
   background-repeat: no-repeat;
  background-size: 100%;
            }
            

            .d{
    margin: 15px;
    padding-top: 5px;
    padding-left: 20px;
    padding-right: 20px;
             font-size: 15px;
  font-family: "Segoe UI",Arial,sans-serif;
  padding-bottom: 5px;
}

          </style><p align="center"><b>Record deleted successfully</b></p>';
            mysqli_stmt_close($stmt);

            mysqli_close($dbc);


        } else {

            echo 'Error Occurred<br />';

            echo mysqli_error();

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);

        }

    } else {

         trigger_error("Enter Id to delete");


        foreach($data_missing as $missing){

            echo "$missing<br />";
        }

    }

}


 echo '<p align="Center"><a href="home1.php"><button class="d">Back</button></a></p>';

?>

</body>

</html>
