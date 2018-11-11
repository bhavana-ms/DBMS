<html>

<head>

<title>Change Result</title>

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

    if(empty($_POST['Name'])){
        $data_missing[] = 'Name';
    } else{
        $name = trim($_POST['Name']);
    }

    if(empty($_POST['Organization'])){
        $data_missing[] = 'Organization';
    } else {
        $org = trim($_POST['Organization']);
    }

    if(empty($_POST['Project_name'])){
        $data_missing[] = 'Project Name';
    } else {
        $pname = trim($_POST['Project_name']);
    }

    if(empty($_POST['E_Id'])){
        $data_missing[] = 'E_Id';
    } else {
        $eid = trim($_POST['E_Id']);
    }

    
    if(empty($data_missing)){

        require_once('p1_connect.php');

        $query="UPDATE pioneers set Name=?, Organization=?, Project_name=?, E_Id=? where Id=? ";

    $stmt = mysqli_prepare($dbc, $query);


        mysqli_stmt_bind_param( $stmt, "sssss", $name, $org, $pname, $eid, $id);
     
     

      mysqli_stmt_execute($stmt);



         

        $affected_rows = mysqli_stmt_affected_rows($stmt);

         

        if($affected_rows == 1){

    
            $quer ="SELECT * from pioneers where Id= '$id'";
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
    <td align="left"><b>Id</b></td>
    <td align="left"><b>Name</b></td>
    <td align="left"><b>Organization</b></td>
    <td align="left"><b>Project Name</b></td>
    <td align="left"><b>E_Id</b></td>
    </tr>';

    while($row = mysqli_fetch_array($response)){

      echo '<tr><td align="left">' .
      $row['Id'] . '</td><td align="left">' .
      $row['Name'] . '</td><td align="left">' .
      $row['Organization'] . '</td><td align="left">' .
      $row['Project_name'] . '</td><td align="left">' . 
      $row['E_Id'] . '</td></tr>';
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
        <p  align="center"><a href="home1.php"><button>Back</button></a></p>';

        


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