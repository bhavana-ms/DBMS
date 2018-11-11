<?php

	require_once('p1_connect.php');

	if(isset($_POST['submit'])){

    $data_missing = array();

    if(empty($_POST['Name'])){
        $data_missing[] = 'Name';
    } else {
        $name = trim($_POST['Name']);
    }

    if(empty($_POST['P_Id'])){
        $data_missing[] = 'Project Type';
    } else{
        $ptype = trim($_POST['P_Id']);
    }

    if(empty($_POST['Phone'])){
        $data_missing[] = 'Phone';
    } else {
        $ph = trim($_POST['Phone']);
    }

    if(empty($_POST['Email_Id'])){
        $data_missing[] = 'Email-Id';
    } else {
        $email = trim($_POST['Email_Id']);
    }

    if(empty($_POST['Amount'])){
        $data_missing[] = 'Amount';
    } else {
        $amt = trim($_POST['Amount']);
    
    }
    
    if(empty($data_missing)){

        require_once('p1_connect.php');

        $query = "INSERT INTO mini_funds (Name, P_Id, Phone,

        Email_Id, Amount) VALUES (?, ?, ?,

        ?, ?)";

         

        $stmt = mysqli_prepare($dbc, $query);


        mysqli_stmt_bind_param( $stmt, "siisi",  $name, $ptype,  $ph, $email, $amt);
     

        mysqli_stmt_execute($stmt);
        $affected_rows = mysqli_stmt_affected_rows($stmt);

         

        if($affected_rows == 1){

            echo '<style>
            div{
                 font-size: 35px;
  font-family: "Segoe UI",Arial,sans-serif;
  padding-top: 450px;
  padding-left: 350px;
  text-color: white;
            }

            .f{
                padding-top: 0px;
            }
            body{
    background-image: url("nature.jpg");
     background-repeat: no-repeat;
  background-size: 100%;
}

        .j{
            padding-top: 5px;
  padding-left: 20px;
  padding-right: 20px;
  padding-bottom: 5px;
       font-size: 15px;
  font-family: "Segoe UI",Arial,sans-serif;
        }

            </style>
            <div><p align="center"><b>Thank You for funding a Clean Energy Project! :)</b></p></div>';
           
            echo '<div class="f"><p align="center"><a href="p8.php"><button class="j">View</button></a></p></div>';

            mysqli_stmt_close($stmt);

          


        } else {

            echo 'Error Occurred<br />';

            echo mysqli_error();

            mysqli_stmt_close($stmt);

        }

    } else {

         trigger_error("You need to enter all the data to proceed");


        foreach($data_missing as $missing){

            echo "$missing<br />";
        }

   		}
   	}


   //	$query="UPDATE minor_projects set Fund_Amt=(Fund_Amt+?) where P_Id=? ";

   //	$stmt = mysqli_prepare($dbc, $query);


       // mysqli_stmt_bind_param( $stmt, "is",  $amt, $ptype);
     
     

     // mysqli_stmt_execute($stmt);


mysqli_close($dbc);

?>