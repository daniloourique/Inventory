<?php
include "mysql.php";
$sql = 'select * FROM Base';
$query_base = mysqli_query($conn, $sql);
while ($result = mysqli_fetch_array($query_base)){
	$base[] = $result;
}

//    Fila
if(isset($_POST['id_aprov'])){
	$id = $_POST['id_aprov'];
	$sql = 'select * FROM Fila_solicitacao WHERE ID="'.$id.'"';
	$result = mysqli_query($conn, $sql);
	$inventory = mysqli_fetch_array($result);
}

//    Alterar
if(isset($_POST['servidor_alterar'])){
	$host_name = $_POST['servidor_alterar'];
	$sql = 'select * FROM Hardware WHERE `Host Name`="'.$host_name.'"';
	$result = mysqli_query($conn, $sql);
	$inventory = mysqli_fetch_array($result);
} 



?>
<!DOCTYPE html>
<html>
<head>
	<title>AGCO Inventory</title>
</head>
<body>
	<?php 
		include_once 'partials/header.php' ;
	?>
	<main role="main" class="container">

	<form action="envia.php" method="post">
	<div class="modal-header">
		<?php if(isset($_POST['id_aprov'])):?>
		<h5 class="modal-title" id="formLabel">Requisição <?php if(isset($inventory)){echo $inventory['ID'];}?></h5>
		<span style="">
			<h6>Status<h6>
			<select id="Status" name="Status" value="Status">
				<option value="Novo" <?=($inventory['Status']=='Novo')? 'selected':''?> >Novo</option>
				<option value="Pendente" <?=($inventory['Status']=='Pendente')? 'selected':''?> >Pendente</option>
				<option value="Revisar" <?=($inventory['Status']=='Revisar')? 'selected':''?> >Revisar</option>
				<option value="Concluído" <?=($inventory['Status']=='Concluído')? 'selected':''?> >Concluído</option>
			</select>
		</span>
		<?php endif ?>
		<?php if(isset($_POST['servidor_alterar'])):?>
			<h5 class="modal-title" id="formLabel">Servidor <?php if(isset($inventory)){echo $inventory['Host Name'];}?></h5>
		<?php endif ?>
	</div>
	<div class="modal-body">
		<div class="form-group">
			<?php if(isset($_POST['id_aprov'])):?>
			<span style="display: inline-block;">

				<label for="message-text" class="col-form-label">ID*</label>
				<input type="text" name="id" class="form-control" id="id" style="width: 100px;" value="<?php if(isset($inventory)){echo $inventory['ID'];}?>">
			</span>
			<span style="display: inline-block;">
				<label for="message-text" class="col-form-label">Solicitante*</label>
				<input type="text" class="form-control" id="Solicitante" style="width: 150px;" value="<?php if(isset($inventory)){echo $inventory['User'];}?>">
			</span>
			<?php endif ?>
			<span style="display: inline-block;">
				<label for="message-text" class="col-form-label">Ambiente*</label>
				<select name="Environment" class="form-control">
					<option value="">Selecione</option>
					<?php 
					     $count = count($base);
					     for($i=0; $i<$count; $i++):
					     	if ($base[$i]['Classe'] == "Environment"):?>
					     		<option value="<?php echo $base[$i]['Valor']?>" <?=(isset($inventory)&&$inventory['Environment'] == $base[$i]['Valor'])? 'selected':''?>>
					     			<?php echo $base[$i]['Valor']?>
					     			</option>'
					     	<?php 
					     	endif;
					     endfor;	
					?>	
				</select>
			</span>
			<span style="display: inline-block;">
				<label for="message-text" class="col-form-label">Prioridade*</label>
				<select name="Priority" class="form-control">
					<option value="">Selecione</option>
					<?php 
					     $count = count($base);
					     for($i=0; $i<$count; $i++):
					     	if ($base[$i]['Classe'] == "Priority"):?>
					     		<option value="<?php echo $base[$i]['Valor']?>" <?=(isset($inventory)&&$inventory['Priority'] == $base[$i]['Valor'])? 'selected':''?>><?php echo $base[$i]['Valor']?></option>'
					     	<?php 
					     	endif;
					     endfor;	
					?>	
				</select>
			</span>
		 	<span style="display: inline-block;">
				<label for="message-text" class="col-form-label">Aplicação*</label>
				<input type="text" name="Application_name" class="form-control" id="Aplicacao" style="width: 200px;" value="<?php if(isset($inventory)){echo $inventory['Application Name'];}?>">
			</span>
		 	<span style="display: inline-block;">
				<label for="message-text" class="col-form-label">CPU*</label>
				<input type="text" name="CPU" class="form-control" id="CPU" style="width: 70px;" value="<?php if(isset($inventory)){echo $inventory['CPU'];}?>">
		 	</span>
		 	<span style="display: inline-block;">
				<label for="message-text" class="col-form-label">Memória*</label>
				<input type="text" name="Memory" class="form-control" id="Memoria" style="width: 80px;" value="<?php if(isset($inventory)){echo $inventory['Memory'];}?>">
		 	</span>
		 	<span style="display: inline-block;">
				<label for="message-text" class="col-form-label">SO*</label>
				<input type="text" name="SO" class="form-control" id="SO" style="width: 100px;" value="<?php if(isset($inventory)){echo $inventory['SO'];}?>">
			</span>
			<span style="display: inline-block;">
				<label for="message-text" class="col-form-label">Versão SO*</label>
				<select name="Version_SO" class="form-control">
					<option value="">Selecione</option>
					<?php 
					     $count = count($base);
					     for($i=0; $i<$count; $i++):
					     	if ($base[$i]['Classe'] == "Version SO"):?>
					     		<option value="<?php echo $base[$i]['Valor']?>" <?=(isset($inventory)&&$inventory['Version SO'] == $base[$i]['Valor'])? 'selected':''?>><?php echo $base[$i]['Valor']?></option>'
					     	<?php 
					     	endif;
					     endfor;	
					?>			
				</select>
			</span>
			<span style="display: inline-block;">
				<label for="message-text" class="col-form-label">Estado*</label>
				<select name="State" class="form-control" required>
					<option value="">Selecione</option>
					<?php 
					     $count = count($base);
					     for($i=0; $i<$count; $i++):
					     	if ($base[$i]['Classe'] == "State"):?>
					     		<option value="<?php echo $base[$i]['Valor']?>" <?=(isset($inventory)&&$inventory['State'] == $base[$i]['Valor'])? 'selected':''?>><?php echo $base[$i]['Valor']?></option>'
					     	<?php 
					     	endif;
					     endfor;	
					?>					
				</select>			
			</span>
			<span style="display: inline-block;">
				<label for="message-text" class="col-form-label">Tipo*</label>
				<select name="Type" class="form-control">
					<option value="">Selecione</option>
					<?php 
					     $count = count($base);
					     for($i=0; $i<$count; $i++):
					     	if ($base[$i]['Classe'] == "Type"):?>
					     		<option value="<?php echo $base[$i]['Valor']?>" <?=(isset($inventory)&&$inventory['Type'] == $base[$i]['Valor'])? 'selected':''?>><?php echo $base[$i]['Valor']?></option>'
					     	<?php 
					     	endif;
					     endfor;	
					?>			
				</select>
			</span>
			<span style="display: inline-block;">
				<label for="message-text" class="col-form-label">Função*</label>
				<select name="Business_Function" class="form-control">
						<option value="">Selecione</option>
						<?php 
						     $count = count($base);
						     for($i=0; $i<$count; $i++):
						     	if ($base[$i]['Classe'] == "Business Function"):?>
						     		<option value="<?php echo $base[$i]['Valor']?>" <?=(isset($inventory)&&$inventory['Business Function'] == $base[$i]['Valor'])? 'selected':''?>><?php echo $base[$i]['Valor']?></option>'
						     	<?php 
						     	endif;
						     endfor;	
						?>	
				</select>
			</span>
			<span style="display: inline-block;">
				<label for="message-text" class="col-form-label">Backup*</label>
				<textarea name="Backup" class="form-control" id="Backup"  style="width: 300px;height: 40px;" rows="1"></textarea value="<?php if(isset($inventory)){echo $inventory['Backup'];}?>">
			</span>
			<span style="display: inline-block;">
				<label for="message-text" class="col-form-label">Contato*</label>
				<textarea name="Contact_Team" class="form-control" id="Contact_Team" style="width: 300px;height: 40px;;" rows="1"></textarea value="<?php if(isset($inventory)){echo $inventory['Contact Team'];}?>">
			</span>
			<span style="display: inline-block;">
				<label for="message-text" class="col-form-label">Participantes*</label>
				<textarea name="Participantes" class="form-control" id="Participantes" style="width: 300px;height: 40px;;" rows="1"></textarea value="<?php if(isset($inventory)){echo $inventory['Participants'];}?>">
			</span><br>
			<span style="display: inline-block;">
				<label for="message-text" class="col-form-label">Host Name*</label>
				<input type="text" name="Host_Name" class="form-control" id="host_name" style="width: 150px;" value="<?php if(isset($inventory)){echo $inventory['Host Name'];}?>">
			</span>
			<span style="display: inline-block;">
				<label for="message-text" class="col-form-label">DNS Name 1*</label>
				<input type="text" name="DNS_name_1" class="form-control" id="dns_name_1" style="width: 250px;" value="<?php if(isset($inventory)){echo $inventory['DNS name 1'];}?>">
			</span>
			<span style="display: inline-block;">
				<label for="message-text" class="col-form-label">DNS Name 2</label>
				<input type="text" name="DNS_name_2" class="form-control" id="dns_name_2" style="width: 250px;" value="<?php if(isset($inventory)){echo $inventory['DNS name 2'];}?>">
			</span>
			<span style="display: inline-block;">
				<label for="message-text" class="col-form-label">Responsável*</label>
				<input type="text" name="Responsable" class="form-control" id="responsable" style="width: 100px;" value="<?php if(isset($inventory)){echo $inventory['Responsable'];}?>">
			</span>
			<span style="display: inline-block;">
				<label for="message-text" class="col-form-label">Crítico*</label>
				<select  name="Critical" class="form-control" value="<?php if(isset($inventory)){echo $inventory['Critical'];}?>">
					<option value="">Selecione</option>
					<?php 
					     $count = count($base);
					     for($i=0; $i<$count; $i++):
					     	if ($base[$i]['Classe'] == "Critical"):?>
					     		<option value="<?php echo $base[$i]['Valor']?>" <?=(isset($inventory)&&$inventory['Critical'] == $base[$i]['Valor'])? 'selected':''?>><?php echo $base[$i]['Valor']?></option>'
					     	<?php 
					     	endif;
					     endfor;	
					?>	
				</select>
			</span>
			<span style="display: inline-block;">
				<label for="message-text" class="col-form-label">Virtualização*</label>
				<select name="Virtualization" class="form-control" required>
					<option value="">Selecione</option>
					<?php 
					     $count = count($base);
					     for($i=0; $i<$count; $i++):
					     	if ($base[$i]['Classe'] == "Virtualization"):?>
					     		<option value="<?php echo $base[$i]['Valor']?>" <?=(isset($inventory)&&$inventory['Virtualization'] == $base[$i]['Valor'])? 'selected':''?>><?php echo $base[$i]['Valor']?></option>'
					     	<?php 
					     	endif;
					     endfor;	
					?>	
				</select>
			</span>
			<span style="display: inline-block;">
				<label for="message-text" class="col-form-label">Cluster</label>
				<select name="Cluster" class="form-control">
					<option value="">Selecione</option>
					<?php 
					     $count = count($base);
					     for($i=0; $i<$count; $i++):
					     	if ($base[$i]['Classe'] == "Cluster"):?>
					     		<option value="<?php echo $base[$i]['Valor']?>" <?=(isset($inventory)&&$inventory['Cluster'] == $base[$i]['Valor'])? 'selected':''?>><?php echo $base[$i]['Valor']?></option>'
					     	<?php 
					     	endif;
					     endfor;	
					?>	
				</select>
			</span>
			<span style="display: inline-block;">
				<label for="message-text" class="col-form-label">Data Center*</label>
				<select name="Data_Center" class="form-control">
					<option value="">Selecione</option>
					<?php 
					     $count = count($base);
					     for($i=0; $i<$count; $i++):
					     	if ($base[$i]['Classe'] == "Data Center"):?>
					     		<option value="<?php echo $base[$i]['Valor']?>" <?=(isset($inventory)&&$inventory['Data Center'] == $base[$i]['Valor'])? 'selected':''?>><?php echo $base[$i]['Valor']?></option>'
					     	<?php 
					     	endif;
					     endfor;	
					?>	
				</select>
			</span>
			<span style="display: inline-block;">
				<label for="message-text" class="col-form-label">Domínio*</label>
					<select name="Domain" class="form-control">
					<option value="">Selecione</option>
					<?php 
					     $count = count($base);
					     for($i=0; $i<$count; $i++):
					     	if ($base[$i]['Classe'] == "Domain"):?>
					     		<option value="<?php echo $base[$i]['Valor']?>" <?=(isset($inventory)&&$inventory['Domain'] == $base[$i]['Valor'])? 'selected':''?>><?php echo $base[$i]['Valor']?></option>'
					     	<?php 
					     	endif;
					     endfor;	
					?>	
				</select>
			</span>
			<span style="display: inline-block;">
				<label for="message-text" class="col-form-label">Time Zone*</label>
				<input type="text" name="Time_Zone" class="form-control" id="Time_Zone" style="width: 100px;" value="<?php if(isset($inventory)){echo $inventory['Time Zone'];}?>">
			</span>
			<span style="display: inline-block;">
				<label for="message-text" class="col-form-label">DNS Primário</label>
				<input type="text" name="DNS_Primary" class="form-control" id="DNS_Primary" style="width: 150px;">
			</span>
			<span style="display: inline-block;">
				<label for="message-text" class="col-form-label">DNS Secundario</label>
				<input type="text" name="DNS_Secondary" class="form-control"  id="DNS_Secondary" style="width: 150px;">
			</span>
			<span style="display: inline-block;">
				<label for="message-text" class="col-form-label">Server Make</label>
				<input type="text" name="SERVER_MAKE" class="form-control" id="SERVER_MAKE" style="width: 100px;" value="<?php if(isset($inventory['SERVER MAKE'])){echo $inventory['SERVER MAKE'];}?>">
			</span>
			<span style="display: inline-block;">
				<label for="message-text" class="col-form-label">Server Model</label>
				<input type="text" name="SERVER_MODEL" class="form-control" id="SERVER_MODEL" style="width: 100px;" value="<?php if(isset($inventory['SERVER MODEL'])){echo $inventory['SERVER MODEL'];}?>">
			</span>
			<span style="display: inline-block;">
				<label for="message-text" class="col-form-label">Server Type</label>
				<input type="text" name="SERVER_TYPE" class="form-control" id="SERVER_TYPE" style="width: 100px;" value="<?php if(isset($inventory['SERVER TYPE'])){echo $inventory['SERVER TYPE'];}?>">
			</span>
			<span style="display: inline-block;">
				<label for="message-text" class="col-form-label">Console Remote Access</label>
				<input type="text" name="Console_Remote_Access" class="form-control" id="Console_Remote_Access" style="width: 200px;" value="<?php if(isset($inventory)){echo $inventory['Console Remote Access'];}?>">
			</span>
			<span style="display: inline-block;">
				<label for="message-text" class="col-form-label">Service Tag</label>
				<input type="text" name="Service_Tag" class="form-control" id="Service_Tag" style="width: 100px;" value="<?php if(isset($inventory)){echo $inventory['Service Tag'];}?>">
			</span>
			<span style="display: inline-block;">
				<label for="message-text" class="col-form-label">Garantia Final</label>
				<input type="text" name="Warranty_end" class="form-control" id="Warranty_end" style="width: 150px;" value="<?php if(isset($inventory)){echo $inventory['Warranty end'];}?>">
			</span>
			<span style="display: inline-block;">
				<label for="message-text" class="col-form-label">Network Adapter</label>
				<input type="text" name="Network_Adapter" class="form-control" id="Network_Adapter" style="width: 350px;" value="<?php if(isset($inventory['Network Adapter'])){echo $inventory['Network Adapter'];}?>">
			</span>
			<span style="display: inline-block;">
				<label for="message-text" class="col-form-label">IP Address Adapter 1</label>
				<input type="text" name="IP_Address_Adapter_1" class="form-control" id="IP_Address_Adapter_1" style="width: 250px;" value="<?php if(isset($inventory['IP Address Adapter 1'])){echo $inventory['IP Address Adapter 1'];}?>">
			</span>
			<span style="display: inline-block;">
				<label for="message-text" class="col-form-label">IP Address Adapter 2</label>
				<input type="text" name="IP_Address_Adapter_2" class="form-control" id="IP_Address_Adapter_2" style="width: 150px;" value="<?php if(isset($inventory['IP Address Adapter 2'])){echo $inventory['IP Address Adapter 2'];}?>">
			</span>
			<span style="display: inline-block;">
				<label for="message-text" class="col-form-label">IP Address Adapter 3</label>
				<input type="text" name="IP_Address_Adapter_3" class="form-control" id="IP_Address_Adapter_3 style="width: 150px;" value="<?php if(isset($inventory['IP Address Adapter 3'])){echo $inventory['IP Address Adapter 3'];}?>">
			</span>
			</span>
			<span style="display: inline-block;">
				<label for="message-text" class="col-form-label">IP Address Adapter 4</label>
				<input type="text" name="IP_Address_Adapter_4" class="form-control" id="IP_Address_Adapter_4" style="width: 150px;" value="<?php if(isset($inventory['IP Address Adapter 4'])){echo $inventory['IP Address Adapter 4'];}?>">
			</span>
			<span style="display: inline-block;">
				<label for="message-text" class="col-form-label">Default Gateway</label>
				<input type="text" name="Default_Gateway" class="form-control" id="Default_Gateway" style="width: 150px;" value="<?php if(isset($inventory['Default Gateway'])){echo $inventory['Default Gateway'];}?>">
			</span>
			</span>
			<span style="display: inline-block;">
				<label for="message-text" class="col-form-label">Service Tag serial</label>
				<input type="text" name="Service_Tag_serial" class="form-control" id="Service_Tag_serial" style="width: 150px;" value="<?php if(isset($inventory['Service Tag'])){echo $inventory['Service Tag'];}?>">
			</span>
			<span style="display: inline-block;">
				<label for="message-text" class="col-form-label">MAC_Address</label>
				<input type="text" name="MAC_Address" class="form-control" id="MAC_Address" style="width: 150px;" value="<?php if(isset($inventory['MAC Address'])){echo $inventory['MAC Address'];}?>">
			</span>
			<span style="display: inline-block;position: relative;margin-left: 4px;">
				<label for="message-text" class="col-form-label">OBS:</label>
				<textarea name="OBS" class="form-control" id="obs" rows="3" cols="400" value="<?php if(isset($inventory)){echo $inventory['OBS'];}?>"></textarea>
			</span>




		</div>
		<div class="modal-footer">
			<input type="hidden" name="server" value=<?php echo $_POST['servidor_alterar']?>>
			<?php

				if(isset($inventory['ID']) == true||isset($inventory['Host Name']) == true){?>
					<input type="hidden" name="mysql" value="update">
			<?php 
				} else {
			?>
					<input type="hidden" name="mysql" value="insert">
			<?php
				};
			?>
			<button onclick="window.location.href='index.php'" class="btn btn-secondary">Cancelar</button>
			<button type="submit" value="Submit" class="btn btn-primary">Concluir</button>
		</div>

	</form>
	<?php include_once 'partials/footer.php' ?>
</body>
</html>