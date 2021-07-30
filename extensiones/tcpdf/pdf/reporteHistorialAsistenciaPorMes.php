<?php
require_once "../../../controladores/asistencia.controlador.php";
require_once "../../../modelos/asistencia.modelo.php";
require_once "../../../controladores/usuarios.controlador.php";
require_once "../../../modelos/usuarios.modelo.php";

class reporteAsistenciaMes{

public $ReporteFechaInicio;
public $ReporteFechaFin;

public function traerReporteAsistenciaMes(){

$item = "ASI_FECHA";
$valor1 = $this->ReporteFechaInicio;
$valor2 = $this->ReporteFechaFin;

$respuesta = ControladorAsistencia::ctrTraerFechaReporte($item, $valor1, $valor2);

$fecha = date("d/m/Y");


//REQUERIMOS LA CLASE TCPDF

require_once('tcpdf_include.php');

$pdf = new TCPDF('L', 'mm', 'A4' , true, 'UTF-8', false);

$pdf->SetTitle('Reporte de Asistencia');

$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);

$pdf->SetMargins(10.10,10,false);//izq, alto, derecha, abajo

$pdf->SetAutoPageBreak(true,0);

$pdf->StartPageGroup();

$pdf->AddPage();


// ---------------------------------------------------------
$html = '';
$html.= '<table>
    			<tr style="align:center">
    				<td style="width:155px;border: 1px solid #666;"><img style="width:150px; line-height: 10px;" src="images/logoTalamo.png"></td>
    				<td style="width:471px;border: 1px solid #666;text-align:center;line-height: 50px;">
            <font size="24">REPORTE DE ASISTENCIA TALAMO</font></td>
    				<td style="width:136px;border: 1px solid #666;text-align:center;line-height: 100px;">Fecha: '.$fecha.'</td>
    			</tr>
    		</table>

      	<table class="table table-bordered table-striped">
               
            <thead align="center">
             
             <tr>
               
               <th style="width:30px;border: 1px solid #666;text-align:center">#</th>
               <th style="border: 1px solid #666;text-align:center;width:100px"><b>Fecha</b></th>
               <th style="border: 1px solid #666;text-align:center;width:180px"><b>Empleado</b></th>
               <th style="border: 1px solid #666;text-align:center;width:85px"><b>Hora Ingreso</b></th>
               <th style="border: 1px solid #666;text-align:center;width:367px"><b>Justificación</b></th>
               
             </tr> 

            </thead>    

        </table>';
	

// ---------------------------------------------------------

foreach ($respuesta as $row => $value) {

$item2 = "USU_ID";
$valor2 = $value["USU_ID"];

$usuario = ControladorUsuarios::ctrMostrarUsuarios($item2, $valor2);

$html.= '<table class="table table-bordered table-striped">
         
        <tbody align="center">
         
         <tr>
           
           <th style="width:30px;border: 1px solid #666;text-align:center">'.($row+1).'</th>
           <th style="border: 1px solid #666;text-align:center;width:100px">'.$value["ASI_FECHA"].'</th>
           <th style="border: 1px solid #666;text-align:center;width:180px">'.$usuario["USU_NOMBRES"].'</th>
           <th style="border: 1px solid #666;text-align:cente;width:85px">'.$value["ASI_HORA_INGRESO"].'</th>
           <th style="border: 1px solid #666;text-align:center;width:367px">'.$value["ASI_OBSERVACION"].'</th>

           
         </tr> 

        </tbody>    

    </table>';
  
  
}

// ---------------------------------------------------------

$pdf->writeHTML($html,true,0,true,0);

$pdf->lastPage();

//SALIDA DEL ARCHIVO 
//$pdf->IncludeJS("print();"); 

$pdf->Output('reporteHistorialAsistenciaPorMes.php');

}

}

$a = new reporteAsistenciaMes();
$a -> ReporteFechaInicio = $_GET["fechaInicio"];
$a -> ReporteFechaFin = $_GET["fechaFin"];
$a -> traerReporteAsistenciaMes();

?>
 
