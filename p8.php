<?php

  require_once('p1_connect.php');

  $query = "SELECT Name, P_Id, Phone, Email_Id, Amount from mini_funds";
  $response = @mysqli_query($dbc, $query);

  if($response){

    echo '<style>
            div{
                 font-size: 35px;
  font-family: "Segoe UI",Arial,sans-serif;
  

            }
            body{
    background-image: url("fund.jpg");
     background-repeat: no-repeat;
  background-size: 100%;
}


            </style>
            <div><p align="center"><b>Our Amazing Funders!</b></p></div>';





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
    <td align="left"><b>Name</b></td>
    <td align="left"><b>Project Id</b></td>
    <td align="left"><b>Phone</b></td>
    <td align="left"><b>Email-Id</b></td>
    <td align="left"><b>Amount</b></td>
    </tr>';

    while($row = mysqli_fetch_array($response)){

      echo '<tr><td align="left">' .
      $row['Name'] . '</td><td align="left">' .
      $row['P_Id'] . '</td><td align="left">' .
      $row['Phone'] . '</td><td align="left">' .
      $row['Email_Id'] . '</td><td align="left">' . 
      $row['Amount'] . '</td></tr>';
    }

    echo '</table>';
  } else {

    echo "Couldn't issue database query<br />";
    echo mysqli_error($dbc);
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



  mysqli_close($dbc);

?>