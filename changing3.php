<?php

if(isset($_POST['submit'])){

    $data_missing = array();

    if(empty($_POST['PID'])){
        $data_missing[] = 'P Id';
    } else {
        $id = trim($_POST['PID']);
    }
    
    if(empty($data_missing)){

        require_once('p1_connect.php');

        $query = "SELECT * FROM funding_org WHERE PID='$id' ";



         $response = @mysqli_query($dbc, $query);

         if($response){


          echo '<style>
            p{
                    font-size: 25px;
  font-family: "Segoe UI",Arial,sans-serif;
            }
            body{
                background-image: url("leaf.jpg");
   background-repeat: no-repeat;
  background-size: 100%;
            }

          </style>
          <p align="center"><b>Old Data</b></p>';

  
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

    echo '<html>
<head>
<title>Change</title>
<style>

  div{
    display: block;
    text-align: center;
  }

    form{
      display: inline-block;
      margin: auto auto;
      text-align: left;
     font-size: 20px;
  font-family: "Segoe UI",Arial,sans-serif;
            }
     .e{
        margin: 5px;
  padding-top: 8px;
  padding-left: 20px;
  padding-right: 20px;
       font-size: 15px;
  font-family: "Segoe UI",Arial,sans-serif;
  padding-bottom: 6px;
  text-align: center;
    display: block;
            }

  

</style>
</head>
<body> 
<div>
<form action="changed3.php" method="post" >
<b>Enter values to change the data</b>
<p>Enter Sl No:
<input  type="text" name="SlNo" size="2" value="" />
</p>
 
<p>Enter Name/Changed Name:
<input  type="text" name="Name" size="40" value="" />
</p>

<p>Enter P ID:
<input  type="text" name="PID" size="5" value="" />(Enter same Id as above)
</p>
 
<p>Enter Fund Size/Changed Fund Size:
<input type="text" name="Fund_size" size="10" value="" />
</p>

<p>Enter Expense Ratio/Changed Expense Ratio:
<input  type="text" name="Expense_Ratio" size="10" value="" />
</p>

<p>Enter Project Growth/Changed Project Growth:
<input  type="text" name="Project_Growth" size="10" value="" />
</p>
 
<p>
<input class="e" type="submit" name="submit" value="Make Changes" />
</p>
 
</form>
</div>';

  } else {

    echo "Couldn't issue database query<br />";
    echo mysqli_error($dbc);
  }

  

   mysqli_close($dbc);
    } else {

         trigger_error("Enter a values to change");


        foreach($data_missing as $missing){

            echo "$missing<br />";
        }
        


    }

}
echo '<p align="center"><a href="change3.php"><button class="e">Back</button></a></p>';
?>