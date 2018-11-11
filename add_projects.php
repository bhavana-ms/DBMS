<?php

	require_once('p1_connect.php');
	$query = "SELECT * FROM Energy_Id";
	$response = @mysqli_query($dbc, $query);
 
	if($response){
		
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
		<td align="left"><b>Eid</b></td>
		<td align="left"><b>Energy</b></td>
		</tr>';

		while($row = mysqli_fetch_array($response)){

			echo '<tr><td align="left">' .
			$row['E_Id'] . '</td><td align="left">' .
			$row['Energy'] . '</td></tr>';
		}

		echo '</table>';
	} else {

		echo "Couldn't issue database query<br />";
		echo mysqli_error($dbc);
	}
	mysqli_close($dbc);


?>
<html>
<head>
<title>Your Projects</title>

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

  body{
	background-image: url("sun2.jpg");
	 background-repeat: no-repeat;
  background-size: 100%;
}


</style>

</head>
<body>
<div>
<form action="project_added.php" method="post">
<p align="center"><b>Submit Your Projects</b></p>
<p>Project Name:
<input type="text" name="Project_Name" size="30" value="" />
</p>
 
<p>Project Type Id:
<input type="text" name="E_Id" size="5" value="" />(refer above table for Energy type and it's Id)
</p>

<p>Name:
<input type="text" name="Name" size="20" value="" />
</p>
 
<p>Email-Id:
<input type="text" name="Email_Id" size="25" value="" />
</p>

<p>Contact Number:
<input type="text" name="Phone" size="10" value="" />
</p>
 
<p>Year:
<input type="text" name="Year" size="4" value="" />
</p>
 
<p>Location:
<input type="text" name="Location" size="15" value="" />
</p>

<p align="center">
<input  class="e" type="submit" name="submit" value="Submit" />
</p>
 
</form>
</div>
<p align="center">
<a href="p6.php"><button class="e">Back</button></a></p>


</body>
</html>