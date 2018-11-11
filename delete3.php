<?php

  require_once('p1_connect.php');

  echo '<style>
            p{
                    font-size: 25px;
  font-family: "Segoe UI",Arial,sans-serif;
            }
            body{
                background-image: url("ring.jpg");
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
<form action="deleted3.php" method="post" align="center">
<b>Delete a Record</b>
<p><b>Enter Id to delete record:</b>
<input type="text" name="PID" size="5" value="" />
</p>

<p>
<input class="d" type="submit" name="submit" value="Delete" />
</p>
 
</form>
<p align="center">
<a href="home3.php"><button class="d">Back</button></a></p>


</body>
</html>';



mysqli_close($dbc);

?>