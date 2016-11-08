<?php

	require_once("../lib/nusoap.php");
	require_once("AccesoDatos.php");
	require_once("producto.php");
	require_once("usuario.php");
	require_once("archivo.php");

	$servicio = new nusoap_server();

	$servicio->configureWSDL("Mi Web Service", "urn:WSGiusti");
	ini_set('display_errors', 'Off');


	$servicio->register("BorrarProducto",
		array("codigoProducto" => "xsd:int"),
		array(),
		"urn:WSGiusti",
		"urn:WSGiusti#BorrarProducto",
		"rpc",
		"encoded",
		"Borra un Producto"
		);

	$servicio->register("ModificarProducto",
		array("producto" => "xsd:Array"),
		array(),
		"urn:WSGiusti",
		"urn:WSGiusti#ModificarProducto",
		"rpc",
		"encoded",
		"Modifica un producto"
		);

	$servicio->register("InsertarProducto",
		array("producto" => "xsd:string"),
		array(),
		"urn:WSGiusti",
		"urn:WSGiusti#InsertarProducto",
		"rpc",
		"encoded",
		"Inserta un producto"
		);

	$servicio->register("GuardarProducto",
		array("producto" => "xsd:Array"),
		array(),
		"urn:WSGiusti",
		"urn:WSGiusti#GuardarProducto",
		"rpc",
		"encoded",
		"Inserta o Modifica un producto segun corresponda"
		);

	$servicio->register("TraerTodoLosProductos",
		array(),
		array("return" => "xsd:Array"),
		"urn:WSGiusti",
		"urn:WSGiusti#TraerTodoLosProductos",
		"rpc",
		"encoded",
		"Trae todos los productos"
		);

	$servicio->register("TraerUnProducto",
		array("codigoProducto" => "xsd:int"),
		array("return" => "xsd:Array"),
		"urn:WSGiusti",
		"urn:WSGiusti#TraerUnProducto",
		"rpc",
		"encoded",
		"Trae solo el producto especificado"
		);

	$servicio->register('ValidarUsuario',
		array('usuario' => 'xsd:Array'),
		array('return' => 'xsd:Array'),
		'urn:WSGiusti',
		'urn:WSGiusti#ValidarUsuario',
		'rpc',
		'encoded',
		'Valida que usuario ingreso al sistema'
		);

	$servicio->register('TraerTodoLosUsuarios',
		array(),
		array("return" => "xsd:Array"),
		"urn:WSGiusti",
		"urn:WSGiusti#TraerTodoLosUsuarios",
		"rpc",
		"encoded",
		"Trae todos los usuarios registrados"
		);

	$servicio->register("GuardarPerfil",
		array("datosPerfil" => "xsd:Array"),
		array("return" => "xsd:Array"),
		"urn:WSGiusti",
		"urn:WSGiusti#GuardarPerfil",
		"rpc",
		"encoded",
		"Actualiza perfil de usuario"
		);

	function BorrarProducto($codigoProducto){
		Producto::BorrarProducto($codigoProducto);
	}

	function ModificarProducto($producto){
		Producto::ModificarProducto($producto[0], $producto[1]);
	}

	function InsertarProducto($nombre){
		Producto::InsertarProducto($nombre);
	}

	function GuardarProducto($producto){
		Producto::GuardarProducto($producto[0], $producto[1]);
	}

	function TraerTodoLosProductos(){
		return Producto::TraerTodoLosProductos();
	}

	function TraerUnProducto($codigoProducto){
		return Producto::TraerUnProducto($codigoProducto);
	}

	function ValidarUsuario($usuario){
		return Usuario::ValidarUsuario($usuario[0], $usuario[1], $usuario[2]);
	}

	function TraerTodoLosUsuarios(){
		return Usuario::TraerTodoLosUsuarios();
	}

	function GuardarPerfil($datosPerfil){
		return Usuario::GuardarPerfil($datosPerfil[0], $datosPerfil[1], $datosPerfil[2]);
	}

	$HTTP_RAW_POST_DATA = file_get_contents("php://input");
	
	$servicio->service($HTTP_RAW_POST_DATA);
?>