<?php
	$server = $_POST['Servidor'];
	include "mysql.php";
	$sql = 'DELETE FROM Hardware WHERE `Host name` ="'.$server.'"';
	if (mysqli_query($conn, $sql)) {
		echo "O servidor foi excluido";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	mysqli_close($conn);
?>
