<html>
<head>
 <title>Passar Variável Javascript para PHP</title>
 <script type="text/javascript">
  var variaveljs = 'Mauricio Programador'; 
 </script>
</head>
<body>
 <?php 
	$variavelphp = "<script>document.write(variaveljs)</script>";
	echo $variavelphp;
 ?>
</body>
</html>
