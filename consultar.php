<html>
	<head>
		<title></title>
	</head>
	<body>
		<?php
			include_once 'partials/header.php';
			include "mysql.php";
			$server = '%';
			$sql = 'SELECT * FROM Hardware WHERE `Host Name` like "'.$server.'"';
			$result = mysqli_query($conn, $sql);
			?>
		<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.min.css">
	
		<style type="text/css" class="init"></style>
		<script type="text/javascript" language="javascript" src="js/jquery-1.12.4.js"></script>
		<script type="text/javascript" language="javascript" src="js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" language="javascript" src="js/dataTables.bootstrap4.min.js"></script>
		<script type="text/javascript" language="javascript" src="js/dataTables.buttons.min.js"></script>
		<script type="text/javascript" language="javascript" src="js/buttons.bootstrap4.min.js"></script>
		<script type="text/javascript" language="javascript" src="js/jszip.min.js"></script>
		<script type="text/javascript" language="javascript" src="js/pdfmake.min.js"></script>
		<script type="text/javascript" language="javascript" src="js/vfs_fonts.js"></script>
		<script type="text/javascript" language="javascript" src="js/buttons.html5.min.js"></script>
		<script type="text/javascript" language="javascript" src="js/buttons.print.min.js"></script>
		<script type="text/javascript" language="javascript" src="js/buttons.colVis.min.js"></script>
		<script type="text/javascript" language="javascript" src="js/dataTables.fixedColumns.min.js"></script>


		<script type="text/javascript" class="init">	
$(document).ready(function() {
    var table = $('#consulta').DataTable( {
    	"lengthMenu": [[20, 25, 50, -1], [10, 25, 50, "All"]],
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'colvis' ],
        
        columnDefs: [
            { width: '20%'}
        ],
        fixedColumns: true,
        fixedColumns:   {
            heightMatch: 'semiauto'

        }
    } );
 
    table.buttons().container()
        .appendTo( '#consulta_wrapper .col-md-6:eq(0)' );


} );
		</script>
		<div class="table-responsive">
			<table id='consulta' class='table-sm table-bordered table-hover table-sm table-responsive nowrap' cellspacing='0'>
				<thead>
					<tr>
						<th>Host Name</th>
						<th>DNS name 1</th>
						<th>DNS name 2</th>
						<th>State</th>
						<th>Responsable</th>
						<th>CPU</th>
						<th>Core</th>
						<th>Socket</th>
						<th>Memory</th>
						<th>Critical</th>
						<th>Priority</th>
						<th>Type</th>
						<th>Virtualization</th>
						<th>Cluster</th>
						<th>Business Function</th>
						<th>Application name</th>
						<th>Environment</th>
						<th>Contact Team</th>
						<th>Data center</th>
						<th>Domain</th>
						<th>Operating System</th>
						<th>Time Zone</th>
						<th>Network Adapter</th>
						<th style="width:100%">MAC Address</th>
						<th>IP Address Adapter 1</th>
						<th>IP Address Adapter 2</th>
						<th>IP Address Adapter 3</th>
						<th>IP Address Adapter 4</th>
						<th>Default Gateway</th>
						<th>DNS Primary</th>
						<th>DNS Secondary</th>
						<th>SERVER MAKE</th>
						<th>SERVER MODEL</th>
						<th>SERVER TYPE</th>
						<th>Console Remote Access</th>
						<th>Service Tag</th>
						<th>Warranty End</th>
					</tr>
				</thead>
				<tbody>
				<?php

					while ($row = mysqli_fetch_array($result)) { 
				?>
				<tr>
					<td><a href=form.php?servidor_alterar=<?php echo $row["Host Name"] ?>><?php echo $row["Host Name"] ?></a></td>
					<td><?php echo $row["DNS name 1"] ?></td>
					<td><?php echo $row["DNS name 2"] ?></td>
					<td><?php echo $row["State"] ?></td>
					<td><?php echo $row["Responsable"] ?></td>
					<td><?php echo $row["CPU"] ?></td>
					<td><?php echo $row["Core"] ?></td>
					<td><?php echo $row["Socket"] ?></td>
					<td><?php echo $row["Memory"] ?></td>
					<td><?php echo $row["Critical"] ?></td>
					<td><?php echo $row["Priority"] ?></td>
					<td><?php echo $row["Type"] ?></td>
					<td><?php echo $row["Virtualization"] ?></td>
					<td><?php echo $row["Cluster"]?></td>
					<td><?php echo $row["Business Function"] ?></td>
					<td><?php echo $row["Application Name"]?></td>
					<td><?php echo $row["Environment"]?></td>
					<td><?php echo $row["Contact Team"]?></td>
					<td><?php echo $row["Data Center"]?></td>
					<td><?php echo $row["Domain"]?></td>
					<td><?php echo $row["Version SO"]?></td>
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
					
					}
					mysqli_close($conn);
				?>
				</tbody>
			</table>
		</div>
	</body>
</html>