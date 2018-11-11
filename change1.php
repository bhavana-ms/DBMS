<?php

	require_once('p1_connect.php');

	echo '<html>
<head>
<title>Change</title>
<style>
	.d{
		 font-size: 45px;
  font-family: "Segoe UI",Arial,sans-serif;
	}
	      body{
                background-image: url("leaf.jpg");
   background-repeat: no-repeat;
  background-size: 100%;
            }
            form{

		 font-size: 25px;
  font-family: "Segoe UI",Arial,sans-serif;
            }
            .e{
            	margin: 10px;
  padding-top: 8px;
  padding-left: 20px;
  padding-right: 20px;
       font-size: 15px;
  font-family: "Segoe UI",Arial,sans-serif;
  padding-bottom: 8px;
            }
</style>
</head>
<body>
<form action="changing1.php" method="post" align="center">
<b class="d">Change the data</b>
<p>Enter Id to change data:
<input type="text" name="Id" size="5" value="" />
</p>

<p>
<input class="e" type="submit" name="submit" value="Change" />
</p>
 
</form>
<p align="center">
<a href="home1.php"><button class="e">Back</button></a></p>


</body>
</html>';



mysqli_close($dbc);

?>