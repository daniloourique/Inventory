<?php
	include "mysql.php";
	$server = $_POST['Servidor'];
	$sql = 'SELECT * FROM Hardware WHERE `Host Name` like "'.$server.'"';
	$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result)) { 
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Consultar</title>
		<link rel="stylesheet" href="css/style.css">
		<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
		<script>
			$(document).ready(function(){
				$("#entrar").click(function(){
				if ($("#Host_Name").val()==''||$("#DNS_name_1").val()==''||$("#State").val()==''||$("#Critical").val()==''||$("#Priority").val()==''||$("#Type").val()==''||$("#Virt_Plataform").val()==''||$("#Fail_Over_Cluster_or_VMwware_Datacenter").val()==''||$("#Business_Function").val()==''||$("#Application_name").val()==''||$("#Environment").val()==''||$("#Contact_Team").val()==''||$("#Data_center").val()==''||$("#Domain").val()==''||$("#Operating_System").val()==''||$("#_Time_Zone").val()==''||$("#Network_Adapter").val()==''||$("#MAC_Address").val()==''||$("#IP_Address_Adapter_1").val()==''||$("#Default_Gateway").val()==''||$("#DNS_Primary").val()==''){
					$("#mensagem").html("Favor preencher todos os campos");
					}else{
						$("#alterar").submit();
					}
				});
			});
		</script>

	</head>
	<body>
		<div class="main">
			<form action="alterar3.php" name="alterar" id="alterar" method="post">
				<div class="left">
					<div class="div_for">
						<label for="Host_Name">Host_Name*</label>
						<input type="text" id="Host_Name" name="Host_Name" value="<?php echo $row["Host Name"]?>" />
					</div>
					<div class="div_for">
						<label for="DNS_name_1">DNS_name_1*</label>
						<input type="text" id="DNS_name_1" name="DNS_name_1" value="<?php echo $row["DNS name 1"]?>" />
					</div>				 
					<div class="div_for">					
						<label for="DNS_name_2">DNS_name_2</label>
						<input type="text" id="DNS_name_2" name="DNS_name_2" value="<?php echo $row["DNS name 2"]?>" />
					</div>
					<div class="div_for">
						<label for="State">State*</label>
						<input type="text" id="State" name="State" value="<?php echo $row["State"]?>" />
					</div>
					<div class="div_for">
						<label for="Responsable">Responsable*</label>
						<input type="text" id="Responsable" name="Responsable" value="<?php echo $row["Responsable"]?>" />
					</div>
					<div class="div_for">
						<label for="Critical">Critical*</label>
						<input type="text" id="Critical" name="Critical" value="<?php echo $row["Critical"]?>" />
					</div>
					<div class="div_for">
						<label for="Priority">Priority*</label>
						<input type="text" id="Priority" name="Priority" value="<?php echo $row["Priority"]?>" />
					</div>
					<div class="div_for">
						<label for="Type">Type*</label>
						<input type="text" id="Type" name="Type" value="<?php echo $row["Type"]?>" />
					</div>
					<div class="div_for">
						<label for="Virt_Plataform">Virt_Plataform*</label>
						<input type="text" id="Virt_Plataform" name="Virt_Plataform" value="<?php echo $row["Virt. Plataform"]?>" />
					</div>
					<div class="div_for">
						<label for="Fail_Over_Cluster_or_VMwware_Datacenter">Fail_Over_Cluster_or_VMwware_Datacenter*</label>
						<input type="text" id="Fail_Over_Cluster_or_VMwware_Datacenter" name="Fail_Over_Cluster_or_VMwware_Datacenter" value="<?php echo $row["Fail Over Cluster or VMwware Datacenter"]?>" />
					</div>
					<div class="div_for">
						<label for="Business_Function">Business_Function*</label>
						<input type="text" id="Business_Function" name="Business_Function" value="<?php echo $row["Business Function"]?>" />
					</div>
					<div class="div_for">
						<label for="Application_name">Application_name*</label>
						<input type="text" id="Application_name" name="Application_name" value="<?php echo $row["Application name"]?>" />
					</div>
					<div class="div_for">
						<label for="Environment">Environment*</label>
						<input type="text" id="Environment" name="Environment" value="<?php echo $row["Environment"]?>" />
					</div>
					<div class="div_for">
						<label for="Contact_Team">Contact_Team*</label>
						<input type="text" id="Contact_Team" name="Contact_Team" value="<?php echo $row["Contact Team"]?>" />
					</div>
				</div>
				<div class="right">
					<div class="div_for">
						<label for="Data_center">Data_center*</label>
						<input type="text" id="Data_center" name="Data_center" value="<?php echo $row["Data center"]?>" />
					</div>
					<div class="div_for">
						<label for="Domain">Domain*</label>
						<input type="text" id="Domain" name="Domain" value="<?php echo $row["Domain"]?>" />
					</div>
					<div class="div_for">
						<label for="Operating_System">Operating_System*</label>
						<input type="text" id="Operating_System" name="Operating_System" value="<?php echo $row["Operating System"]?>" />
					</div>
					<div class="div_for">
						<label for="Time_Zone">Time_Zone*</label>
						<input type="text" id="Time_Zone" name="Time_Zone" value="<?php echo $row["Time Zone"]?>" />
					</div>
					<div class="div_for">
						<label for="Network_Adapter">Network_Adapter*</label>
						<input type="text" id="Network_Adapter" name="Network_Adapter" value="<?php echo $row["Network Adapter"]?>" />
					</div>
					<div class="div_for">
						<label for="MAC_Address">MAC_Address*</label>
						<input type="text" id="MAC_Address" name="MAC_Address" value="<?php echo $row["MAC Address"]?>" />
					</div>
					<div class="div_for">
						<label for="IP_Address_Adapter_1">IP_Address_Adapter_1*</label>
						<input type="text" id="IP_Address_Adapter_1" name="IP_Address_Adapter_1" value="<?php echo $row["IP Address Adapter 1"]?>" />
					</div>
					<div class="div_for">
						<label for="IP_Address_Adapter_2">IP_Address_Adapter_2</label>
						<input type="text" id="IP_Address_Adapter_2" name="IP_Address_Adapter_2" value="<?php echo $row["IP Address Adapter 2"]?>" />
					</div>
					<div class="div_for">
						<label for="IP_Address_Adapter_3">IP_Address_Adapter_3</label>
						<input type="text" id="IP_Address_Adapter_3" name="IP_Address_Adapter_3" value="<?php echo $row["IP Address Adapter 3"]?>" />
					</div>
					<div class="div_for">
						<label for="IP_Address_Adapter_4">IP_Address_Adapter_4</label>
						<input type="text" id="IP_Address_Adapter_4" name="IP_Address_Adapter_4" value="<?php echo $row["IP Address Adapter 4"]?>" />
					</div>
					<div class="div_for">
						<label for="Default_Gateway">Default_Gateway*</label>
						<input type="text" id="Default_Gateway" name="Default_Gateway" value="<?php echo $row["Default Gateway"]?>" />
					</div>
					<div class="div_for">
						<label for="DNS_Primary">DNS_Primary*</label>
						<input type="text" id="DNS_Primary" name="DNS_Primary" value="<?php echo $row["DNS Primary"]?>" />
					</div>
					<div class="div_for">
						<label for="DNS_Secondary">DNS_Secondary</label>
						<input type="text" id="DNS_Secondary" name="DNS_Secondary" value="<?php echo $row["DNS Secondary"]?>" />
					</div>
					<div class="div_for">
						<label for="SERVER_MAKE">SERVER_MAKE</label>
						<input type="text" id="SERVER_MAKE" name="SERVER_MAKE" value="<?php echo $row["SERVER MAKE"]?>" />
					</div>
					<div class="div_for">
						<label for="SERVER_MODEL">SERVER_MODEL</label>
						<input type="text" id="SERVER_MODEL" name="SERVER_MODEL" value="<?php echo $row["SERVER MODEL"]?>" />
					</div>
					<div class="div_for">
						<label for="SERVER_TYPE">SERVER_TYPE</label>
						<input type="text" id="SERVER_TYPE" name="SERVER_TYPE" value="<?php echo $row["SERVER TYPE"]?>" />
					</div>
					<div class="div_for">
						<label for="Console_Remote_Access">Console_Remote_Access</label>
						<input type="text" id="Console_Remote_Access" name="Console_Remote_Access" value="<?php echo $row["Console Remote Access"]?>" />
					</div>
					<div class="div_for">
						<label for="Service_Tag_serial">Service_Tag_(serial)</label>
						<input type="text" id="Service_Tag_serial" name="Service_Tag_serial" value="<?php echo $row["Service Tag"]?>" />
					</div>
					<div class="div_for">
						<label for="Warranty_end">Warranty_end</label>
						<input type="text" id="Warranty_end" name="Warranty_end" value="<?php echo $row["Warranty end"]?>" />
						<?php 
							mysqli_close($conn);
						 	}
						 ?>
					</div>
					<div class="div_for">
						<input type="button" name="entrar" id="entrar" value="Alterar">
					</div>
					<div id="mensagem"></div>
				</div>
			</form>
		</div>
	</body>
</html>