/*=============================================
REGISTRAR ASISTENCIA
=============================================*/
function registrarHora(){

	var hoy = new Date();

	var h = hoy.getHours();
	var m = hoy.getMinutes();
	var s = hoy.getSeconds();

	if(h < 10){
    	h = "0"+h;
	}
	if(m < 10){
    	m = "0"+m;
	}
	if(s < 10){
    	s = "0"+s;
	}

	var hora = h + ':' + m + ':' + s;

	$("#ingreso").val(hora);
	$("#justificarOculto").val(1);

	$(".boton").removeClass("btn-success");
	$(".boton").addClass("btn-default");
	$("#boton").prop("disabled", true);

	$(".botonSalir").removeClass("btn-default");
	$(".botonSalir").addClass("btn-info");
	$("#botonSalir").prop("disabled", false);

	var datos = new FormData();
 	datos.append("hora", hora);


    $.ajax({
	    url:"ajax/historial.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    success:function(respuesta){
				console.log(respuesta);
	    }

	})

}

/*=============================================
REGISTRAR ASISTENCIA SALIDA
=============================================*/
function registrarHoraSalida(){

	var hoy = new Date();

	var h = hoy.getHours();
	var m = hoy.getMinutes();
	var s = hoy.getSeconds();

	if(h < 10){
    	h = "0"+h;
	}
	if(m < 10){
    	m = "0"+m;
	}
	if(s < 10){
    	s = "0"+s;
	}

	var salida = h + ':' + m + ':' + s;

	$("#Horasalida").html(salida);
	$("#Horasalida").val(salida);

	$(".botonSalir").removeClass("btn-info");
	$(".botonSalir").addClass("btn-default");
	$("#botonSalir").prop("disabled", true);

	var datos = new FormData();
 	datos.append("salida", salida);


    $.ajax({
	    url:"ajax/historial.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    success:function(respuesta){
				console.log(respuesta);
	    }

	})


}
