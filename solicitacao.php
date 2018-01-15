<!DOCTYPE html>
<html>
<head>
  <title>Twitter Bootstrap : Single Button Toogle using Javascript Method </title>
<script src="http://code.jquery.com/jquery.min.js"></script>

</head>

<script>
$(document).ready(function(){
    $("#Demo-boot .btn").click(function(){
    	alert('teste');
    });
});
</script>
<body>
  <div id="Demo-boot" style="padding:30px;">
 <button class="btn btn-primary">Single toggle</button>
  </div>
</body>
</html>