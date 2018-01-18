<?php
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = 'P@ssw0rd2016';
	$dbname = 'Inventario';
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
			mysqli_set_charset($conn, 'utf8');
?>
