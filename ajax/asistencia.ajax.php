<?php

require_once "../controladores/asistencia.controlador.php";
require_once "../modelos/asistencia.modelo.php";

class AjaxAsistencia{

	/*=============================================
	JUSTIFICAR FALTA
	=============================================*/	

	public $idRegistro;


	public function ajaxJustificar(){

		$tabla = "asistencia";

		$item1 = "ASI_ESTADO";
		$valor1 = 1;

		$item2 = "ASI_ID";
		$valor2 = $this->idRegistro;

		$respuesta = ModeloAsistencia::mdlActualizarAsistencia($tabla, $item1, $valor1, $item2, $valor2);

	}

	

}

/*=============================================
JUSTIFICAR FALTA
=============================================*/	

if(isset($_POST["idRegistro"])){

	$idRegistro = new AjaxAsistencia();
	$idRegistro -> idRegistro = $_POST["idRegistro"];
	$idRegistro -> ajaxJustificar();

}


