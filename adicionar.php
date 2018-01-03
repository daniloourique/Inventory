<?php
	include "mysql.php";
	$Host_Name = $_POST['Host_Name'];
	$DNS_name_1 = $_POST['DNS_name_1'];
	$DNS_name_2 = $_POST['DNS_name_2'];
	$State = $_POST['State'];
	$Responsable = $_POST['Responsable'];
	$Critical = $_POST['Critical'];
	$Priority = $_POST['Priority'];
	$Type = $_POST['Type'];
	$Virt_Plataform = $_POST['Virt_Plataform'];
	$Fail_Over_Cluster_or_VMwware_Datacenter = $_POST['Fail_Over_Cluster_or_VMwware_Datacenter'];
	$Business_Function = $_POST['Business_Function'];
	$Application_name = $_POST['Application_name'];
	$Environment = $_POST['Environment'];
	$Contact_Team = $_POST['Contact_Team'];
	$Data_center = $_POST['Data_center'];
	$Domain = $_POST['Domain'];
	$Operating_System = $_POST['Operating_System'];
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
	$Service_Tag_serial = $_POST['Service_Tag'];
	$SO = $_POST['SO'];
	$CPU = $_POST['CPU'];
	$Memory = $_POST['Memory'];
	$Backup = $_POST['Backup'];
	$Participantes = $_POST['Participantes'];
	$Warranty_end = $_POST['Warranty_end'];
	$Status = $_POST['Status'];
	$id = $_POST['id'];

	if($Status == "Concluído"){
		$sql = 'Insert into Hardware (`Host Name`, `DNS name 1`, `DNS name 2`, `State`, `Responsable`, `Critical`, `Priority`, `Type`, `Virtualization`, `Cluster`, `Business Function`, `Application name`, `Environment`, `Contact Team`, `Data center`, `Domain`, `Operating System`, `Time Zone`, `Network Adapter`, `MAC Address`, `IP Address Adapter 1`, `IP Address Adapter 2`, `IP Address Adapter 3`, `IP Address Adapter 4`, `Default Gateway`, `DNS Primary`, `DNS Secondary`, `SERVER MAKE`, `SERVER MODEL`, `SERVER TYPE`, `Console Remote Access`, `Service Tag`, `Warranty end`, `SO`, `CPU`, `Memory`, `Backup`, `Participantes`) values ("'.$Host_Name.'","'.$DNS_name_1.'","'.$DNS_name_2.'","'.$State.'","'.$Responsable.'","'.$Critical.'","'.$Priority.'","'.$Type.'","'.$Virt_Plataform.'","'.$Fail_Over_Cluster_or_VMwware_Datacenter.'","'.$Business_Function.'","'.$Application_name.'","'.$Environment.'","'.$Contact_Team.'","'.$Data_center.'","'.$Domain.'","'.$Operating_System.'","'.$Time_Zone.'","'.$Network_Adapter.'","'.$MAC_Address.'","'.$IP_Address_Adapter_1.'","'.$IP_Address_Adapter_2.'","'.$IP_Address_Adapter_3.'","'.$IP_Address_Adapter_4.'","'.$Default_Gateway.'","'.$DNS_Primary.'","'.$DNS_Secondary.'","'.$SERVER_MAKE.'","'.$SERVER_MODEL.'","'.$SERVER_TYPE.'","'.$Console_Remote_Access.'","'.$Service_Tag_serial.'","'.$Warranty_end.'","'.$SO.'","'.$CPU.'","'.$Memory.'","'.$Backup.'","'.$Participantes.'")';
		if (mysqli_query($conn, $sql)) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		
		
		$sql = 'update Fila_solicitacao set `Host Name`="'.$Host_Name.'", `DNS name 1`="'.$DNS_name_1.'", `DNS name 2`="'.$DNS_name_2.'", `State`="'.$State.'", `Responsable`="'.$Responsable.'", `Critical`="'.$Critical.'", `Priority`="'.$Priority.'", `Type`="'.$Type.'", `Virtualization`="'.$Virt_Plataform.'", `Cluster`="'.$Fail_Over_Cluster_or_VMwware_Datacenter.'", `Business Function`="'.$Business_Function.'", `Application name`="'.$Application_name.'", `Environment`="'.$Environment.'", `Contact Team`="'.$Contact_Team.'", `Data center`="'.$Data_center.'", `Domain`="'.$Domain.'", `Version SO`="'.$Operating_System.'", `Time Zone`="'.$Time_Zone.'", `SERVER MAKE`="'.$SERVER_MAKE.'", `SERVER MODEL`="'.$SERVER_MODEL.'", `SERVER TYPE`="'.$SERVER_TYPE.'", `Console Remote Access`="'.$Console_Remote_Access.'", `Service Tag`="'.$Service_Tag_serial.'", `Warranty end`="'.$Warranty_end.'", `SO`="'.$SO.'", `CPU`="'.$CPU.'", `Memory`="'.$Memory.'", `Backup`="'.$Backup.'", `Participants`="'.$Participantes.'", `Status`="'.$Status.'" WHERE `ID`="'.$id.'"';
		if (mysqli_query($conn, $sql)) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);


	}
	if($Status == "Pendente"){
		$sql = 'update Fila_solicitacao set `Host Name`="'.$Host_Name.'", `DNS name 1`="'.$DNS_name_1.'", `DNS name 2`="'.$DNS_name_2.'", `State`="'.$State.'", `Responsable`="'.$Responsable.'", `Critical`="'.$Critical.'", `Priority`="'.$Priority.'", `Type`="'.$Type.'", `Virtualization`="'.$Virt_Plataform.'", `Cluster`="'.$Fail_Over_Cluster_or_VMwware_Datacenter.'", `Business Function`="'.$Business_Function.'", `Application name`="'.$Application_name.'", `Environment`="'.$Environment.'", `Contact Team`="'.$Contact_Team.'", `Data center`="'.$Data_center.'", `Domain`="'.$Domain.'", `Version SO`="'.$Operating_System.'", `Time Zone`="'.$Time_Zone.'", `SERVER MAKE`="'.$SERVER_MAKE.'", `SERVER MODEL`="'.$SERVER_MODEL.'", `SERVER TYPE`="'.$SERVER_TYPE.'", `Console Remote Access`="'.$Console_Remote_Access.'", `Service Tag`="'.$Service_Tag_serial.'", `Warranty end`="'.$Warranty_end.'", `SO`="'.$SO.'", `CPU`="'.$CPU.'", `Memory`="'.$Memory.'", `Backup`="'.$Backup.'", `Participants`="'.$Participantes.'", `Status`="'.$Status.'" WHERE `ID`="'.$id.'"';
		if (mysqli_query($conn, $sql)) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}

	if($Status == "Novo"||$Status == "Revisar"){
		?>
		<script>
		alert("Favor Alterar o Status");
		</script>
		<?php
	}
?>
