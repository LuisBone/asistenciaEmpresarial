/*=============================================
APROBAR JUSTIFICACION
=============================================*/
$(".btnJustificar").click(function(){

	var idRegistro = $(this).attr("idRegistro");

	$("#horaIngreso"+idRegistro).css("color","black");

	$(this).removeClass('btn-info');
  	$(this).addClass('btn-default');
  	$(this).prop("disabled", true);

	var datos = new FormData();
 	datos.append("idRegistro", idRegistro);

  	$.ajax({

	  url:"ajax/asistencia.ajax.php",
	  method: "POST",
	  data: datos,
	  cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){
      		
      }

  	})

})
/*=============================================
tabla responsive
=============================================*/
$('#tablaHistorial').DataTable( {
        "scrollX": true
});

/*=============================================
EDITAR JUSTIFICACION
=============================================*/

$("#tablaHistorial").on("click", ".btnEditarJustificar", function(){

  var idRegistro = $(this).attr("idRegistro");
  
  var datos = new FormData();
  datos.append("idRegistro", idRegistro);

  $.ajax({

    url:"ajax/historial.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){
          $("#editarJustificar").val(respuesta["ASI_OBSERVACION"]);
          $("#editarJustificarOculto").val(respuesta["ASI_ID"]);
      }

    })

})

/*=============================================
CONTROLAR FECHA INICIO REPORTE
=============================================*/
$("#ReporteFechaInicio").change(function(){
  
  var fechaInicio = new Date($("#ReporteFechaInicio").val());
  var fechaFin = new Date($("#ReporteFechaFin").val());

  if (fechaInicio > fechaFin) {
    alert("La fecha inicio no puede ser mayor a fecha fin");
    $("#ReporteFechaInicio").val("");
    return;
  }

  
});

/*=============================================
CONTROLAR FECHA FIN REPORTE
=============================================*/
$("#ReporteFechaFin").change(function(){
  
  var fechaInicio = new Date($("#ReporteFechaInicio").val());
  var fechaFin = new Date($("#ReporteFechaFin").val());

  if (fechaInicio > fechaFin) {
    alert("La fecha inicio no puede ser mayor a fecha fin");
    $("#ReporteFechaFin").val("");
    return;
  }

});
