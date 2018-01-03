<?php
// Parametros de Conexão com o Banco
include "mysql.php";
$sql = 'select * FROM Fila_solicitacao';
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="js/modelo/slim.js"></script>
	<script src="js/modelo/popper.min.js"></script>
	<script src="js/modelo/boostrap.min.js"></script>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script>
		$('#myModal').on('shown.bs.modal', function () {
				$('#myInput').trigger('focus')
		})
	</script>
	
	<style>
body,html {
			height: 100%;
			width: 100%;
			background-color: #404040;
			padding-top: 50px;
			
			margin: 0;
			
		}

		div.option {
			background-color: #ffffff;
			position: relative;
			vertical-align: middle;
			display: block;
			height: 70px;
			width: 70%;
			margin: 0 auto;
		}
		span.option {
			font-family: consolas;
			position: relative;
			display: inline-block;
			margin-left: 50px;
			padding-top: 20px;
			height: 50%;
			width: 100px;
			}
		.opacity {
			display: block;
			position: relative;
			height: 100%;
			width: 100%;
			background-color: #404040;

		}
		
	</style>
</head>
<body>
	<form action="#" method="POST">
	<div class="option">
		<span class="option">
			ID
		</span>
		<span class="option">
			Ambiente
		</span>
		<span class="option">
			User
		</span>
		<span class="option">
			Status
		</span>
		<hr size="1" color="#BEBEBE">
	</div>
	<?php while ($row = mysqli_fetch_array($result)) {
		if($row["Status"] == "Novo"||$row["Status"] == "Revisar") {

	?>
	<div class="option">
		<span class="option">
			<?php echo $row["ID"];?>
		</span>
		<span class="option">
			<?php echo $row["Environment"];?>
		</span>
		<span class="option">
			<?php echo $row["User"];?>
		</span>
		<span class="option">
			<?php echo $row["Status"];?>
		</span>
		<span style="padding-left: 100px">
			<button type = "button" class = "btn btn-primary" data-toggle = "modal" data-target = "#form" name = "id" value = <?php echo $row['ID']?> 
				data-id = "<?php echo $row['ID']?>" 
				data-solicitante = "<?php echo $row['User']?>" 
				data-ambiente = "<?php echo $row['Environment']?>" 
				data-aplicacao = "<?php echo $row['Application Name']?>" 
				data-backup = "<?php echo $row['Backup']?>" 
				data-business_function = "<?php echo $row['Business Function']?>" 
				data-change = "<?php echo $row['Change']?>" 
				data-contact_team = "<?php echo $row['Contact Team']?>" 
				data-cpu = "<?php echo $row['CPU']?>" 
				data-fila = "<?php echo $row['Fila']?>" 
				data-memoria = "<?php echo $row['Memory']?>" 
				data-participantes = "<?php echo $row['Participants']?>" 
				data-prioridade = "<?php echo $row['Priority']?>" 
				data-so = "<?php echo $row['SO']?>" 
				data-estado = "<?php echo $row['State']?>" 
				data-tipo = "<?php echo $row['Tipo']?>" 
				data-versao_so = "<?php echo $row['Version SO']?>"
				data-status = "<?php echo $row['Status']?>" 
			>
				Alterar
			</button>
		</span>
		<hr size="1" color="#F0F0F0">
	</div>
	</form>
	<?php } }?> 
	<div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="formLabel" aria-hidden="true">
		<div class="modal-dialog" style="padding: 0px;" role="document">
		<div class="modal-content" style="width: 1300px;margin: 0 auto;">
			<form action="adicionar.php" method="POST">
			<script type="text/javascript">
				$(document).ready(function(){
					$('#form').on('show.bs.modal', function (event) {
						var button = $(event.relatedTarget); // Button that triggered the modal
						var id = button.data('id');
						var Solicitante = button.data('solicitante'); // Extract info from data-* attributes
						var Ambiente = button.data('ambiente');
						var Aplicacao = button.data('aplicacao');
						var Backup = button.data('backup');
						var Business_Function = button.data('business_function');
						var Change = button.data('change');
						var Contact_Team = button.data('contact_team');
						var CPU = button.data('cpu');
						var Fila = button.data('fila');
						var Memoria = button.data('memoria');
						var Participantes = button.data('participantes');
						var Prioridade = button.data('prioridade');
						var SO = button.data('so');
						var Estado = button.data('estado');
						var Tipo = button.data('tipo');
						var Versao_SO = button.data('versao_so');
						var Status = button.data('status');
						 
						// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
						// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
						var modal = $(this);
						modal.find('.modal-title').text('Solicitação ID ' + id);
						modal.find('.modal-body #id').val(id);
						modal.find('.modal-body #Solicitante').val(Solicitante);
						modal.find('.modal-body #Ambiente').val(Ambiente);
						modal.find('.modal-body #Aplicacao').val(Aplicacao);
						modal.find('.modal-body #Backup').text(Backup);
						modal.find('.modal-body #Business_Function').text(Business_Function);
						modal.find('.modal-body #Change').val(Change);
						modal.find('.modal-body #Contact_Team').text(Contact_Team);
						modal.find('.modal-body #CPU').val(CPU);
						modal.find('.modal-body #Fila').val(Fila);
						modal.find('.modal-body #Memoria').val(Memoria);
						modal.find('.modal-body #Participantes').text(Participantes);
						modal.find('.modal-body #Prioridade').val(Prioridade);
						modal.find('.modal-body #SO').val(SO);
						modal.find('.modal-body #Estado').val(Estado);
						modal.find('.modal-body #Tipo').val(Tipo);
						modal.find('.modal-body #Versao_SO').val(Versao_SO);
						modal.find('.modal-header #Status').val(Status);

					});
				});
			</script>
				<div class="modal-header">
					<h5 class="modal-title" id="formLabel">New message</h5>
					<span style="">
						<h6>Status<h6>
						<select id="Status" name="Status" value="Status">
							<option value="Novo">Novo</option>
							<option value="Pendente">Pendente</option>
							<option value="Pendente">Revisar</option>
							<option value="Concluído">Concluído</option>
						</select>
					</span>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>
				<div class="modal-body">
				<div class="form-group">
					<span style="display: inline-block;">
						<label for="message-text" class="col-form-label">ID*</label>
						<input type="text" name="id" class="form-control" id="id" style="width: 100px;" required>
					</span>
					<span style="display: inline-block;">
						<label for="message-text" class="col-form-label">Solicitante*</label>
						<input type="text" class="form-control" id="Solicitante" style="width: 150px;" required>
					</span>
					<span style="display: inline-block;">
						<label for="message-text" class="col-form-label">Ambiente*</label>
						<input type="text" name="Environment" class="form-control" id="Ambiente" style="width: 100px;" required>
					</span>
					<span style="display: inline-block;">
						<label for="message-text" class="col-form-label">Prioridade*</label>
						<input type="text" name="Priority" class="form-control" id="Prioridade" style="width: 100px;" required>
					</span>
				 	<span style="display: inline-block;">
						<label for="message-text" class="col-form-label">Aplicação*</label>
						<input type="text" name="Application_name" class="form-control" id="Aplicacao" style="width: 200px;" required>
					</span>
				 	<span style="display: inline-block;">
						<label for="message-text" class="col-form-label">CPU*</label>
						<input type="text" name="CPU" class="form-control" id="CPU" style="width: 70px;" required>
				 	</span>
				 	<span style="display: inline-block;">
						<label for="message-text" class="col-form-label">Memória*</label>
						<input type="text" name="Memory" class="form-control" id="Memoria" style="width: 80px;" required>
				 	</span>
				 	<span style="display: inline-block;">
						<label for="message-text" class="col-form-label">SO*</label>
						<input type="text" name="SO" class="form-control" id="SO" style="width: 100px;" required>
					</span>
					<span style="display: inline-block;">
						<label for="message-text" class="col-form-label">Versão SO*</label>
						<input type="text" name="Operating_System" class="form-control" id="Versao_SO" style="width: 300px;" required>
					</span>
					<span style="display: inline-block;">
						<label for="message-text" class="col-form-label">Backup*</label>
						<textarea name="Backup" class="form-control" id="Backup"  style="width: 300px;height: 40px;" rows="1"></textarea required>
					</span>
					<span style="display: inline-block;">
						<label for="message-text" class="col-form-label">Função*</label>
						<textarea name="Business_Function" class="form-control" id="Business_Function"  style="width: 300px;height: 40px;;" rows="1"></textarea required>
					</span>
					<span style="display: inline-block;">
						<label for="message-text" class="col-form-label">Contato*</label>
						<textarea name="Contact_Team" class="form-control" id="Contact_Team" style="width: 300px;height: 40px;;" rows="1"></textarea required>
					</span>
					<span style="display: inline-block;">
						<label for="message-text" class="col-form-label">Participantes*</label>
						<textarea name="Participantes" class="form-control" id="Participantes" style="width: 300px;height: 40px;;" rows="1"></textarea required>
					</span><br>
					<span style="display: inline-block;">
						<label for="message-text" class="col-form-label">Host Name*</label>
						<input type="text" name="Host_Name" class="form-control" id="host_name" style="width: 150px;" required>
					</span>
					<span style="display: inline-block;">
						<label for="message-text" class="col-form-label">DNS Name 1*</label>
						<input type="text" name="DNS_name_1" class="form-control" id="dns_name_1" style="width: 250px;" required>
					</span>
					<span style="display: inline-block;">
						<label for="message-text" class="col-form-label">DNS Name 2</label>
						<input type="text" name="DNS_name_2" class="form-control" id="dns_name_2" style="width: 250px;">
					</span>
					<span style="display: inline-block;">
						<label for="message-text" class="col-form-label">Responsável*</label>
						<input type="text" name="Responsable" class="form-control" id="responsable" style="width: 100px;" required>
					</span>
					<span style="display: inline-block;">
						<label for="message-text" class="col-form-label">Crítico*</label>
						<select  name="Critical" class="form-control" required>
							<option class="form-control" value="sim">Sim</option>
							<option value="nao">Não</option>
						</select>
					</span>
					<span style="display: inline-block;">
						<label for="message-text" class="col-form-label">Virtualização*</label>
						<select name="Virt_Plataform" class="form-control" required>
							<option value="">Selecione</option>
							<option value="vmware">VMware</option>
							<option value="hyper-v">Hyper-V</option>
						</select>
					</span>
					<span style="display: inline-block;">
						<label for="message-text" class="col-form-label">Cluster</label>
						<input type="text" name="Fail_Over_Cluster_or_VMwware_Datacenter" class="form-control" id="Fail_Over_Cluster_or_VMwware_Datacenter" style="width: 300px;">
					</span>
					<span style="display: inline-block;">
						<label for="message-text" class="col-form-label">Data Center*</label>
						<select name="Data_center" class="form-control">
							<option value="">Selecione</option>
							<option value="canoas">Canoas</option>
							<option value="mogi das cruzes">Mogi das Cruzes</option>
							<option value="santa rosa">Santa Rosa</option>
							<option value="ibiruba">Ibirubá</option>
							<option value="jundiai">Jundiaí</option>
							<option value="haedo">Haedo</option>
							<option value="general rodriguez">General Rodriguez</option>
							<option value="ernestina">Ernestina</option>
							<option value="ribeirao preto">Ribeirão Preto</option>
							<option value="haedo">Haedo</option>
						</select>
					</span>
					<span style="display: inline-block;">
						<label for="message-text" class="col-form-label">Domínio*</label>
						<input type="text" name="Domain" class="form-control" id="Domain" style="width: 200px;" required>
					</span>
					<span style="display: inline-block;">
						<label for="message-text" class="col-form-label">Time Zone*</label>
						<input type="text" name="Time_Zone" class="form-control" id="Time_Zone" style="width: 100px;" required>
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
						<input type="text" name="SERVER_MAKE" class="form-control" id="SERVER_MAKE" style="width: 100px;">
					</span>
					<span style="display: inline-block;">
						<label for="message-text" class="col-form-label">Server Model</label>
						<input type="text" name="SERVER_MODEL" class="form-control" id="SERVER_MODEL" style="width: 100px;">
					</span>
					<span style="display: inline-block;">
						<label for="message-text" class="col-form-label">Server Type</label>
						<input type="text" name="SERVER_TYPE" class="form-control" id="SERVER_TYPE" style="width: 100px;">
					</span>
					<span style="display: inline-block;">
						<label for="message-text" class="col-form-label">Console Remote Access</label>
						<input type="text" name="Console_Remote_Access" class="form-control" id="Console_Remote_Access" style="width: 200px;">
					</span>
					<span style="display: inline-block;">
						<label for="message-text" class="col-form-label">Service Tag</label>
						<input type="text" name="Service_Tag" class="form-control" id="Service_Tag" style="width: 100px;">
					</span>
					<span style="display: inline-block;">
						<label for="message-text" class="col-form-label">Garantia Final</label>
						<input type="text" name="Warranty_end" class="form-control" id="Warranty_end" style="width: 150px;" >
					</span>
					<span style="display: inline-block;">
						<label for="message-text" class="col-form-label">Estado*</label>
						<select name="State" class="form-control" required>
							<option value="">Selecione</option>
							<option value="operacional">Operacional</option>
							<option value="descontinuado">Descontinuado</option>
							<option value="implementando">Implementando</option>
						</select>
					</span>
					<span style="display: inline-block;">
						<label for="message-text" class="col-form-label">Tipo*</label>
						<select name="Type" class="form-control">
							<option value="">Selecione</option>
							<option value="fisico">Físico</option>
							<option value="virtual">Virtual</option>
							<option value="ampliance">Amppliance</option>
							<option value="recurso de cluster">Recurso de Cluster</option>
							<option value="outro">Outro</option>
						</select>
					</span>

					<span style="display: inline-block;position: relative;margin-left: 4px;">
						<label for="message-text" class="col-form-label">OBS:</label>
						<textarea name="OBS" class="form-control" id="obs" rows="3" cols="400"></textarea>
					</span>
				</div>
							<div class="modal-footer">
				<button type="reset" value="Reset" class="btn btn-secondary" data-dismiss="modal">Sair</button>
				<button type="submit" value="Submit" class="btn btn-primary">Concluir</button>
			</div>
			</form>
			</div>

		</div>
		</div>
	</div>
	 <?php  mysqli_close($conn);?>
</table>
</body>
</html>





