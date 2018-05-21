<?php
	include "mysql.php";
	if(isset($_POST['mysql'])){
		if($_POST['mysql'] == 'update'||$_POST['mysql'] == 'insert'){
			$server = $_POST['server'];
			$Host_Name = $_POST['Host_Name'];
			$DNS_name_1 = $_POST['DNS_name_1'];
			$DNS_name_2 = $_POST['DNS_name_2'];
			$State = $_POST['State'];
			$Responsable = $_POST['Responsable'];
			$Critical = $_POST['Critical'];
			$Priority = $_POST['Priority'];
			$Type = $_POST['Type'];
			$Virtualization = $_POST['Virtualization'];
			$Cluster = $_POST['Cluster'];
			$Business_Function = $_POST['Business_Function'];
			$Application_name = $_POST['Application_name'];
			$Environment = $_POST['Environment'];
			$Contact_Team = $_POST['Contact_Team'];
			$Data_center = $_POST['Data_Center'];
			$Domain = $_POST['Domain'];
			$Version_SO = $_POST['Version_SO'];
			$Time_Zone = $_POST['Time_Zone'];
			$Network_Adapter = $_POST['Network_Adapter'];
			$MAC_Address = $_POST['MAC_Address'];
			$IP_Address_Adapter_1 = $_POST['IP_Address_Adapter_1'];
			$IP_Address_Adapter_2 = $_POST['IP_Address_Adapter_2'];
			$IP_Address_Adapter_3 = $_POST['IP_Address_Adapter_3'];
			$IP_Address_Adapter_4 = $_POST['IP_Address_Adapter_4'];
			$Default_Gateway = $_POST['Default_Gateway'];
			$DNS_Primary = $_POST['DNS_Primary'];
			$DNS_Secondary = $_POST['DNS_Secondary'];
			$SERVER_MAKE = $_POST['SERVER_MAKE'];
			$SERVER_MODEL = $_POST['SERVER_MODEL'];
			$SERVER_TYPE = $_POST['SERVER_TYPE'];
			$Console_Remote_Access = $_POST['Console_Remote_Access'];
			$Service_Tag_serial = $_POST['Service_Tag_serial'];
			$SO = $_POST['SO'];
			$CPU = $_POST['CPU'];
			$Core = $_POST['Core'];
			$Socket = $_POST['Socket'];
			$Memory = $_POST['Memory'];
			$Backup = $_POST['Backup'];
			$Participantes = $_POST['Participantes'];
			$Warranty_end = $_POST['Warranty_end'];
			$mysql = $_POST['mysql'];
		}	
	}


	//Nova solicitacao
	if(isset($_POST['ID'])&&empty($_POST['ID'])){
		session_start();
		//Remove SA\ e sa\ do login
		$arr = array('sa\\' => "",'SA\\' => "");
		$user = strtr($_SESSION['user'],$arr);
		$Environment = $_POST['Environment'];
		$Change = $_POST['Change'];
		$Participants = $_POST['Participants'];
		$Backup = $_POST['Backup'];
		$SO = $_POST['SO'];
		$Version_SO = $_POST['Version_SO'];
		$Memory = $_POST['Memory'];
		$CPU = $_POST['CPU'];
		$Core = $_POST['Core'];
		$Socket = $_POST['Socket'];
		$Disco = $_POST['Disco'];
		$Medida = $_POST['Medida'];
		$Rede = $_POST['Rede'];
		$Application_Name = $_POST['Application_Name'];		
		$Business_Function = $_POST['Business_Function'];
		$Contact_Team = $_POST['Contact_Team'];
		$Priority = $_POST['Priority'];
	
		// Insere na tabela Fila_solicitacao as informações da Nova Solicitação
		$sql = 'Insert into Fila_solicitacao (`Environment`, `Application Name`, `Backup`, `Business Function`, `Change`, `Contact Team`, `CPU`, `Core`, `Socket`, `Memory`, `Participants`, `Priority`, `SO`, `Status`, `Version SO`, `User`) values ("'.$Environment.'","'.$Application_Name.'","'.$Backup.'","'.$Business_Function.'","'.$Change.'","'.$Contact_Team.'","'.$CPU.'","'.$Core.'","'.$Socket.'","'.$Memory.'","'.$Participants.'","'.$Priority.'","'.$SO.'","Novo","'.$Version_SO.'","'.$user.'")';
		if (mysqli_query($conn, $sql)) {
		} else {echo "Error: " . $sql . "<br>" . mysqli_error($conn);}
		$id = mysqli_insert_id($conn);

		// Insere na tabela HD as informações de HD
		$count = count($Disco);
		for($i=0;$i<$count;$i++){
			$sql_Disco = 'Insert into Disco (`ID`,`Tamanho`,`Medida`) values ("'.$id.'","'.$Disco[$i].'","'.$Medida[$i].'")';
			if (mysqli_query($conn, $sql_Disco)) {
			} else {echo "Error: " . $sql_Disco . "<br>" . mysqli_error($conn);}
		}

		// Insere na tabela Rede as informações de Rede
		$count = count($Rede);
		for($i=0;$i<$count;$i++){
			$sql_Rede = 'Insert into Rede (`ID`,`Vlan`) values ("'.$id.'","'.$Rede[$i].'")';
			if (mysqli_query($conn, $sql_Rede)) {
			} else {echo "Error: " . $sql_Rede . "<br>" . mysqli_error($conn);}
		}
		goto end;
	}

	if(isset($_POST['mysql'])&&$_POST['mysql'] == "update"){
		$sql = 'update Hardware set `Host Name`="'.$Host_Name.'", `DNS name 1`="'.$DNS_name_1.'", `DNS name 2`="'.$DNS_name_2.'", `State`="'.$State.'", `Responsable`="'.$Responsable.'", `Critical`="'.$Critical.'", `Priority`="'.$Priority.'", `Type`="'.$Type.'", `Virtualization`="'.$Virtualization.'", `Cluster`="'.$Cluster.'", `Business Function`="'.$Business_Function.'", `Application Name`="'.$Application_name.'", `Environment`="'.$Environment.'", `Contact Team`="'.$Contact_Team.'", `Data center`="'.$Data_center.'", `Domain`="'.$Domain.'", `Version SO`="'.$Version_SO.'", `Time Zone`="'.$Time_Zone.'", `Network Adapter`="'.$Network_Adapter.'", `MAC Address`="'.$MAC_Address.'", `IP Address Adapter 1`="'.$IP_Address_Adapter_1.'", `IP Address Adapter 2`="'.$IP_Address_Adapter_2.'", `IP Address Adapter 3`="'.$IP_Address_Adapter_3.'", `IP Address Adapter 4`="'.$IP_Address_Adapter_4.'", `Default Gateway`="'.$Default_Gateway.'", `DNS Primary`="'.$DNS_Primary.'", `DNS Secondary`="'.$DNS_Secondary.'", `SERVER MAKE`="'.$SERVER_MAKE.'", `SERVER MODEL`="'.$SERVER_MODEL.'", `SERVER TYPE`="'.$SERVER_TYPE.'", `Console Remote Access`="'.$Console_Remote_Access.'", `Service Tag`="'.$Service_Tag_serial.'", `Warranty end`="'.$Warranty_end.'", `SO`="'.$SO.'", `CPU`="'.$CPU.'", `Core`="'.$Core.'", `Socket`="'.$Socket.'", `Memory`="'.$Memory.'", `Backup`="'.$Backup.'", `Participantes`="'.$Participantes.'" WHERE `Host Name`="'.$server.'"';
	}
	if(isset($_POST['mysql'])&&$mysql == "insert"){
		$sql = 'Insert into Hardware (`Host Name`, `DNS name 1`, `DNS name 2`, `State`, `Responsable`, `Critical`, `Priority`, `Type`, `Virtualization`, `Cluster`, `Business Function`, `Application Name`, `Environment`, `Contact Team`, `Data Center`, `Domain`, `Version SO`, `Time Zone`, `Network Adapter`, `MAC Address`, `IP Address Adapter 1`, `IP Address Adapter 2`, `IP Address Adapter 3`, `IP Address Adapter 4`, `Default Gateway`, `DNS Primary`, `DNS Secondary`, `SERVER MAKE`, `SERVER MODEL`, `SERVER TYPE`, `Console Remote Access`, `Service Tag`, `Warranty end`, `SO`, `CPU`, `Core`, `Socket`, `Memory`, `Backup`, `Participantes`) values ("'.$Host_Name.'","'.$DNS_name_1.'","'.$DNS_name_2.'","'.$State.'","'.$Responsable.'","'.$Critical.'","'.$Priority.'","'.$Type.'","'.$Virtualization.'","'.$Cluster.'","'.$Business_Function.'","'.$Application_name.'","'.$Environment.'","'.$Contact_Team.'","'.$Data_center.'","'.$Domain.'","'.$Version_SO.'","'.$Time_Zone.'","'.$Network_Adapter.'","'.$MAC_Address.'","'.$IP_Address_Adapter_1.'","'.$IP_Address_Adapter_2.'","'.$IP_Address_Adapter_3.'","'.$IP_Address_Adapter_4.'","'.$Default_Gateway.'","'.$DNS_Primary.'","'.$DNS_Secondary.'","'.$SERVER_MAKE.'","'.$SERVER_MODEL.'","'.$SERVER_TYPE.'","'.$Console_Remote_Access.'","'.$Service_Tag_serial.'","'.$Warranty_end.'","'.$SO.'","'.$CPU.'","'.$Core.'","'.$Socket.'","'.$Memory.'","'.$Backup.'","'.$Participantes.'")';
	}
	if (mysqli_query($conn, $sql)) {
	} else {echo "Error: " . $sql . "<br>" . mysqli_error($conn);}
	mysqli_close($conn);
	end:
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
	<script type="text/javascript">
			alert("Alteração feita com Successo!");
		window.location.replace("index.php");
	</script>
	</head>
	<body>

	</body>
	</html>