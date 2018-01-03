<?php
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
	$Service_Tag_serial = $_POST['Service_Tag_serial'];
	$SO = $_POST['SO'];
	$CPU = $_POST['CPU'];
	$Memory = $_POST['Memory'];
	$Backup = $_POST['Backup'];
	$Participantes = $_POST['Participantes'];


	include "mysql.php";

	$sql = 'update Hardware set `Host Name`="'.$Host_Name.'", `DNS name 1`="'.$DNS_name_1.'", `DNS name 2`="'.$DNS_name_2.'", `State`="'.$State.'", `Responsable`="'.$Responsable.'", `Critical`="'.$Critical.'", `Priority`="'.$Priority.'", `Type`="'.$Type.'", `Virt. Plataform`="'.$Virt_Plataform.'", `Fail Over Cluster or VMwware Datacenter`="'.$Fail_Over_Cluster_or_VMwware_Datacenter.'", `Business Function`="'.$Business_Function.'", `Application name`="'.$Application_name.'", `Environment`="'.$Environment.'", `Contact Team`="'.$Contact_Team.'", `Data center`="'.$Data_center.'", `Domain`="'.$Domain.'", `Operating System`="'.$Operating_System.'", `Time Zone`="'.$Time_Zone.'", `Network Adapter`="'.$Network_Adapter.'", `MAC Address`="'.$MAC_Address.'", `IP Address Adapter 1`="'.$IP_Address_Adapter_1.'", `IP Address Adapter 2`="'.$IP_Address_Adapter_2.'", `IP Address Adapter 3`="'.$IP_Address_Adapter_3.'", `IP Address Adapter 4`="'.$IP_Address_Adapter_4.'", `Default Gateway`="'.$Default_Gateway.'", `DNS Primary`="'.$DNS_Primary.'", `DNS Secondary`="'.$DNS_Secondary.'", `SERVER MAKE`="'.$SERVER_MAKE.'", `SERVER MODEL`="'.$SERVER_MODEL.'", `SERVER TYPE`="'.$SERVER_TYPE.'", `Console Remote Access`="'.$Console_Remote_Access.'", `Service Tag`="'.$Service_Tag_serial.'", `Warranty end`="'.$Warranty_end.'", `SO`="'.$SO.'", `CPU`="'.$CPU.'", `Memory`="'.$Memory.'", `Backup`="'.$Backup.'", `Participantes`="'.$Participantes.'" WHERE `Host name`="'.$Host_Name.'"';
	
	if (mysqli_query($conn, $sql)) {
		echo "New record created successfully";
		echo $Host_Name;
		echo $Contact_Team;
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
    mysqli_close($conn);
?>