/*=============================================
=           activar pdf reporte x ubicacion            =
=============================================*/

function botonReporteAsistenciaMes(){

    var fechaInicio = document.getElementById('ReporteFechaInicio').value;
    var fechaFin = document.getElementById('ReporteFechaFin').value;

    if( fechaInicio == "" || fechaFin == "" ){

      alert("Las fechas no pueden estar vacias.");
      return;
    }

    window.open("extensiones/tcpdf/pdf/reporteHistorialAsistenciaPorMes.php?fechaInicio="+fechaInicio+"&fechaFin="+fechaFin,+"_blank");

}