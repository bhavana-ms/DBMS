<?php

	require_once('p1_connect.php');

	$query = "SELECT E_Id, Energy, Source, Machinery, Usuage_of_Sources from clean_energy";
	$response = @mysqli_query($dbc, $query);
 
	if($response){
		
		echo '<!DOCTYPE html>
	<html lang="en">
	<head>
	<meta charset="UTF-8">
	<title>Types of Clean Energy</title>
	
	<style>
nav a{
  background: #ffffff;
  background: rgba(255,255,255,0.5);
  color: #000000;
  display: inline-block;
  text-decoration: none;
  text-align: center;
  width: 100px;
  padding: 10px;
  margin: 40px;
  border-radius: 5px;
  font-size: 20px;
  font-family: "Segoe UI",Arial,sans-serif;
}

a:visited{
  color: #4a235a;
}

header{
  background: #fdfefe;
  background-image: url("a.jpg");
  background-repeat: no-repeat;
  background-size: 100%;
  font-family: "Segoe UI",Arial,sans-serif;
 
}
.active{
  background-color: #ffffff;
  color: blue;
}
.header{
	text-align:center;
	margin:5px;
	font-size: 45px;
}

h1{
  font-variant: small-caps;
  text-align: center;
  color: #FFFFFF;
  font-size: 40px;
  height: 1px;
  font-family: "Segoe UI",Arial,sans-serif;
}

</style> 
</head>

<body>
	<header>
	<p class="header"><b>Types of Clean Energy</b></p>
	<nav><b>
	<a href="main.html">Home</a>
	<a href="p2.php" class="active">Types</a>
	<a href="p3.php">Pioneers</a>
	<a href="p4.php">Projects</a>
	<a href="p5.php">Project Funds</a>
	<a href="p6.php">YOUR Ideas</a>
	</b>
	</nav>

</header>
</body>

</html>';


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
		<td align="center"><b>Eid</b></td>
		<td align="center"><b>Energy</b></td>
		<td align="center"><b>Source</b></td>
		<td align="center"><b>Machinery</b></td>
		<td align="center"><b>Usuage of Sources</b></td>
		</tr>';

		while($row = mysqli_fetch_array($response)){

			echo '<tr><td align="left">' .
			$row['E_Id'] . '</td><td align="left">' .
			$row['Energy'] . '</td><td align="left">' .
			$row['Source'] . '</td><td align="left">' .
			$row['Machinery'] . '</td><td align="left">' .
			$row['Usuage_of_Sources'] . '</td></tr>';
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
			}
		</style>
		<p  align="center">
		<a href="search.php"><button>Search</button</a>
		</p>';

	mysqli_close($dbc);

?>