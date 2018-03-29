<?php
include "mysql.php";
$sql = 'SELECT * FROM `Hardware` WHERE (`Version SO` LIKE "Windows%") and (`State` NOT LIKE "DECOMMISSIONED")';
$windows = mysqli_query($conn, $sql);
$sql = 'SELECT * FROM `Hardware` WHERE (`Version SO` LIKE "%linux%") or (`Version SO` LIKE "%centos%") or (`Version SO` LIKE "%debian%") and (`State` NOT LIKE "DECOMMISSIONED")';
$linux = mysqli_query($conn, $sql);
$sql = 'SELECT * FROM `Hardware` WHERE (`Version SO` NOT LIKE "%linux%") and (`Version SO` NOT LIKE "%centos%") and (`Version SO` NOT LIKE "%debian%") and (`Version SO` NOT LIKE "%Windows%") and (`State` NOT LIKE "DECOMMISSIONED")';
$outros = mysqli_query($conn, $sql);
$sql = 'SELECT * FROM `Hardware` WHERE (`Type` LIKE "%Physical%") and (`State` NOT LIKE "DECOMMISSIONED")';
$physical = mysqli_query($conn, $sql);
$sql = 'SELECT * FROM `Hardware` WHERE (`Type` LIKE "%Virtual%") and (`State` NOT LIKE "DECOMMISSIONED")';
$virtual = mysqli_query($conn, $sql);
$sql = 'SELECT * FROM `Hardware` WHERE (`Type` LIKE "%Appliance%") and (`State` NOT LIKE "DECOMMISSIONED")';
$appliance = mysqli_query($conn, $sql);
$rowwindows = mysqli_num_rows($windows);
$rowlinux = mysqli_num_rows($linux);
$rowoutros = mysqli_num_rows($outros);
$rowphysical = mysqli_num_rows($physical);
$rowvirtual = mysqli_num_rows($virtual);
$rowappliance = mysqli_num_rows($appliance);

$cidades = array("Canoas","Mogi das Cruzes","General Rodriguez","Ibirubá","Santa Rosa","Campinas","São Paulo","Ernestina","Jundiaí","Ribeirão Preto","Haedo","EUA-Miami","Stoneleigh","Unknown");
$environments = array("PD","PD/DR","DR","PY","DV","PP","Unknown");
?>





<!DOCTYPE html>
<html>
<head>
	<title>AGCO Inventory</title>

</head>
<body>
	<?php include_once 'partials/header.php' ?>
    <div class="row placeholders mb-3" style="margin-left: 0px;margin-right: 0px;">
        <div class="col-6 col-sm-2 placeholder text-center">
            <img src='//placehold.it/200/dddddd/fff?text=<?php echo $rowwindows;?>' class="mx-auto img-fluid rounded-circle" alt="Generic placeholder thumbnail">
            <h4>Windows</h4>

        </div>
        <div class="col-6 col-sm-2 placeholder text-center">
            <img src="//placehold.it/200/e4e4e4/fff?text=<?php echo $rowlinux;?>" class="mx-auto img-fluid rounded-circle" alt="Generic placeholder thumbnail">
            <h4>Linux</h4>
        </div>
        <div class="col-6 col-sm-2 placeholder text-center">
            <img src="//placehold.it/200/d6d6d6/fff?text=<?php echo $rowoutros;?>" class="mx-auto img-fluid rounded-circle" alt="Generic placeholder thumbnail">
            <h4>Outros</h4>
        </div>
        <div class="col-6 col-sm-2 placeholder text-center">
            <img src="//placehold.it/200/e0e0e0/fff?text=<?php echo $rowphysical;?>" class="center-block img-fluid rounded-circle" alt="Generic placeholder thumbnail">
            <h4>Physical</h4>
        </div>
        <div class="col-6 col-sm-2 placeholder text-center">
            <img src="//placehold.it/200/e0e0e0/fff?text=<?php echo $rowvirtual;?>" class="center-block img-fluid rounded-circle" alt="Generic placeholder thumbnail">
            <h4>Virtual</h4>
        </div>
        <div class="col-6 col-sm-2 placeholder text-center">
            <img src="//placehold.it/200/e0e0e0/fff?text=<?php echo $rowappliance;?>" class="center-block img-fluid rounded-circle" alt="Generic placeholder thumbnail">
            <h4>Appliance</h4>
        </div>
    </div>
<div class="table-responsive">
<table class="table table-sm .table-striped">
  <thead>
    <tr>
    	<th scope="col"></th>
    	<th scope="col"></th>
    	<th scope="col"></th>
    	<th scope="col"></th>
    	<th scope="col"></th>
    	<?php
    	foreach ($cidades as $cidade) {?>
    		<th scope="col" colspan="2" class="text-center"><?php echo $cidade?></th>

    	<?php };?>
    	<th scope="col" class="text-center"></th>
    </tr>
    <tr>
    	<th scope="col"></th>
    	<th scope="col" colspan="2" class="text-center">Totais</th>
    	<th scope="col" colspan="2" class="text-center"></th>

    	<?php
    	foreach ($cidades as $cidade) {
		    $sql = 'SELECT * FROM `Hardware` WHERE (`Type` LIKE "%Physical%" or `Type` LIKE "%Virtual%")and `Data Center` LIKE "%'.$cidade.'%" and `State` NOT LIKE "DECOMMISSIONED"';
			$querycidade = mysqli_query($conn, $sql);
			$rowquerycidade = mysqli_num_rows($querycidade);
		?>
    		<th scope="col" colspan="2" class="text-center"><?php echo $rowquerycidade?></th>
    	<?php };?>
		<th scope="col" class="text-center"></th>
    </tr>
    <tr>
      <th scope="col"></th>
      <th scope="col">Physical</th>
      <th scope="col">Virtual</th>
      <th scope="col"></th>
      <th scope="col"></th>
    	<?php
    	foreach ($cidades as $cidade) {?>
     		<th scope="col">Physical</th>
      		<th scope="col">Virtual</th>
    	<?php };?>
    </tr>
  </thead>
  <tbody class=".table-striped">
<?php
foreach ($environments as $environment) {
	$sql = 'SELECT * FROM `Hardware` WHERE (`Environment` LIKE "'.$environment.'") and (`Type` LIKE "%Physical%") and (`State` NOT LIKE "DECOMMISSIONED")';
	$querytotalp = mysqli_query($conn, $sql);
	$rowquerytotalp = mysqli_num_rows($querytotalp);
	$sql = 'SELECT * FROM `Hardware` WHERE (`Environment` LIKE "'.$environment.'") and (`Type` LIKE "%Virtual%") and (`State` NOT LIKE "DECOMMISSIONED")';
	$querytotalv = mysqli_query($conn, $sql);
	$rowquerytotalv = mysqli_num_rows($querytotalv);
	?>
	<tr>
  		<th scope="row"><?php echo $environment;?></th>
  		<td class="text-center"><?php echo $rowquerytotalp;?></td>
  		<td class="text-center"><?php echo $rowquerytotalv;?></td>
  		<td colspan="2"></td>
  		<?php
		foreach ($cidades as $cidade) {
			$sql = 'SELECT * FROM `Hardware` WHERE (`Environment` LIKE "'.$environment.'") and (`Data Center` LIKE "%'.$cidade.'%") and (`Type` LIKE "%Physical%") and (`State` NOT LIKE "DECOMMISSIONED")';
			$queryp = mysqli_query($conn, $sql);
			$rowqueryp = mysqli_num_rows($queryp);
			$sql = 'SELECT * FROM `Hardware` WHERE (`Environment` LIKE "'.$environment.'") and (`Data Center` LIKE "%'.$cidade.'%") and (`Type` LIKE "%Virtual%") and (`State` NOT LIKE "DECOMMISSIONED")';
			$queryv = mysqli_query($conn, $sql);
			$rowqueryv = mysqli_num_rows($queryv);
			?>
	      		<td class="text-center"><?php echo $rowqueryp;?></td>
	      		<td class="text-center"><?php echo $rowqueryv;?></td>
	<?php
	}
	?>
	</tr>
	<?php 
}
?>
  </tbody>
</table>
</div>

<?php include_once 'partials/footer.php' ?>
</body>
</html>