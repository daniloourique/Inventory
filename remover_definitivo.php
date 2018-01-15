<?php
	$server = $_POST['servidor_excluir'];
	include "mysql.php";
	$sql = 'DELETE FROM Hardware WHERE `Host name` ="'.$server.'"';
	if (mysqli_query($conn, $sql)) {
		mysqli_close($conn);
		?>
		<!DOCTYPE html>
		<html>
		<head>
			<title></title>
		<script type="text/javascript">
				alert("Servidor Removido com Successo!");
				window.location.href='index.php';
		</script>
		</head>
		<body>

		</body>
		</html>
		<?php
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		mysqli_close($conn);
	}

?>
