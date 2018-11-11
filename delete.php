<?php

	require_once('p1_connect.php');

	echo '<style>
            p{
                    font-size: 25px;
  font-family: "Segoe UI",Arial,sans-serif;
            }
            body{
                background-image: url("water.jpg");
   background-repeat: no-repeat;
  background-size: 100%;
            }
            form{
            	     font-size: 45px;
  font-family: "Segoe UI",Arial,sans-serif;
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

          </style>';

	echo '<html>
<head>
<title>Delete</title>
</head>
<body>
<form action="deleted.php" method="post" align="center">
<b>Delete a Record</b>
<p>Enter Id to delete record:
<input type="text" name="Id" size="5" value="" />
</p>

<p>
<input class="d" type="submit" name="submit" value="Delete" />
</p>
 
</form>
<p align="center">
<a href="home1.php"><button class="d">Back</button></a></p>


</body>
</html>';



mysqli_close($dbc);

?>