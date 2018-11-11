<html>

<head>

<title>Add Project</title>

</head>
<body>

<?php

if(isset($_POST['submit'])){

   $data_missing = array();

    if(empty($_POST['Project_Name'])){
        $data_missing[] = 'Project Name';
    } else {
        $p_name = trim($_POST['Project_Name']);
    }

    if(empty($_POST['E_Id'])){
        $data_missing[] = 'Project Type';
    } else{
        $ptype = trim($_POST['E_Id']);
    }

    if(empty($_POST['Name'])){
        $data_missing[] = 'Name';
    } else {
        $name = trim($_POST['Name']);
    }

    if(empty($_POST['Email_Id'])){
        $data_missing[] = 'Email-Id';
    } else {
        $email = trim($_POST['Email_Id']);
    }

    if(empty($_POST['Phone'])){
        $data_missing[] = 'Phone';
    } else {
        $con = trim($_POST['Phone']);
    }

    if(empty($_POST['Year'])){
        $data_missing[] = 'Year';
    } else {
        $year = trim($_POST['Year']);
    }

    if(empty($_POST['Location'])){
        $data_missing[] = 'Location';
    } else {
        $loc = trim($_POST['Location']);
    }

    
    if(empty($data_missing)){

        require_once('p1_connect.php');

        $query = "INSERT INTO minor_projects (Project_Name, E_Id, Name,

        Email_Id, Phone, Year, Location) VALUES (?, ?, ?,

        ?, ?, ?, ?)";

        $stmt = mysqli_prepare($dbc, $query);
        mysqli_stmt_bind_param( $stmt, "sssssis",  $p_name, $ptype,  $name, $email, $con, $year, $loc);
        mysqli_stmt_execute($stmt);
       
        $affected_rows = mysqli_stmt_affected_rows($stmt);

          

        if($affected_rows == 1){

            

            echo '<style>
                p{
                     font-size: 35px;
  font-family: "Segoe UI",Arial,sans-serif;
                }

                       body{
                background-image: url("waters.jpg");
   background-repeat: no-repeat;
  background-size: 100%;
            }

            </style>
            <p align="center"><b>Student Entered</b></p>';
            $quer ="SELECT * from minor_projects where E_Id= '$ptype'";
            $response = @mysqli_query($dbc, $quer);

  if($response){
        
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

echo '<style>
            button{
                margin: 15px;
                padding-top: 10px;
                padding-left: 20px;
                padding-right: 20px;
                padding-bottom: 10px;
            }
        </style>
        <p  align="center"><a href="p6.php"><button>Back</button></a>';

 
?>

</body>

</html>
