<?php
require_once '../controladores/asistencia.controlador.php';
require_once '../modelos/asistencia.modelo.php';
require_once '../controladores/usuarios.controlador.php';
require_once '../modelos/usuarios.modelo.php';
session_start();

class AjaxHistorial{

	/*=============================================
	EDITAR JUSTIFICAR
	=============================================*/

	public $idRegister;
	public function ajaxJustificarEditar(){

		$item = "ASI_ID";
		$valor = $this->idRegister;

		$respuesta = ControladorAsistencia::ctrTraerObservacion($item, $valor);

		echo json_encode($respuesta);
	}


	/*=============================================
	REGISTRAR HORA INGRESO
	=============================================*/

	public $horaIngreso;
	public function ajaxHoraIngreso(){

		$valor1 = $this->horaIngreso;

		$ingreso = 0;

		$pr1 = ControladorAsistencia::ctrRegistroAsistencia($valor1);

		$pr = ControladorUsuarios::ctrRegistroHoras($valor1, $ingreso);

		return $pr.$pr1;

	}

	/*=============================================
	REGISTRAR HORA SALIDA
	=============================================*/

	public $horaSalida;
	public function ajaxHoraSalida(){

		$valor1 = $this->horaSalida;

		$salida = 1;

		$pr1 = ControladorAsistencia::ctrRegistroAsistenciaSalida($valor1);

		$pr = ControladorUsuarios::ctrRegistroHoras($valor1, $salida);

		return $pr.$pr1;

	}

}

/*=============================================
EDITAR JUSTIFICAR
=============================================*/

if(isset($_POST["idRegistro"])){

	$idRegister = new AjaxHistorial();
	$idRegister -> idRegister = $_POST["idRegistro"];
	$idRegister -> ajaxJustificarEditar();

}


/*=============================================
REGISTRAR HORA INGRESO
=============================================*/

if(isset($_POST["hora"])){

	$horaI = new AjaxHistorial();
	$horaI -> horaIngreso = $_POST["hora"];
	$horaI -> ajaxHoraIngreso();

}

/*=============================================
REGISTRAR HORA SALIDA
=============================================*/

if(isset($_POST["salida"])){

	$horaS = new AjaxHistorial();
	$horaS -> horaSalida = $_POST["salida"];
	$horaS -> ajaxHoraSalida();

}
