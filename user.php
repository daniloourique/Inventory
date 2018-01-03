<?php
session_start();
$group = $_SESSION['group'];
$user = $_SESSION['user'];
	if (!isset($_SESSION['user'])) {
		header("Location: login.html");
		exit();
	}
	if($group !== '2') {
		header("Location: login.html");
		exit();	
	}
include "mysql.php";
$sql = 'select * FROM Fila_solicitacao';
$result = mysqli_query($conn, $sql);
$sql_rede = 'select * FROM Rede';
$result_rede = mysqli_query($conn, $sql_rede);
$sql_hd = 'select * FROM HD';
$result_hd = mysqli_query($conn, $sql_hd);

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

						div.options {
							background-color: #ffffff;
							position: relative;
							vertical-align: middle;
							display: block;
							height: 70px;
							width: 70%;
							margin: 0 auto;
						}
						span.options {
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
				}
				
			</style>
		<style type="text/css">
			@import url("css/user.css");
		</style>
		
		<script type="text/javascript">
			$(document).ready(function(){
				var count_hd = 1;
				var count_rede = 1;
				$("#1").hide();
				$("#2").hide();
				$("#3").hide();
				$("#4").hide();
				$("#5").hide();
				$("#6").hide();
				$("#7").hide();
				$(".nova_solicitacao").hide();
				$(".minhas_solicitacoes").hide();
				$(".consulta_baseline").hide();
				$( ".button_nova_solicitacao" ).click(function() {
					$(".minhas_solicitacoes").hide();
					$(".consulta_baseline").hide();
					$(".nova_solicitacao").show();
				});
				$( ".button_minhas_solicitacoes" ).click(function() {
					$(".nova_solicitacao").hide();
					$(".consulta_baseline").hide();
					$(".minhas_solicitacoes").show();
					$(".set").hide();
					$(".selection").show();


				});
				$( ".button_consulta_baseline" ).click(function() {
					$(".nova_solicitacao").hide();
					$(".minhas_solicitacoes").hide();
					$(".consulta_baseline").show();
				});
				$('.windows').click(function() {
					$(".1").show();
					$(".2").show();
					$(".3").show();
					$(".4").show();
					$(".5").show();
					$(".6").hide();
					$(".7").hide();
				});
				$('.linux').click(function() {
					$(".1").hide();
					$(".2").hide();
					$(".3").hide();
					$(".4").hide();
					$(".5").hide();
					$(".6").show();
					$(".7").show();
				});
				$(".PD").click(function() { 
					$(".hidden_pd").show();
				});
				$(".PY").click(function() { 
					$(".hidden_pd").hide();
				});
				$(".DV").click(function() { 
					$(".hidden_pd").hide();
				});
				$(".PP").click(function() { 
					$(".hidden_pd").hide();
				});
				$(".backup_sim").click(function() {
					$(".hidden_backup_info").show();
				});
				$(".backup_nao").click(function() {
					$(".hidden_backup_info").hide();
				});
				$(".windows").click(function() {
					$(".hidden_selecione_so").show();
				});
				$(".linux").click(function() {
					$(".hidden_selecione_so").show();
				});
				$(".b_adicionar_hd").click(function() {
					count_hd++;
					$(".adicionar_hd").append("<div class='option'> <span class='title'>-Disco "+count_hd+"</span> <span class='option_span'><input name=disco[] type='text' required value='0' size='3'> <select name='medida[]' class='adiciona_hd' required><option value='GB'>GB</option><option value='MB'>MB</option><option value='TB'>TB</option></select></span>");
				});

				$(".b_adicionar_rede").click(function() {
					count_rede++;
					$(".adicionar_rede").append("<div class='option'> <span class='title'>-Rede "+count_rede+"</span> <span class='option_span'> <select class='adiciona_rede' name=rede[]required><option value =''>Selecione</option><option value='Producao'>Produção</option><option value='DMZ'>DMZ</option><option value='Backup'>Backup</option></select></span>");
				});
				$(".b_alterar").click(function() {
					$(".selection").hide();
					$(".set").show();
				});


			});

				

			

		</script>
	</head>
	<body>
		<div class="homepage">
			<div class="header">
				<div class="logo">
					<a href="user.php"><img src="agco.png" style="max-width:200px;max-height:200px;"></a>
				</div>
				<div class="login">
					Logout <a href="logout.php"><?php echo $user;?></a>
				</div>
				<div class=menu>
					<button class="button_nova_solicitacao">Nova Solicitação</button>
					<button class="button_minhas_solicitacoes">Minhas Solicitações</button>
					<button class="button_consulta_baseline">Consulta Baseline</button>

				</div>
			</div>
			<div class="main">
				<div class="nova_solicitacao">
					<div class="option">
						<center><h1>Nova Solicitação</h1></center>
					</div>
					<form action="fila_solicitacao.php" method="POST" class="form">
						<div class="option">
								<span class="title">Ambiente</span>
								<span class="option_span">
									<input class="PD" name="Ambiente" type="radio" value="PD" required>
									<span>PD</span>
									<input class="PY" name="Ambiente" type="radio" value="PY" required>
									<span>PY</span>
									<input class="DV" name="Ambiente" type="radio" value="DV" required>
									<span>DV</span>
									<input class="PP" name="Ambiente" type="radio" value="PP" required>
									<span>PP</span>
								</span>
						</div>
						
						<div class="hidden_pd">
							<span class="title">-Change</span>
							<span class="option_span">
								<input type="text" name="change">
							</span>
						</div>
						<div class="hidden_pd">
							<span class="title">-Participantes</span>
							<span class="option_span">
								<input type="text" name="participantes">
							</span>
						</div>
						<div class="hidden_pd">
							<span class="title">-Backup</span>
							<span class="option_span">
								<input class="backup_sim" name="backup" type="radio">
								<span>Sim</span>
								<input class="backup_nao" name="backup" type="radio">
								<span>Não</span>
							</span>
						</div>
						<div class="hidden_backup_info">
							<span class="title">--Backup Informação</span>
							<span class="option_span">
								<input type="text" name="backup_informacao">
							</span>
						</div>
						<div class="option">
							<span class="title">SO</span>
							<span class="option_span">
								<input value="Windows" class="windows" name="os" type="radio" required>
								<span>Windows</span>
								<input value="Linux" class="linux" name="os" type="radio" required>
								<span>Linux</span>
							</span>
						</div>
						<div class="option hidden_selecione_so">
							<span class="title">-Selecione a Versão do SO</span>
							<span class="option_span">
								<select name="versao_os" sytle="float: right;" required>
									<option value="">Selecione</option>
									<option class='1' value="Windows 2008 Standard x86">Windows 2008 Standard x86</option>
									<option class='2' value="Windows 2008 R2 Standard x64">Windows 2008 R2 Standard x64</option>
									<option class='3' value="Windows 2008 R2 Enterprise x64">Windows 2008 R2 Enterprise x64</option>
									<option class='4' value="Windows 2012 R2 Standard x64">Windows 2012 R2 Standard x64</option>
									<option class='5' value="Windows 2012 R2 Enterprise x64">Windows 2012 R2 Enterprise x64</option>
									<option class='6' value="Linux Ubuntu Server 14">Linux Ubuntu Server 14</option>
									<option class='7' value="Linux Ubuntu Server 16">Linux Ubuntu Server 16</option>
								</select>
							</span>
						</div>
						<div class="option">
							<span class="title">Selecione a Memória</span>
							<span class="option_span">
								<select name="memoria" required>
									<option value="">Selecione</option>
									<option id='512' value="512">512 MB</option>
									<option id='1' value="1">1 GB</option>
									<option id='2' value="2">2 GB</option>
									<option id='4' value="4">4 GB</option>
									<option id='8' value="8">8 GB</option>
									<option id='16' value="16">16 GB</option>
									<option id='32' value="32">32 GB</option>
								</select>
							</span>
						</div>
						<div class="option">
							<span class="title">Selecione a CPU (Core)</span>
							<span class="option_span">
								<select name="cpu" required>
									<option value="">Selecione</option>
									<option id='1' value="1">1</option>
									<option id='2' value="2">2</option>
									<option id='3' value="3">3</option>
									<option id='4' value="4">4</option>
									<option id='5' value="5">5</option>
									<option id='6' value="6">6</option>
								</select>
							</span>
						</div>
						<div class="adicionar_hd">
							<div class="option">
								<span class="title" >Discos</span>
								<span class="option_span">									
									<button form="adicionar_hd" class="b_adicionar_hd">Adicionar</button>
								</span>
							</div>
							<div class="option">
								<span class="title">-Disco 1</span>
								<span class="option_span">
									<input class="disco_1" name="disco[]" type="text" required value="50" size="3">
									<select required name="medida[]">
										<option value="GB">GB</option>
										<option value="MB">MB</option>
										<option value="TB">TB</option>
									</select>
								</span>
							</div>
						</div>
						<div class="adicionar_rede">
							<div class="option">
								<span class="title" >Rede</span>
								<span class="option_span">									
									<button form="adicionar_rede" class="b_adicionar_rede">Adicionar</button>
								</span>
							</div>
							<div class="option">
								<span class="title">-Rede 1</span>
								<span class="option_span">
									<select required name="rede[]">
										<option value="Producao">Produção</option>
										<option value="DMZ">DMZ</option>
										<option value="Backup">Backup</option>
									</select>
								</span>
							</div>
						</div>
						<div class="option">
							<span class="title">Application Name</span>
							<span class="option_span">
								<input type="text" name="application_name" required>
							</span>
						</div>
						<div class="option">
							<span class="title">Business Function</span>
							<span class="option_span">
								<input type="text" name="business_function" required>
							</span>
						</div>
						<div class="option">
							<span class="title">Contact Team</span>
							<span class="option_span">
								<input type="text" name="contact_team" required>
							</span>
						</div>
						<div class="option">
							<span class="title">Prioridade</span>
							<span class="option_span">
									<select name="prioridade" required>
										<option value="">Selecione</option>
										<option value="P1">P1</option>
										<option value="P2">P2</option>
										<option value="P3">P3</option>
										<option value="P4">P4</option>
										<option value="P5">P5</option>
									</select>
							</span>
						</div>
						<br><br>
						<div class="option">
							<center><button>Enviar</button></center>
						</div>
					</form>
				</div>
				<div class="minhas_solicitacoes">
					<div class="selection">
							<div class="options">
								<span class="options">
									ID
								</span>
								<span class="options">
									Ambiente
								</span>
								<span class="options">
									User
								</span>
								<span class="options">
									Status
								</span>
								<hr size="1" color="#BEBEBE">
							</div>
							<?php while ($row = mysqli_fetch_array($result)) {
								$hd = null;
								$rede = null;
								if($row["Status"] == "Novo"||$row["Status"] == "Pendente") {
							?>
								<div class="options">
									<span class="options">
										<?php echo $row["ID"];?>
									</span>
									<span class="options">
										<?php echo $row["Environment"];?>
									</span>
									<span class="options">
										<?php echo $row["User"];?>
									</span>
									<span class="options">
										<?php echo $row["Status"];?>
									</span>
									<span style="padding-left: 100px">

									
										<button form="alterar" class="b_alterar" onclick="return my(
											'<?php 
											foreach($result_hd as $hd) {
												if ($row["ID"] == $hd["ID"]) {
													echo "$hd[Tamanho];";
												}
											}
											?>'
											,'<?php 
											foreach($result_hd as $hd) {
												if ($row["ID"] == $hd["ID"]) {
													echo "$hd[Medida];";
												}
											}
											?>'
											,'<?php foreach($result_rede as $rede) {
												if ($row["ID"] == $rede["ID"]) {
													echo $rede["Vlan"];
												}
											}
											?>'
											,'<?php echo $row['ID']?>'
											,'<?php echo $row['Application Name']?>'
											,'<?php echo $row['User']?>' 
											,'<?php echo $row['Environment']?>' 
											,'<?php echo $row['Backup']?>' 
											,'<?php echo $row['Business Function']?>' 
											,'<?php echo $row['Change']?>' 
											,'<?php echo $row['Contact Team']?>' 
											,'<?php echo $row['CPU']?>' 
											,'<?php echo $row['Fila']?>' 
											,'<?php echo $row['Memory']?>' 
											,'<?php echo $row['Participants']?>' 
											,'<?php echo $row['Priority']?>' 
											,'<?php echo $row['SO']?>' 
											,'<?php echo $row['State']?>' 
											,'<?php echo $row['Type']?>' 
											,'<?php echo $row['Version SO']?>'
											,'<?php echo $row['Status']?>' 
											)">
												Alterar
										</button>
									</span>
									<hr size="1" color="#F0F0F0">
								</div>
							<?php }}?> 
					</div>
					<script type="text/javascript">
						function my(tamanho, medida, rede, id, Aplicacao, user, environment, backup, business_function, change, contact_team, cpu, fila, memory, participants, priority, so, state, tipo, version_os, status){
							$('.title-h1').empty();
							$('.adicionar').empty();
							$('.title-h1').append("<center><h1 class='title-primary'>Solicitação ID "+id+"</h1></center><input type='hidden' name='id' value="+id+">");	
							$('.'+environment).prop("checked", true);
							if (environment ==  "PD") {
								$(".hidden_pd").show();
								$('.change').val(change);	
								$('.participants').val(participants);
								if (backup != null) {
									$('.backup_sim').prop("checked", true);
									$(".hidden_backup_info").show();
									$('.backup').val(backup);		
								}
							} else {$(".hidden_pd").hide();$('.change').val(null);$('.participants').val(null);$(".hidden_backup_info").hide();$('.backup').val(null);}
							$('.application_name').val(Aplicacao);
							$('.business_function').val(business_function);
							$('.contact_team').val(contact_team);
							$('.priority').val(priority);
							$('.cpu').val(cpu);
							$('.memory').val(memory);
							if (so == "Windows") {
								$('.'+so).prop("checked", true);
								$(".hidden_selecione_so").show();
								$(".1").show();
								$(".2").show();
								$(".3").show();
								$(".4").show();
								$(".5").show();
								$(".6").hide();
								$(".7").hide();
							}
							if (so == "Linux") {
								$('.'+so).prop("checked", true);
								$(".hidden_selecione_so").show();
								$(".1").hide();
								$(".2").hide();
								$(".3").hide();
								$(".4").hide();
								$(".5").hide();
								$(".6").show();
								$(".7").show();
							}
							$('.versao_os').val(version_os);
							var letter = ';';
							var count = 0;
							for (var position = 0; position < tamanho.length; position++) {
								if (tamanho.charAt(position) == letter) {
							       count += 1;
							    }
							}
							var count_rede = 1;
							var position = 1;
							var restante = 0;
							var disk;
							var medida;
							for (position = 0;position < count; position) {

								disk = tamanho.replace(/(\w+)(;.*)/,"$1");
							    disk_medida = medida.replace(/(\w+)(;.*)/,"$1");
							    tamanho = tamanho.replace(/(\w+)(;)(\w+)/,"$3");
							    medida = medida.replace(/(\w+)(;)(\w+)/,"$3");
							    position++;
								$(".adicionar").append("<div class='option'> <span class='title'>-Disco "+position+"</span> <span class='option_span'><input name=disco[] type='text' required  value="+disk+" size='3'> <select name='medida[]' class='medida_hd"+position+"' value= '"+disk_medida+"' required><option value='GB'>GB</option><option value='MB'>MB</option><option value='TB'>TB</option></select></span>");
								$(".medida_hd"+position+"").val(disk_medida);
							}
							
							$(".a_b_adicionar_hd").click(function() {
								position++;
								$(".adicionar").append("<div class='option'> <span class='title'>-Disco "+position+"</span> <span class='option_span'><input name=disco[] type='text' required value='0' size='3'> <select name='medida[]' class='medida_hd"+position+"' required><option value='GB'>GB</option><option value='MB'>MB</option><option value='TB'>TB</option></select></span>");
							});
							$(".a_b_adicionar_rede").click(function() {
								count_rede++;
								$(".adicionar_rede").append("<div class='option'> <span class='title'>-Rede "+count_rede+"</span> <span class='option_span'> <select class='adiciona_rede' name=rede[]required><option value =''>Selecione</option><option value='Producao'>Produção</option><option value='DMZ'>DMZ</option><option value='Backup'>Backup</option></select></span>");
							});
	

					
						}; // Button that triggered the modal								
					</script>
					<div class="set">
						<div class="option title-h1">
							
						</div>
						<form action="fila_solicitacao.php" method="POST" class="form">



							<div class="option">
									<span class="title">Ambiente</span>
									<span class="option_span">
										<input class="PD" name="Ambiente" type="radio" value="PD" required>
										<span>PD</span>
										<input class="PY" name="Ambiente" type="radio" value="PY" required>
										<span>PY</span>
										<input class="DV" name="Ambiente" type="radio" value="DV" required>
										<span>DV</span>
										<input class="PP" name="Ambiente" type="radio" value="PP" required>
										<span>PP</span>
									</span>
							</div>
							
							<div class="hidden_pd">
								<span class="title">-Change</span>
								<span class="option_span">
									<input class="change" type="text" name="change">
								</span>
							</div>
							<div class="hidden_pd">
								<span class="title">-Participantes</span>
								<span class="option_span">
									<input class="participants" type="text" name="participantes">
								</span>
							</div>
							<div class="hidden_pd">
								<span class="title">-Backup</span>
								<span class="option_span">
									<input class="backup_sim" name="backup" type="radio">
									<span>Sim</span>
									<input class="backup_nao" name="backup" type="radio">
									<span>Não</span>
								</span>
							</div>
							<div class="hidden_backup_info">
								<span class="title">--Backup Informação</span>
								<span class="option_span">
									<input class="backup" type="text" name="backup_informacao">
								</span>
							</div>
							<div class="option">
								<span class="title">SO</span>
								<span class="option_span">
									<input value="Windows" class="Windows" name="os" type="radio" required>
									<span>Windows</span>
									<input value="Linux" class="Linux" name="os" type="radio" required>
									<span>Linux</span>
								</span>
							</div>
							<div class="option hidden_selecione_so">
								<span class="title">-Selecione a Versão do SO</span>
								<span class="option_span">
									<select class="versao_os" name="versao_os" sytle="float: right;" required>
										<option value="">Selecione</option>
										<option class='1' value="Windows 2008 Standard x86">Windows 2008 Standard x86</option>
										<option class='2' value="Windows 2008 R2 Standard x64">Windows 2008 R2 Standard x64</option>
										<option class='3' value="Windows 2008 R2 Enterprise x64">Windows 2008 R2 Enterprise x64</option>
										<option class='4' value="Windows 2012 R2 Standard x64">Windows 2012 R2 Standard x64</option>
										<option class='5' value="wWindows 2012 R2 Enterprise x64">Windows 2012 R2 Enterprise x64</option>
										<option class='6' value="Linux Ubuntu Server 14">Linux Ubuntu Server 14</option>
										<option class='7' value="Linux Ubuntu Server 16">Linux Ubuntu Server 16</option>
									</select>
								</span>
							</div>
							<div class="option">
								<span class="title">Selecione a Memória</span>
								<span class="option_span">
									<select class="memory" name="memoria" required>
										<option value="">Selecione</option>
										<option id='512' value="512">512 MB</option>
										<option id='1' value="1">1 GB</option>
										<option id='2' value="2">2 GB</option>
										<option id='4' value="4">4 GB</option>
										<option id='8' value="8">8 GB</option>
										<option id='16' value="16">16 GB</option>
										<option id='32' value="32">32 GB</option>
									</select>
								</span>
							</div>
							<div class="option">
								<span class="title">Selecione a CPU (Core)</span>
								<span class="option_span">
									<select class="cpu" name="cpu" required>
										<option value="">Selecione</option>
										<option id='1' value="1">1</option>
										<option id='2' value="2">2</option>
										<option id='3' value="3">3</option>
										<option id='4' value="4">4</option>
										<option id='5' value="5">5</option>
										<option id='6' value="6">6</option>
									</select>
								</span>
							</div>
							<div class="set_adicionar_hd">
								<div class="option">
									<span class="title" >Discos</span>
									<span class="option_span">									
										<button form="adicionar_hd" class="a_b_adicionar_hd">Adicionar</button>
									</span>
								</div>
								<div class="adicionar">
								</div>

							</div>
							<div class="adicionar_rede">
								<div class="option">
									<span class="title" >Rede</span>
									<span class="option_span">									
										<button form="adicionar_rede" class="b_adicionar_rede">Adicionar</button>
									</span>
								</div>
								<div class="option">
									<span class="title">-Rede 1</span>
									<span class="option_span">
										<select required name="rede[]">
											<option value="Producao">Produção</option>
											<option value="DMZ">DMZ</option>
											<option value="Backup">Backup</option>
										</select>
									</span>
								</div>
							</div>
							<div class="option">
								<span class="title">Application Name</span>
								<span class="option_span">
									<input type="text" class="application_name" name="application_name" required>
								</span>
							</div>
							<div class="option">
								<span class="title">Business Function</span>
								<span class="option_span">
									<input type="text" class="business_function" name="business_function" required>
								</span>
							</div>
							<div class="option">
								<span class="title">Contact Team</span>
								<span class="option_span">
									<input type="text" class="contact_team" name="contact_team" required>
								</span>
							</div>
							<div class="option">
								<span class="title">Prioridade</span>
								<span class="option_span">
										<select class="priority" name="prioridade" required>
											<option value="">Selecione</option>
											<option value="P1">P1</option>
											<option value="P2">P2</option>
											<option value="P3">P3</option>
											<option value="P4">P4</option>
											<option value="P5">P5</option>
										</select>
								</span>
							</div>
							<br><br>
							<div class="option">
								<center><button>Enviar</button></center>
							</div>
						</form>
						</div>
				</div>
				<div class="consulta_baseline">
					consulta_baseline
				</div>
			</div>
		</div>
	</body>
</html>