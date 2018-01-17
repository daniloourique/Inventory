<?php
session_start();
$group = $_SESSION['group'];

	if (!isset($_SESSION['user'])) {
		header("Location: login.html");
		exit();
	}

?>
<!doctype html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="Danilo Ourique">
		<title>Header</title>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script>window.jQuery || document.write('<script src="https://getbootstrap.com/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
		<script src="https://getbootstrap.com/assets/js/vendor/popper.min.js"></script>
		<script src="https://getbootstrap.com/dist/js/bootstrap.min.js"></script>
		<!-- Bootstrap core CSS -->
		<link href="https://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
		<!-- Custom styles for this template -->

	</head>

	<body>

		<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
			<a class="navbar-brand" href="index.php">AGCO Inventory</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarsExampleDefault">
				<ul class="navbar-nav mr-auto">

					<li class="nav-item">
					<?php 

              if($group == 1) {
					?>
						<a class="nav-link" href="aprovacao.php">Aprova&ccedil;&atilde;o</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="consultar.php">Consultar</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Edi&ccedil;&atilde;o</a>
						<div class="dropdown-menu" aria-labelledby="dropdown01">
							<a class="dropdown-item" href="form.php">Adicionar</a>
							<a class="dropdown-item" href="alterar.php">Alterar</a>
							<a class="dropdown-item" href="remover.php">Remover</a>
            </div>
          </li>
          <?php } else {?>
            <a class="nav-link" href="form_solicitacao.php">Solicitar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="minha_solicitacao.php">Minhas Solicitações</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="consultar.php">Consultar Baseline</a>
          </li>
          <?php }?>
				</ul>
			<div style="float: right;color: #ffffff">User <a href="logout.php" style="color: #ffffff"><?php echo $_SESSION['user'];?></a></div>
			</div>
		</nav>

		
		<br><br><br>