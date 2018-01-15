<?php
// Parametros de Conexão com o Banco
include "mysql.php";
$sql = 'select * FROM Fila_solicitacao';
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
	
	<form action="form_solicitacao.php" method="post">
		<table class="table table-sm">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Env</th>
					<th scope="col">Status</th>
					<th scope="col">Update</th>
				</tr>
			</thead>
			<tbody>
		<?php while ($inventory = mysqli_fetch_array($result)):
			if($inventory["Status"] == "Pendente"||$inventory["Status"] == "Novo"||$inventory["User"] == $_SESSION['user']){	?>
				<tr>
					<th scope="row"><?php echo $inventory['ID']; ?></th>
						<td><?php echo $inventory['Environment']; ?></td>
						<td><?php echo $inventory['Status']; ?></td>
						<td>
						<button type="submit" name="id_aprov" value="<?php echo $inventory['ID']?>" class="btn btn-primary">Alterar</button>
					</td>
			</tr>
			<?php } endwhile ?>

			</tbody>
			</table>
		</form>
<?php include_once 'partials/footer.php' ?>
</body>
</html>