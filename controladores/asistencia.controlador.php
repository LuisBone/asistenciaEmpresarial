<?php

class ControladorAsistencia{

	/*=============================================
	REGISTRO ASISTENCIA
	=============================================*/

	static public function ctrRegistroAsistencia($HoraIngreso){

				$tabla = "asistencia";

				$item1 = "ASI_HORA_INGRESO";
				$valor1 = $HoraIngreso;

				$item2 = "USU_ID";
				$valor2 = $_SESSION["id"];

				$item3 = "ASI_FECHA";
				$valor3 = $_SESSION["fecha"];

				$hora1 = strtotime($HoraIngreso);
				$hora2 = strtotime( "09:10:00" );
				if( $hora1 > $hora2){

					$item4 = "ASI_ESTADO";
					$valor4 = 0;
				}else{

					$item4 = "ASI_ESTADO";
					$valor4 = 1;

				}

				ModeloAsistencia::mdlRegistrarAsistencia($tabla, $item1, $valor1, $item2, $valor2, $item3, $valor3, $item4, $valor4);

	}

	/*=============================================
	REGISTRO ASISTENCIA
	=============================================*/

	static public function ctrRegistroAsistenciaSalida($Salida){

			$tabla = "asistencia";

			$item1 = "ASI_HORA_SALIDA";
			$valor1 = $Salida;

			$item2 = "USU_ID";
			$valor2 = $_SESSION["id"];

			$item3 = "ASI_FECHA";
			$valor3 = $_SESSION["fecha"];

			ModeloAsistencia::mdlRegistrarAsistenciaSalida($tabla, $item1, $valor1, $item2, $valor2, $item3, $valor3);
				
	}

	/*=============================================
	TRAER JUSTIFICACION
	=============================================*/

	static public function ctrTraerObservacion($item, $valor){

		$tabla = "asistencia";

		$respuesta = ModeloAsistencia::mdlTraerJustificacion($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	TRAER FECHA
	=============================================*/

	static public function ctrTraerFecha($item, $valor, $item2, $valor2){

		$tabla = "asistencia";

		$respuesta = ModeloAsistencia::mdlTraerFecha($tabla, $item, $valor, $item2, $valor2);

		return $respuesta;
	}

	/*=============================================
	MOSTRAR ATRASOS
	=============================================*/

	static public function ctrMostrarAtrasos($item, $valor){

		$tabla = "asistencia";

		$item2 = "ASI_ESTADO";

		$valor2 = 0;

		$respuesta = ModeloAsistencia::mdlMostrarAtrasos($tabla, $item, $valor, $item2, $valor2);

		return $respuesta;
	}

	/*=============================================
	REGISTRO JUSTIFICACION
	=============================================*/

	static public function ctrRegistroJustificacion(){

		if(isset($_POST["fechaJustificar"]) != ""){

			$item = "ASI_FECHA";
           	$valor = $_POST["fechaJustificar"];
          	$item2 = "USU_ID";
           	$valor2 = $_SESSION["id"];

            $fechaJustificar = ControladorAsistencia::ctrTraerFecha($item, $valor, $item2, $valor2);
	
			if ($fechaJustificar) {

				$tabla = "asistencia";

				$item1 = "ASI_OBSERVACION";
				$valor1 = $_POST["justificar"];

				$item2 = "USU_ID";
				$valor2 = $_SESSION["id"];

				$item3 = "ASI_FECHA";
				$valor3 = $_POST["fechaJustificar"];

					$respuesta = ModeloAsistencia::mdlRegistrarAsistenciaSalida($tabla, $item1, $valor1, $item2, $valor2, $item3, $valor3);
				
			}else{

				$tabla = "asistencia";

				$datos = array("usuario" => $_SESSION["id"],
							   "fecha" => $_POST["fechaJustificar"],
					           "justificacion" => $_POST["justificar"]
					           );

				$respuesta = ModeloAsistencia::mdlRegistrarJustificacion($tabla, $datos);

			}
			if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡La justificación ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

					}).then((result)=>{

						if(result.value){
						
							window.location = "asistencia";

						}

					});
				

					</script>';


			}

		}


	}


	/*=============================================
	ACTUALIZAR JUSTIFICACION
	=============================================*/

	static public function ctrActualizarJustificacion(){

		if(isset($_POST["editarJustificar"])){
	
			$tabla = "asistencia";

			$item1 = "ASI_OBSERVACION";
			$valor1 = $_POST["editarJustificar"];

			$item2 = "ASI_ID";
			$valor2 = $_POST["editarJustificarOculto"];

				$respuesta = ModeloAsistencia::mdlActualizarAsistencia($tabla, $item1, $valor1, $item2, $valor2);

				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡La justificación ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

					}).then((result)=>{

						if(result.value){
						
							window.location = "historial";

						}

					});
				

					</script>';


			}
		}


	}

	/*=============================================
	REGISTRO FECHA DIARIA
	=============================================*/

	static public function ctrRegistrofechaDiaria($valor4){

	
			$tabla = "asistencia";

			$datos = array("usuario" => $valor4,
						   "fecha" => $_SESSION["fecha"]
				           );

			$respuesta = ModeloAsistencia::mdlRegistrofechaDiaria($tabla, $datos);

	}

	/*=============================================
	TRAER FECHA
	=============================================*/

	static public function ctrTraerFechaReporte($item, $valor1, $valor2){


		$tabla = "asistencia";

		$respuesta = ModeloAsistencia::mdlTraerFechaReporte($tabla, $item, $valor1, $valor2);

		return $respuesta;

	}


}


