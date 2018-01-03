<html>
<head>

<title>https://www.devmedia.com.br/como-tornar-uma-tabela-html-editavel-com-jquery/26899</title>
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript">
	$(function () {
    $("td").dblclick(function () {
        var conteudoOriginal = $(this).text();
        
        $(this).addClass("celulaEmEdicao");
        $(this).html("<input type='text' value='" + conteudoOriginal + "' />");
        $(this).children().first().focus();

        $(this).children().first().keypress(function (e) {
            if (e.which == 13) {
                var novoConteudo = $(this).val();
                $(this).parent().text(novoConteudo);
                $(this).parent().removeClass("celulaEmEdicao");
            }
        });
		
	$(this).children().first().blur(function(){
		$(this).parent().text(conteudoOriginal);
		$(this).parent().removeClass("celulaEmEdicao");
	});
    });
});
</script>
<style type="text/css">
	* {
    font-family:Consolas
	}

	.tabelaEditavel {
	    border:solid 1px;
	    width:100%
	}

	.tabelaEditavel td {
	    border:solid 1px;
	}

	.tabelaEditavel .celulaEmEdicao {
	    padding: 0;
	}

	.tabelaEditavel .celulaEmEdicao input[type=text]{
	    width:100%;
	    border:0;
	    background-color:rgb(255,253,210);  
	}
</style>
</head>
<body>
<?php
	$server = $_POST['Servidor'];
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = 'P@ssw0rd@2016';
	$dbname = 'Inventario';
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	$sql = 'SELECT * FROM Hardware WHERE `Host Name` like "'.$server.'"';
	$result = mysqli_query($conn, $sql);
	echo "<table class='tabelaEditavel' cellspacing='0' width='100%'>";
		echo "<thead>";
			echo "<tr>";
	            echo "<th> Host Name </th>";
	            echo "<th> DNS name 1 </th>";
	            echo "<th> DNS name 2 </th>";
	            echo "<th> State </th>";
	            echo "<th> Responsable </th>";
	            echo "<th> Critical </th>";
	            echo "<th> Priority </th>";
	            echo "<th>  Type </th>";
	            echo "<th> Virt. Plataform </th>";
	            echo "<th> Fail Over Cluster or VMwware Datacenter </th>";
	            echo "<th> Business Function </th>";
	            echo "<th> Application name </th>";
	            echo "<th> Environment </th>";
	            echo "<th> Contact Team </th>";
	            echo "<th> Data center </th>";
	            echo "<th> Domain </th>";
	            echo "<th> Operating System </th>";
	            echo "<th>  Time Zone </th>";
	            echo "<th> Network Adapter </th>";
	            echo "<th> MAC Address </th>";
	            echo "<th> IP Address Adapter 1 </th>";
	            echo "<th> IP Address Adapter 2 </th>";
	            echo "<th> IP Address Adapter 3 </th>";
	            echo "<th> IP Address Adapter 4 </th>";
	            echo "<th> Default Gateway </th>";
	            echo "<th> DNS Primary </th>";
	            echo "<th> DNS Secondary </th>";
	            echo "<th> SERVER MAKE </th>";
	            echo "<th> SERVER MODEL </th>";
	            echo "<th> SERVER TYPE </th>";
	            echo "<th> Console Remote Access </th>";
	            echo "<th> Service Tag (serial) </th>";
	            echo "<th> Warranty end</th>";
			echo "</tr>";
		echo "</thead>";
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
		            <td><?php echo $row[" Type"] ?></td>
		            <td><?php echo $row["Virt. Plataform"] ?></td>
		            <td><?php echo $row["Fail Over Cluster or VMwware Datacenter"]?></td>
		            <td><?php echo $row["Business Function"] ?></td>
		            <td><?php echo $row["Application name"]?></td>
		            <td><?php echo $row["Environment"]?></td>
		            <td><?php echo $row["Contact Team"]?></td>
		            <td><?php echo $row["Data center"]?></td>
		            <td><?php echo $row["Domain"]?></td>
		            <td><?php echo $row["Operating System"]?></td>
		            <td><?php echo $row[" Time Zone"]?></td>
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
		            <td><?php echo $row["Service Tag (serial)"]?></td>
	                <td><?php echo $row["Warranty end"]?></td>
		        </tr>
		    <?php } ?>
		</table>
<?php  mysqli_close($conn);?>