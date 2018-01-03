<?php
session_start();
$group = $_SESSION['group'];
	if (!isset($_SESSION['user'])) {
		header("Location: login.html");
		exit();
	}
	if($group > 1) {
		header("Location: login.html");
		exit();	
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/>
	<title>Inventario AGCO</title>
</head>
<frameset rows="20%,*" frameborder="1" framespacing="2">
<frame src="main.php" name="Superior" noresize scrolling="no">
<frame name="Meio">
</frameset>
<body>
</body>
</html>
