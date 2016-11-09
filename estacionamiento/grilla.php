<!DOCTYPE html>
<html>
<head>
	<title>Grillas</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<link rel="stylesheet" href="css/login.css">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
        <div class="card card-container">

			<button id="verGrillaA" class="btn btn-lg btn-primary btn-block" type="button" >Autos estacionados</button>
			<button id="verGrillaB" class="btn btn-lg btn-primary btn-block" type="button" >Importes cobrados por autos</button>
			<button id="verGrillaC" class="btn btn-lg btn-primary btn-block" type="button" >Usuarios</button>


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


			
			<br />
					<table id="grilla"></table>
        </div><!-- /card-container -->
    </div><!-- /container -->

	<script src="js/funciones.js"></script>
</body>
</html>