<?php

	require_once('p1_connect.php');

	echo '<html>
<head>
<title>Alter</title>
</head>
<body>
<form action="altering.php" method="post">
<b>Fund a Project</b>
<p>Enter Id to change data:
<input type="text" name="Id" size="5" value="" />
</p>

<p>
<input type="submit" name="submit" value="Change" />
</p>
 
</form>
<p>
<a href="home1.php"><button>Back</button></a></p>


</body>
</html>';



mysqli_close($dbc);

?>