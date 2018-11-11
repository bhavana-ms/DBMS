<?php

	require_once('p1_connect.php');

	echo '<html>
<head>
<title>Fund A Project</title>

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
  padding-bottom: 10px;
       font-size: 15px;
  font-family: "Segoe UI",Arial,sans-serif;
  padding-bottom: 6px;
  text-align: center;
    display: block;
            }

  body{
	background-image: url("rain.jpg");
	 background-repeat: no-repeat;
  background-size: 100%;
}


</style>
</head>
<body>
<div>
<form action="updated.php" method="post">
<p align="center"><b>Fund a Project</b></p>
<p>Name:
<input type="text" name="Name" size="25" value="" />
</p>
 
<p>Project Id:
<input type="text" name="P_Id" size="5" value="" />
</p>

<p>Phone:
<input type="text" name="Phone" size="10" value="" />
</p>
 
<p>Email-Id:
<input type="text" name="Email_Id" size="25" value="" />
</p>

<p>Amount:
<input type="text" name="Amount" size="7" value="" />
</p>

<p align="center">
<input class="e" type="submit" name="submit" value="Submit" />
</p>
 
</form>
</div>
<p  align="center">
<a href="p6.php"><button class="e">Back</button></a></p>


</body>
</html>';



mysqli_close($dbc);

?>