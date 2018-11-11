<?php

	require_once('p1_connect.php');
	
	$query = 'CALL displayEnergy_ID()'; //Calling the stored procedure 'displayEnergy_ID'
	
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
		<td align="center"><b>Eid</b></td>
		<td align="center"><b>Energy</b></td>
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
<title>Search</title>
<style>

body{
	background-image: url("grass.jpg");
	 background-repeat: no-repeat;
  background-size: 100%;
}

form{
			 font-size: 15px;
  font-family: "Segoe UI",Arial,sans-serif;
}
.c{
	font-size: 20px;
}

.d{
	margin: 15px;
	padding-top: 5px;
	padding-left: 20px;
	padding-right: 20px;
			 font-size: 15px;
  font-family: "Segoe UI",Arial,sans-serif;
  padding-bottom: 5px;
}
}


</style>
</head>
<body>
<form action="display.php" method="post" align="center">
<h1><b>Search by Energy Type</b></h1>
<p class="c">Energy Type:
<input class="d" type="text" name="E_Id" size="5" value="" />
</p>

<p>
<input  class="d" type="submit" name="submit" value="Search" />
</p>
 
</form>
<p align="center" >
<a href="p2.php"><button class="d">Back</button></a></p>


</body>
</html>