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

        $query = "SELECT * FROM pioneers WHERE Id='$id' ";



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
<form action="changed1.php" method="post" >
<b>Enter values to change the data</b>
<p>Id:
<input  type="text" name="Id" size="5" value="" />(Enter same Id as above)
</p>
 
<p>Enter Name/Changed Name:
<input  type="text" name="Name" size="20" value="" />
</p>

<p>Enter Organization/Changed Organization:
<input  type="text" name="Organization" size="30" value="" />
</p>
 
<p>Enter Project Name/changed Project Name:
<input type="text" name="Project_name" size="25" value="" />
</p>

<p>Enter Energy ID:
<input  type="text" name="E_Id" size="5" value="" />
</p>
 
<p align="center">
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
echo '<p align="center"><a href="change1.php"><button class="e">Back</button></a></p>';
?>