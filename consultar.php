<html>
	<head>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
		<title></title>
		<script src="js/jquery-1.12.4.js"></script>
		<script src="js/jquery.dataTables.min.js"></script>
		<script src="js/dataTables.bootstrap.min.js"></script>
		<script>
			$(document).ready(function() {
		    	$('#consulta').DataTable();
			} );
		</script>
	</head>
	<body>
		<?php
			$server = $_POST['Servidor'];
			include "mysql.php";
			if (empty($server)) {
				$server = '%';
			}
			$sql = 'SELECT * FROM Hardware WHERE `Host Name` like "'.$server.'"';
			$result = mysqli_query($conn, $sql);
		?>
		<table id='consulta' class='table table-striped table-bordered' cellspacing='0' width='100%'>
			<thead>
				<tr>
					<th> Host Name </th>
					<th> DNS name 1 </th>
					<th> DNS name 2 </th>
					<th> State </th>
					<th> Responsable </th>
					<th> Critical </th>
					<th> Priority </th>
					<th>  Type </th>
					<th> Virt. Plataform </th>
					<th> Fail Over Cluster or VMwware Datacenter </th>
					<th> Business Function </th>
					<th> Application name </th>
					<th> Environment </th>
					<th> Contact Team </th>
					<th> Data center </th>
					<th> Domain </th>
					<th> Operating System </th>
					<th>  Time Zone </th>
					<th> Network Adapter </th>
					<th> MAC Address </th>
					<th> IP Address Adapter 1 </th>
					<th> IP Address Adapter 2 </th>
					<th> IP Address Adapter 3 </th>
					<th> IP Address Adapter 4 </th>
					<th> Default Gateway </th>
					<th> DNS Primary </th>
					<th> DNS Secondary </th>
					<th> SERVER MAKE </th>
					<th> SERVER MODEL </th>
					<th> SERVER TYPE </th>
					<th> Console Remote Access </th>
					<th> Service Tag (serial) </th>
					<th> Warranty end</th>
				</tr>
			</thead>
			<?php
				while ($row = mysqli_fetch_array($result)) { 
			?>
			<tr>
				<td><?php echo $row["Host Name"] ?></td>
				<td><?php echo $row["DNS name 1"] ?></td>
				<td><?php echo $row["DNS name 2"] ?></td>
				<td><?php echo $row["State"] ?></td>
				<td><?php echo $row["Responsable"] ?></td>
				<td><?php echo $row["Critical"] ?></td>
				<td><?php echo $row["Priority"] ?></td>
				<td><?php echo $row["Type"] ?></td>
				<td><?php echo $row["Virt. Plataform"] ?></td>
				<td><?php echo $row["Fail Over Cluster or VMwware Datacenter"]?></td>
				<td><?php echo $row["Business Function"] ?></td>
				<td><?php echo $row["Application name"]?></td>
				<td><?php echo $row["Environment"]?></td>
				<td><?php echo $row["Contact Team"]?></td>
				<td><?php echo $row["Data center"]?></td>
				<td><?php echo $row["Domain"]?></td>
				<td><?php echo $row["Operating System"]?></td>
				<td><?php echo $row["Time Zone"]?></td>
				<td><?php echo $row["Network Adapter"]?></td>
				<td><?php echo $row["MAC Address"]?></td>
				<td><?php echo $row["IP Address Adapter 1"]?></td>
				<td><?php echo $row["IP Address Adapter 2"]?></td>
				<td><?php echo $row["IP Address Adapter 3"]?></td>
				<td><?php echo $row["IP Address Adapter 4"]?></td>
				<td><?php echo $row["Default Gateway"]?></td>
				<td><?php echo $row["DNS Primary"]?></td>
				<td><?php echo $row["DNS Secondary"]?></td>
				<td><?php echo $row["SERVER MAKE"]?></td>
				<td><?php echo $row["SERVER MODEL"]?></td>
				<td><?php echo $row["SERVER TYPE"]?></td>
				<td><?php echo $row["Console Remote Access"]?></td>
				<td><?php echo $row["Service Tag"]?></td>
				<td><?php echo $row["Warranty end"]?></td>
			</tr>
			<?php 
				mysqli_close($conn);
				}
			?>
		</table>
	</body>
</html>