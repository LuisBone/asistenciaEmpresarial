<?php

class imprimirCodigo{

public $codigo;

public function traerImpresionCodigo(){


$prefijoCodigo = $this->codigo;

//traer año

$year = date("Y");

//definir tamaño pdf

$width = 61; 
$height = 36; 
$pagewh = array($width, $height); // or array($height, $width) 

//REQUERIMOS LA CLASE TCPDF

require_once('tcpdf_include.php');

$pdf = new TCPDF('L', 'mm', $pagewh , true, 'UTF-8', false);



$pdf->SetTitle('Gererador codigo');

$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);

$pdf->SetMargins(-0.5,0,0,0);//izq, alto, derecha, abajo

$pdf->SetAutoPageBreak(true,0);

$pdf->StartPageGroup();

$pdf->AddPage();

$html = '';
$barcode = $prefijoCodigo;
$barcode = $pdf -> serializeTCPDFtagParameters(array($barcode,'c128','','',72,25,0.5,array('position'=>'5','border'=>false,'padding'=>2,'fgcolor'=>array(0,0,0),'bgcolor'=>array(239,240,241),'text'=>true,'font'=>'helvetica','fontsize'=>10,'stretchtext'=>6),'N'));

$html.= '<table style="background-color:#EFF0F1">
			<tr>
				<td style="background-color:#EFF0F1; width:145px; text-align:center; color:black"><br><br>INVENTARIO '.$year.'</td>
				<td style="width:30px;"><img src="images/logo-sds.png"></td>
			</tr>
			<tr>
				<td><tcpdf method="write1DBarcode" params="'.$barcode.'"></tcpdf></td>
			</tr>
		</table>';

$pdf->SetFont('helvetica','',10);

$pdf->writeHTML($html,true,0,true,0);

// Delete page 6
$pdf->deletePage(2);
//$pdf->lastPage();

//SALIDA DEL ARCHIVO 
//$pdf->IncludeJS("print();"); 

$pdf->Output('codigo.pdf');

}

}

$a = new imprimirCodigo();
$a -> codigo = $_GET["codigo"];
$a -> traerImpresionCodigo();

?>
 