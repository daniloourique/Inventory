<?php		
	include "mysql.php";
	$server = '%';
	$sql = 'SELECT * FROM Hardware WHERE `Host Name` like "'.$server.'"';
	$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
	<title>AGCO Inventory</title>
</head>
<body>
<?php include_once 'partials/header.php' ?>
<main role="main" class="container">
<br><br>
<form action="remover_definitivo.php" method="post">
	<div class="modal-body">
		<div class="form-group">
			<center>
			<span style="display: inline-block;">
				<label for="message-text" class="col-form-label">Informe o Servidor</label>
				<select name="servidor_excluir" class="form-control" style="width: 200px;" required>
					<option value="">Selecione</option>
					<?php
						while ($row = mysqli_fetch_array($result)) { 
					?>
					<option value="<?php echo $row['Host Name']?>"><?php echo $row["Host Name"]?></option>
						<?php 
					
					}
					mysqli_close($conn);
				?>
				</select>
			</span>
		</div>
		<div class="form-group">
			<center>
			<button type="reset" onclick="window.location.href='index.php'" class="btn btn-secondary">Cancelar</button>
			<button type="submit" class="btn btn-primary" onclick="return confirm('Vocẽ tem certeza que deseja remover este Ativo?');">Remover</button>
		</div>
	</div>
</form>
<?php include_once 'partials/footer.php' ?>
</body>
</html>