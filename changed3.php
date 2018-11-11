<html>

<head>

<title>Change Result</title>

</head>
<body>

<?php

if(isset($_POST['submit'])){

    $data_missing = array();

    if(empty($_POST['SlNo'])){
        $data_missing[] = 'Sl No';
    } else {
        $sn = trim($_POST['SlNo']);
    }

    if(empty($_POST['Name'])){
        $data_missing[] = 'Name';
    } else{
        $name = trim($_POST['Name']);
    }

    if(empty($_POST['PID'])){
        $data_missing[] = 'P ID';
    } else {
        $id = trim($_POST['PID']);
    }

    if(empty($_POST['Fund_size'])){
        $data_missing[] = 'Fund Size';
    } else {
        $fund = trim($_POST['Fund_size']);
    }

    if(empty($_POST['Expense_Ratio'])){
        $data_missing[] = 'Expense Ratio';
    } else {
        $ex = trim($_POST['Expense_Ratio']);
    }


     if(empty($_POST['Project_Growth'])){
        $data_missing[] = 'Project Growth';
    } else {
        $pro = trim($_POST['Project_Growth']);
    }

    
    if(empty($data_missing)){

        require_once('p1_connect.php');

        $query="UPDATE funding_org set SlNo=?, Name=?, Fund_size='$fund', Expense_Ratio='$ex', Project_Growth='$pro' where PID=? ";

    $stmt = mysqli_prepare($dbc, $query);


        mysqli_stmt_bind_param( $stmt, "iss", $sn, $name, $id);
     
     

      mysqli_stmt_execute($stmt);



         

        $affected_rows = mysqli_stmt_affected_rows($stmt);

         

        if($affected_rows == 1){

    
            $quer ="SELECT * from funding_org where PID= '$id'";
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
    <td align="left"><b>Sl. No.</b></td>
        <td align="left"><b>Name</b></td>
        <td align="left"><b>PID</b></td>
        <td align="left"><b>Fund Size ($mil)</b></td>
        <td align="left"><b>Expense Ratio (%)</b></td>
        <td align="left"><b>Project Growth (%)</b></td>
        </tr>';

        while($row = mysqli_fetch_array($response)){

            echo '<tr><td align="left">' .
            $row['SlNo'] . '</td><td align="left">' .
            $row['Name'] . '</td><td align="left">' .
            $row['PID'] . '</td><td align="left">' .
            $row['Fund_size'] . '</td><td align="left">' .
            $row['Expense_Ratio'] . '</td><td align="left">' . 
            $row['Project_Growth'] . '</td></tr>';
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
        <p  align="center"><a href="home3.php"><button>Back</button></a></p>';

        


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
