<?php 

require_once("clases/AccesoDatos.php");

if (isset($_POST['submitLogin'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];

	$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
	$consulta = $objetoAccesoDato->RetornarConsulta("SELECT id,email,password,is_admin FROM usuario WHERE email='$email' AND password='$password'");
	$consulta->execute();
	
	$usuario = $consulta->fetchAll(PDO::FETCH_CLASS);

	if(count($usuario) > 0) {
		header("Location: index.php?is_admin=".$usuario['0']->is_admin);
		die;
	}

	header("Location: login.php?error=true");
}

if (isset($_POST['submitIngresarPatente'])) {
	$patente = $_POST['patente'];
	$fecha = new \DateTime();
	$fecha = $fecha->format('Y-m-d H:i:s');

	$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into vehiculo (patente, fecha)values('$patente', '$fecha')");
	$consulta->execute();		

	header("Location: index.php?is_admin=0");
}

if (isset($_POST['submitSacarPatente'])) {
	$patente = $_POST['patente'];

	$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	$consulta =$objetoAccesoDato->RetornarConsulta("SELECT id,patente,fecha FROM vehiculo WHERE patente='$patente'");
	$consulta->execute();

	$vehiculo = $consulta->fetchAll(PDO::FETCH_CLASS);

	if(count($vehiculo) > 0) {
		$dteStart = $vehiculo['0']->fecha;
   		$dteEnd = new DateTime();
   		$dteEnd = $dteEnd->format('Y-m-d H:i:s');

   		$dteDiff = strtotime($dteEnd) - strtotime($dteStart) ;

   		$importe = $dteDiff * 10;

   		$consulta =$objetoAccesoDato->RetornarConsulta("DELETE FROM vehiculo WHERE patente='$patente'");
		$consulta->execute();
   		$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into vehiculo_sacados (patente, fecha, importe)values('$patente', '$dteEnd', '$importe')");
		$consulta->execute();

		header("Location: index.php?is_admin=0&importe=".$importe);
		die;
	}

	header("Location: index.php?is_admin=0&error=mensaje");
}

if((isset($_POST['queHacer'])) && ($_POST['queHacer'] == 'verGrillaA')) {
	$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	$consulta =$objetoAccesoDato->RetornarConsulta("SELECT id, patente, fecha FROM vehiculo");
	$consulta->execute();

	$vehiculos = $consulta->fetchAll(PDO::FETCH_CLASS);

	echo json_encode($vehiculos);
}

if((isset($_POST['queHacer'])) && ($_POST['queHacer'] == 'verGrillaB')) {
	$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	$consulta =$objetoAccesoDato->RetornarConsulta("SELECT id, patente, fecha, importe FROM vehiculo_sacados");
	$consulta->execute();

	$vehiculos = $consulta->fetchAll(PDO::FETCH_CLASS);

	echo json_encode($vehiculos);
}

if((isset($_POST['queHacer'])) && ($_POST['queHacer'] == 'verGrillaC')) {
	$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	$consulta =$objetoAccesoDato->RetornarConsulta("SELECT id, email,password FROM usuario");
	$consulta->execute();

	$usuarios = $consulta->fetchAll(PDO::FETCH_CLASS);

	echo json_encode($usuarios);
}

?>