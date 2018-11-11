<?php

  require_once('p1_connect.php');

  $query = "SELECT Name, P_Id, Phone, Email_Id, Amount from mini_funds";
  $response = @mysqli_query($dbc, $query);

  if($response){
  echo '<table align="center" cellspacing="5" cellpadding="8">
    <tr>
    <td align="left"><b>Name</b></td>
    <td align="left"><b>Project Name</b></td>
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
      $row['Amount'] . '</td><td align="left">';
      echo '</tr>';
    }

    echo '</table>';
  } else {

    echo "Couldn't issue database query<br />";
    echo mysqli_error($dbc);
  }

  echo '<a href="p6.php"><button>Back</button></a>';



  mysqli_close($dbc);

?>