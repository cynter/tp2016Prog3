$('#testUsuario').click(function() {
	$('#inputEmail').val('usuario@gmail.com');
	$('#inputPassword').val('1234');
});

$('#testAdmin').click(function() {
	$('#inputEmail').val('admin@gmail.com');
	$('#inputPassword').val('1234');
});

$('#verGrillaA').click(function() {
	var funcionAjax= $.ajax({
		type:"POST",
		url:"nexo.php",
		data:{
			queHacer:"verGrillaA"
		}
	})

	funcionAjax.done(function (retorno){
		var data = '';
		$.each(JSON.parse(retorno), function(idx, vehiculo) {
			data += '<tr><td>' + vehiculo.id + '</td><td>' + vehiculo.patente + '</td><td>' + vehiculo.fecha + '</td></tr>';
		});

		$("#grilla").html("<tr><td>Id</td><td>Patente</td><td>Fecha</td></tr>" + data);
	})

	funcionAjax.fail(function(retorno){
		console.log(retorno);	
	});
});


$('#verGrillaB').click(function() {
	var funcionAjax= $.ajax({
		type:"POST",
		url:"nexo.php",
		data:{
			queHacer:"verGrillaB"
		}
	})

	funcionAjax.done(function (retorno){
		var data = '';
		$.each(JSON.parse(retorno), function(idx, vehiculo) {
			data += '<tr><td>' + vehiculo.id + '</td><td>' + vehiculo.patente + '</td><td>' + vehiculo.fecha + '</td><td>' + vehiculo.importe + '</td></tr>';
		});

		$("#grilla").html("<tr><td>Id</td><td>Patente</td><td>Fecha</td><td>Importe</td></tr>" + data);
	})

	funcionAjax.fail(function(retorno){
		console.log(retorno);	
	});
});

$('#verGrillaC').click(function() {
	var funcionAjax= $.ajax({
		type:"POST",
		url:"nexo.php",
		data:{
			queHacer:"verGrillaC"
		}
	})

	funcionAjax.done(function (retorno){
		var data = '';
		$.each(JSON.parse(retorno), function(idx, usuario) {
			data += '<tr><td>' + usuario.id + '</td><td>' + usuario.email + '</td><td>' + usuario.password+ '</td></tr>';
		});

		$("#grilla").html("<tr><td>Id</td><td>Email</td><td>Password</td></tr>" + data);
	})

	funcionAjax.fail(function(retorno){
		console.log(retorno);	
	});
});