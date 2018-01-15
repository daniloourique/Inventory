<?php
header('Content-type: text/html; charset=ISO-8859-1');
include "mysql.php";
if(isset($_POST['id_aprov'])){
	$ID = $_POST['id_aprov'];
	$sql = 'SELECT * FROM Fila_solicitacao WHERE `ID` like "'.$ID.'"';
	$query_solicitacao = mysqli_query($conn, $sql);
	$solicitacao = mysqli_fetch_array($query_solicitacao);
	$sql = 'SELECT * FROM Rede WHERE `ID` like "'.$ID.'"';
	$query_rede = mysqli_query($conn, $sql);
	while ($result = mysqli_fetch_array($query_rede)){
		$Rede[] = $result;
	}
	$sql = 'SELECT * FROM Disco WHERE `ID` like "'.$ID.'"';
	$query_Disco = mysqli_query($conn, $sql);
	while ($result = mysqli_fetch_array($query_Disco)){
		$Disco[] = $result;
	}

	
} else {$ID = null;}
$sql = 'select * FROM Base';
$query_base = mysqli_query($conn, $sql);
while ($result = mysqli_fetch_array($query_base)){
	$base[] = $result;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>AGCO Inventory</title>
	<script src="http://code.jquery.com/jquery.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
			if(typeof count_hd == 'undefined'){
				count_hd = 1;
			};   
			if(typeof count_rede == 'undefined'){
				count_rede = 1;
			}; 
			$("#b_adicionar_disco").click(function(){
				count_hd++;
				$("#d_adicionar_disco").append("<div class='input-group mb-3'><div class='input-group-prepend'><span class='input-group-text' id='basic-addon1'>Disco "+count_hd+"</span></div><input type='text' name='Disco[]' type='text' required value='0' class='form-control' aria-label='Change' aria-describedby='basic-addon1'><select class='custom-select' required name='Medida[]'><option value='GB'>GB</option><option value='MB'>MB</option><option value='TB'>TB</option></select>");
			});
			$("#b_adicionar_rede").click(function(){
				count_rede++;
				$("#d_adicionar_rede").append("<div class='input-group mb-3'><div class='input-group-prepend'><span class='input-group-text' id='basic-addon1'>Rede "+count_rede+"</span></div><select class='custom-select' required name='Rede[]'><option value='Producao'>Produção</option><option value='DMZ'>DMZ</option><option value='Backup'>Backup</option></select></div>");
			});
			if(document.getElementById('Ambiente').value == "PD"||document.getElementById('Ambiente').value == "PD/DR") {
				 $('#Ambiente-collapse').collapse('show')
			}else {$('#Ambiente-collapse').collapse('hide')}
			if(document.getElementById('Backup').value == "backup_sim") {
				$('#backup-collapse').collapse('show')
			}else {$('#backup-collapse').collapse('hide')}
			if(document.getElementById('os').value == "Windows"||document.getElementById('os').value == "Linux") {
				$('#os-collapse').collapse('show')
			}else {$('#os-collapse').collapse('hide')}
	});
			function abrir(value){
			if(document.getElementById('Ambiente').value == "PD"||document.getElementById('Ambiente').value == "PD/DR") {
				 $('#Ambiente-collapse').collapse('show')
			}else {$('#Ambiente-collapse').collapse('hide')}
			if(document.getElementById('Backup').value == "backup_sim") {
				$('#backup-collapse').collapse('show')
			}else {$('#backup-collapse').collapse('hide')}
			if(document.getElementById('os').value == "Windows"||document.getElementById('os').value == "Linux") {
				$('#os-collapse').collapse('show')
			}else {$('#os-collapse').collapse('hide')}

		};
	</script>
</head>
<body>
	<?php include_once 'partials/header.php' ?>
	<main role="main" class="container" style="width:500px">
		<div class="option">
			<center><h1>Solicitação <?php echo $ID;?></h1></center>
		</div>
		<form action="envia.php" method="POST" class="form">
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<label class="input-group-text" >Ambiente</label>
				</div>
				<select id="Ambiente" class="custom-select" name="Environment" onchange="abrir(this.value);" required>
					<option value="">Selecione</option>
					<?php 
			     	$count = count($base);
			     	for($i=0; $i<$count; $i++):
				     	if ($base[$i]['Classe'] == "Environment"):?>
			     			<option value="<?php echo $base[$i]['Valor']?>" <?=(isset($solicitacao)&&$solicitacao['Environment']==$base[$i]['Valor'])? 'selected':''?>><?php echo $base[$i]['Valor']?></option>'
			     	<?php 
			     		endif;
			     		endfor;	
					?>	
				</select>
			</div>
			<div class="collapse" id="Ambiente-collapse">
				<div class="card card-body">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">Change</span>
						</div>
						<input type="text" name="Change" class="form-control" aria-label="Change" aria-describedby="basic-addon1" value="<?=(isset($solicitacao))? $solicitacao['Change']:''?>">
					</div>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">Participantes</span>
						</div>
						<input type="text" name="Participants" class="form-control" aria-label="Change" aria-describedby="basic-addon1" value="<?=(isset($solicitacao))? $solicitacao['Participants']:''?>">
					</div>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<label class="input-group-text">Backup</label>
						</div>
						<select id="Backup" class="custom-select" onchange="abrir(this.value);">
							<option selected>Selecione</option>
							<option value="backup_sim" <?=(isset($solicitacao)&&!empty($solicitacao['Backup']))? 'selected':''?>>Sim</option>
							<option value="backup_nao" <?=(isset($solicitacao)&&empty($solicitacao['Backup']))? 'selected':''?>>Não</option>
						</select>
					</div>
					<div class="collapse" id="backup-collapse">
						<div class="card card-body">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Backup Informação</span>
								</div>
								<input type="text"  name="Backup" class="form-control" aria-label="Change" aria-describedby="basic-addon1" value="<?=(isset($solicitacao))? $solicitacao['Backup']:''?>">
							</div>
						</div>
					</div>
				</div>
				<br>
			</div>
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<label class="input-group-text">SO</label>
				</div>
				<select id="os" class="custom-select" name="SO" onchange="abrir(this.value)" required>
					<option value="">Selecione</option>
					<option value="Windows" <?=(isset($solicitacao)&&$solicitacao['SO']=="Windows")? 'selected':''?>>Windows</option>
					<option value="Linux" <?=(isset($solicitacao)&&$solicitacao['SO']=="Linux")? 'selected':''?>>Linux</option>
				</select>
			</div>
			<div class="collapse" id="os-collapse">
				<div class="card card-body">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<label class="input-group-text">Selecione a Versão do SO</label>
						</div>
						<select class="custom-select" name="Version_SO" required>
							<option value="">Selecione</option>
							<?php 
					     	$count = count($base);
					     	for($i=0; $i<$count; $i++):
						     	if ($base[$i]['Classe'] == "Version SO"):?>
					     			<option value="<?php echo $base[$i]['Valor']?>" <?=(isset($solicitacao)&&$solicitacao['Version SO']==$base[$i]['Valor'])? 'selected':''?>><?php echo $base[$i]['Valor']?></option>'
					     	<?php 
					     		endif;
					     		endfor;	
							?>	
						</select>
					</div>
				</div>
				<br>
			</div>
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<label class="input-group-text">Selecione a Memória</label>
				</div>
				<select class="custom-select" name="Memory" required>						
					<option value="">Selecione</option>
					<?php 
			     	$count = count($base);
			     	for($i=0; $i<$count; $i++):
				     	if ($base[$i]['Classe'] == "Memory"):?>
			     			<option value="<?php echo $base[$i]['Valor']?>" <?=(isset($solicitacao)&&$solicitacao['Memory']==$base[$i]['Valor'])? 'selected':''?>><?php echo $base[$i]['Valor']?></option>'
			     	<?php 
			     		endif;
			     		endfor;	
					?>	
				</select>
			</div>
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<label class="input-group-text">Selecione a CPU (Core)</label>
				</div>
				<select class="custom-select" name="CPU" required>	
					<option value="">Selecione</option>
					<?php 
			     	$count = count($base);
			     	for($i=0; $i<$count; $i++):
				     	if ($base[$i]['Classe'] == "CPU"):?>
			     			<option value="<?php echo $base[$i]['Valor']?>" <?=(isset($solicitacao)&&$solicitacao['CPU']==$base[$i]['Valor'])? 'selected':''?>><?php echo $base[$i]['Valor']?></option>'
			     	<?php 
			     		endif;
			     		endfor;	
					?>	
				</select>
				</select>
			</div>
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<label class="input-group-text">Disco</label>
				</div>
				<button class="btn btn-outline-secondary" type="button" id="b_adicionar_disco">Adicionar</button>
			</div>
			<?php
				if(isset($Disco)){
					$count = count($Disco);
			     	for($i=0; $i<$count; $i++):
			     		?>
			     		<script>var count_hd = <?php echo $i+1;?>;</script>
						
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1">Disco <?php echo $i+1?></span>
							</div>
							<input type="text" name="Disco[]" type="text" required value=<?php echo $Disco[$i]['Tamanho']?> class="form-control" aria-label="Change" aria-describedby="basic-addon1">
							<select class="custom-select" required name="Medida[]">
								<option value="GB">GB</option>
								<option value="MB">MB</option>
								<option value="TB">TB</option>
							</select>
						</div>


			<?php endfor; } else {?>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1">Disco 1</span>
							</div>
							<input type="text" name="Disco[]" type="text" required value="50" class="form-control" aria-label="Change" aria-describedby="basic-addon1">
							<select class="custom-select" required name="Medida[]">
								<option value="GB">GB</option>
								<option value="MB">MB</option>
								<option value="TB">TB</option>
							</select>
						</div>
			<?php };
			?>
							<div id="d_adicionar_disco">

						</div>
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<label class="input-group-text">Rede</label>
				</div>
			 	<button id="b_adicionar_rede" class="btn btn-outline-secondary" type="button">Adicionar</button>
			 </div>
			 <?php
				if(isset($Rede)){
					$count = count($Rede);
			     	for($i=0; $i<$count; $i++):
			     		?>
			     		<script>var count_rede = <?php echo $i+1;?>;</script>
						
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1">Rede <?php echo $i+1?></span>
							</div>
							<select class="custom-select" required name="Rede[]">
								<?php 
						     	$count1 = count($base);
						     	for($ii=0; $ii<$count1; $ii++):
							     	if ($base[$ii]['Classe'] == "Vlan"):?>
						     			<option value="<?php echo $base[$ii]['Valor']?>" <?=(isset($Rede)&&$Rede[$i]['Vlan']==$base[$ii]['Valor'])? 'selected':''?>><?php echo $base[$ii]['Valor']?></option>'
						     	<?php 
						     		endif;
						     	endfor;	
								?>	
							</select>
						</div>


			<?php endfor; } else {?>
			<div class="input-group mb-3">
					<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">Rede 1</span>
					</div>
				<select class="custom-select" required name="Rede[]">
					<option value="Producao">Produção</option>
					<option value="DMZ">DMZ</option>
					<option value="Backup">Backup</option>
				</select>
			</div>
			<?php };
			?>



			<div id="d_adicionar_rede">
			</div>
				<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">Application Name</span>
				</div>
				<input type="text" name="Application_Name" type="text" required class="form-control" aria-label="Change" aria-describedby="basic-addon1" value="<?=(isset($solicitacao))? $solicitacao['Application Name']:''?>">
				</div>
			<div class="input-group mb-3">
					<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">Business Function</span>
					</div>
					<input type="text" name="Business_Function" type="text" required class="form-control" aria-label="Change" aria-describedby="basic-addon1" value="<?=(isset($solicitacao))? $solicitacao['Business Function']:''?>">
				</div>
			<div class="input-group mb-3">
					<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">Contact Team</span>
					</div>
					<input type="text" name="Contact_Team" type="text" required class="form-control" aria-label="Change" aria-describedby="basic-addon1" value="<?=(isset($solicitacao))? $solicitacao['Contact Team']:''?>">
				</div>
			<div class="input-group mb-3">
					<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">Prioridade</span>
					</div>
				<select class="custom-select" name="Priority" required>
					<option value="">Selecione</option>
					<?php 
			     	$count = count($base);
			     	for($i=0; $i<$count; $i++):
				     	if ($base[$i]['Classe'] == "Priority"):?>
			     			<option value="<?php echo $base[$i]['Valor']?>" <?=(isset($solicitacao)&&$solicitacao['Priority']==$base[$i]['Valor'])? 'selected':''?>><?php echo $base[$i]['Valor']?></option>'
			     	<?php 
			     		endif;
			     		endfor;	
					?>	
				</select>
			</div>
			<div class="option">
				<center><button type="submit" name="ID" value="<?php echo $ID?>" class="btn btn-success">Enviar</button></center>
				<br>
			</div>
		</form>
	</main>
	<?php include_once 'partials/footer.php' ?>
</body>
</html>