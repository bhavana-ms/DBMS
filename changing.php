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
  echo '<table align="center" cellspacing="5" cellpadding="8">
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
      $row['E_Id'] . '</td><td align="left">';
      echo '</tr>';
    }

    echo '</table>';

    echo '<form action="altered.php" method="post">
<b>Submit Your Projects</b>
<p>Id:
<input type="text" name="Id" size="5" value="" />(Enter same Id as above)
</p>
 
<p>Enter Name/Changed Name:
<input type="text" name="Name" size="20" value="" />
</p>

<p>Enter Organization/Changed Organization:
<input type="text" name="Organization" size="30" value="" />
</p>
 
<p>Enter Project Name/changed Project Name:
<input type="text" name="Project_name" size="25" value="" />
</p>

<p>Enter Energy ID:
<input type="text" name="E_Id" size="5" value="" />
</p>
 
<p>
<input type="submit" name="submit" value="Make Changes" />
</p>
 
</form>';

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
echo '<a href="home1.php"><button>Back</button></a>';
?>