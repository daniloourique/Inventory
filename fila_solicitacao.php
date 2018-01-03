<?php
session_start();
//Remove SA\ e sa\ do login
$arr = array('sa\\' => "",'SA\\' => "");
$user = strtr($_SESSION['user'],$arr);

//Post da página user.php
$ambiente = $_POST['Ambiente'];
$change = $_POST['change'];
$participantes = $_POST['participantes'];
$backup_informacao = $_POST['backup_informacao'];
$os = $_POST['os'];
$versao_os = $_POST['versao_os'];
$memoria = $_POST['memoria'];
$cpu = $_POST['cpu'];
$application_name = $_POST['application_name'];
$business_function = $_POST['business_function'];
$contact_team = $_POST['contact_team'];
$prioridade = $_POST['prioridade'];
$hd = $_POST['disco'];
$medida = $_POST['medida'];
$rede = $_POST['rede'];

// Parametros de Conexão com o Banco
include "mysql.php";

// Insere na tabela Fila_solicitacao as informações da Nova Solicitação
$sql = 'Insert into Fila_solicitacao (`Environment`, `Application Name`, `Backup`, `Business Function`, `Change`, `Contact Team`, `CPU`, `Memory`, `Participants`, `Priority`, `SO`, `Status`, `Type`, `Version SO`, `User`, `Fila`) values ("'.$ambiente.'","'.$application_name.'","'.$backup_informacao.'","'.$business_function.'","'.$change.'","'.$contact_team.'","'.$cpu.'","'.$memoria.'","'.$participantes.'","'.$prioridade.'","'.$os.'","Novo","'.$tipo.'","'.$versao_os.'","'.$user.'",2)';
if (mysqli_query($conn, $sql)) {
} else {echo "Error: " . $sql . "<br>" . mysqli_error($conn);}

$id = mysqli_insert_id($conn);

// Insere na tabela HD as informações de HD
for($i=0;$hd[$i] !="";$i++){
	$sql_hd = 'Insert into HD (`ID`,`Tamanho`,`Medida`,`Disco_N`) values ("'.$id.'","'.$hd[$i].'","'.$medida[$i].'","Disco_'.$i.'")';
	if (mysqli_query($conn, $sql_hd)) {
	} else {echo "Error: " . $sql_hd . "<br>" . mysqli_error($conn);}
}

// Insere na tabela Rede as informações de Rede
for($i=0;$rede[$i] !="";$i++){
	$sql_rede = 'Insert into Rede (`ID`,`Vlan`) values ("'.$id.'","'.$rede[$i].'")';
	if (mysqli_query($conn, $sql_rede)) {
	} else {echo "Error: " . $sql_rede . "<br>" . mysqli_error($conn);}
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
"<?php echo $ambiente;?>"<br>
"<?php echo $change;?>"<br>
"<?php echo $participantes;?>"<br>
"<?php echo $backup_informacao;?>"<br>
"<?php echo $os;?>"<br>
"<?php echo $versao_os;?>"<br>
"<?php echo $memoria;?>"<br>
"<?php echo $cpu;?>"<br>
"<?php echo $application_name;?>"<br>
"<?php echo $business_function;?>"<br>
"<?php echo $contact_team;?>"<br>
"<?php echo $prioridade;?>"<br>
</body>
</html>