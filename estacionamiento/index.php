<!DOCTYPE html>
<html>
<head>
	<title>Inicio</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
	<?php if($_GET['is_admin']) { ?>
		<a href="grilla.php">Ver grillas</a>
	<?php } ?>
	<br>
	<a href="ingresarPatente.php">Ingresar patente</a>
	<br>
	<a href="sacarPatente.php">Sacar patente</a>

	<?php if(isset($_GET['importe'])) { ?>
		<p style="display: none" id="importe"><?php echo $_GET['importe']; ?></p>
		<script type="text/javascript">
			var importe = $('#importe').html();
			alert('El importe a pagar es :' + importe);
		</script>
	<?php } ?>

	<?php if(isset($_GET['error'])) { ?>
		<p style="display: none" id="mensaje"><?php echo $_GET['error']; ?></p>
		<script type="text/javascript">
			var mensaje = $('#mensaje').html();
			alert('No existe el auto!!');
		</script>
	<?php } ?>


</body>
</html>