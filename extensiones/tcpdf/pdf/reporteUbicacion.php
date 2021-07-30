<?php
require_once "../../../controladores/productos.controlador.php";
require_once "../../../modelos/productos.modelo.php";

require_once "../../../controladores/ubicaciones.controlador.php";
require_once "../../../modelos/ubicaciones.modelo.php";

require_once "../../../controladores/usuarios.controlador.php";
require_once "../../../modelos/usuarios.modelo.php";

class reporteUbicacion{

public $codigo;

public function traerReporteUbicacion(){

$item = "UBI_ID";
$valor = $this->codigo;
$respuesta = ControladorProductos::ctrTraerProductosUbicacion($item, $valor);

$fecha = date("d/m/Y");


//REQUERIMOS LA CLASE TCPDF

require_once('tcpdf_include.php');

$pdf = new TCPDF('L', 'mm', 'A4' , true, 'UTF-8', false);

$pdf->SetTitle('Reporte por ubicacion');

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
				<td style="width:155px;border: 1px solid #666;"><img src="images/logo-sds-completo.png"></td>
				<td style="width:471px;border: 1px solid #666;text-align:center;"><font size="24">REPORTE DE ACTIVOS</font><br><font size="24">POR UBICACIÓN</font></td>
				<td style="width:136px;border: 1px solid #666;text-align:center;">Fecha: '.$fecha.'</td>
			</tr>
		</table>
	<table class="table table-bordered table-striped">
         
        <thead align="center">
         
         <tr>
           
           <th style="width:20px;border: 1px solid #666;text-align:center">#</th>
           <th style="border: 1px solid #666;text-align:center"><b>Código</b></th>
           <th style="border: 1px solid #666;text-align:center;width:200px"><b>Descripción</b></th>
           <th style="border: 1px solid #666;text-align:center"><b>Ubicación</b></th>
           <th style="border: 1px solid #666;text-align:center"><b>Responsable</b></th>
           <th style="border: 1px solid #666;text-align:center"><b>Estado</b></th>

           
         </tr> 

        </thead>    

    </table>';
	

// ---------------------------------------------------------

foreach ($respuesta as $row => $value) {

$item1 = "UBI_ID";
$valor1 = $value["UBI_ID"];

$ubicacion = ControladorCategorias::ctrMostrarCategorias($item1, $valor1);

$item2 = "USU_ID";
$valor2 = $value["USU_ID"];

$usuario = ControladorUsuarios::ctrMostrarUsuarios($item2, $valor2);

$html.= '<table class="table table-bordered table-striped">
         
        <tbody align="center">
         
         <tr>
           
           <th style="width:20px;border: 1px solid #666;text-align:center">'.($row+1).'</th>
           <th style="border: 1px solid #666;text-align:center">'.$value["PRO_PREFIJO"].$value["PRO_CODIGO"].'</th>
           <th style="border: 1px solid #666;text-align:center;width:200px">'.$value["PRO_DESCRIPCION"].'</th>
           <th style="border: 1px solid #666;text-align:center">'.$ubicacion["UBI_DESCRIPCION"].'</th>
           <th style="border: 1px solid #666;text-align:center">'.$usuario["USU_APELLIDO"].' '.$usuario["USU_NOMBRE"].'</th>
           <th style="border: 1px solid #666;text-align:center">'.$value["PRO_ESTADO"].'</th>

           
         </tr> 

        </tbody>    

    </table>';
	
	
}
// ---------------------------------------------------------

$pdf->writeHTML($html,true,0,true,0);

$pdf->lastPage();

//SALIDA DEL ARCHIVO 
//$pdf->IncludeJS("print();"); 

$pdf->Output('reporteUbicacion.php');

}

}

$a = new reporteUbicacion();
$a -> codigo = $_GET["ubicacion"];
$a -> traerReporteUbicacion();

?>
 