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
<body>
<div style="float: right;">User <a href="logout.php" target=_top><?php echo $_SESSION['user'];?></a></div>
<Center><h1>Inventário de Equipamentos da AGCO</h1>
Deseja:<br>
<a href="aprovacao.php" target="Meio">Aprovação</a>
<a href="consultar.html" target="Meio">Consultar</a>
<a href="adicionar.html" target="Meio">Adicionar</a>
<a href="alterar.html" target="Meio">Alterar</a>
<a href="excluir.html" target="Meio">Excluir</a>

</body>
</html>
