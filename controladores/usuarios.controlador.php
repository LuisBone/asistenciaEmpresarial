<?php

class ControladorUsuarios{

	/*=============================================
	INGRESO DE USUARIO
	=============================================*/

	static public function ctrIngresoUsuario(){

		if(isset($_POST["ingUsuario"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){

			   $encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$tabla = "usuarios";

				$item = "USU_USUARIO";
				$valor = $_POST["ingUsuario"];

				$respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

				if($respuesta["USU_USUARIO"] == $_POST["ingUsuario"] && $respuesta["USU_PASSWORD"] == $encriptar ){

					if($respuesta["USU_ESTADO"] == 1){

						$_SESSION["iniciarSesion"] = "ok";
						$_SESSION["id"] = $respuesta["USU_ID"];
						$_SESSION["nombre"] = $respuesta["USU_NOMBRES"];
						$_SESSION["usuario"] = $respuesta["USU_USUARIO"];
						$_SESSION["perfil"] = $respuesta["USU_PERFIL"];

						/*=============================================
						REGISTRAR FECHA PARA SABER EL ÚLTIMO LOGIN
						=============================================*/

						date_default_timezone_set('America/Bogota');

						$fecha = date('Y-m-d');
						$hora = date('H:i:s');

						$_SESSION["fecha"] = date('Y-m-d');

						$fechaActual = $fecha.' '.$hora;

						$item1 = "USU_ULTIMO_LOGIN";
						$valor1 = $fechaActual;

						$item2 = "USU_ID";
						$valor2 = $respuesta["USU_ID"];

						$ultimoLogin = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

						if($ultimoLogin == "ok"){


								echo '<script>

									window.location = "asistencia";

								</script>';

						}				
						
					}else{

						echo '<br>
							<div class="alert alert-danger">El usuario aún no está activado</div>';

					}		

				}else{

					echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';

				}

			}	

		}

	}

	/*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	static public function ctrCrearUsuario(){

		if(isset($_POST["nuevoUsuario"])){

			if(preg_match('/^[u0-9]+$/', $_POST["nuevoUsuario"]) &&
			   preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPerfil"]) &&
			   preg_match('/^[a-zA-Z0-9@]+$/', $_POST["nuevoPassword"])){


				$tabla = "usuarios";

				$encriptar = crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$concatenar = "u".$_POST["nuevoUsuario"];

				$datos = array("usuario" => $concatenar,
					           "password" => $encriptar,
							   "nombre" => strtoupper($_POST["nuevoNombre"]),
							   "empresa" => strtoupper($_POST["nuevoEmpresa"]),
					           "perfil" => $_POST["nuevoPerfil"]
					           );

				$respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);
			
				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡El usuario ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

					}).then((result)=>{

						if(result.value){
						
							window.location = "usuarios";

						}

					});
				

					</script>';


				}	


			}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

					}).then((result)=>{

						if(result.value){
						
							window.location = "usuarios";

						}

					});
				

				</script>';

			}


		}


	}

	/*=============================================
	MOSTRAR USUARIO
	=============================================*/

	static public function ctrMostrarUsuarios($item, $valor){

		$tabla = "usuarios";

		$respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	MOSTRAR USUARIO responsable
	=============================================*/

	static public function ctrMostrarResponsable($item1, $item2){

		$tabla = "usuarios";

		$respuesta = ModeloUsuarios::mdlMostrarResponsable($tabla, $item1, $item2);

		return $respuesta;
	}


	/*=============================================
	EDITAR USUARIO
	=============================================*/

	static public function ctrEditarUsuario(){

		if(isset($_POST["editarUsuario"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])
			 ){

				$tabla = "usuarios";

				if($_POST["editarPassword"] != ""){

					if(preg_match('/^[a-zA-Z0-9@]+$/', $_POST["editarPassword"])){

						$encriptar = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

					}else{

						echo'<script>

								swal({
									  type: "error",
									  title: "¡La contraseña no puede ir vacía o llevar caracteres especiales!",
									  showConfirmButton: true,
									  confirmButtonText: "Cerrar",
									  closeOnConfirm: false
									  }).then((result) => {
										if (result.value) {

										window.location = "usuarios";

										}
									})

						  	</script>';

					}

				}else{

					$encriptar = $_POST["passwordActual"];

				}

				$datos = array("usuario" => $_POST["editarUsuario"],
							   "password" => $encriptar,
							   "nombre" => strtoupper($_POST["editarNombre"]),
							   "empresa" => strtoupper($_POST["editarEmpresa"]),
					           "perfil" => $_POST["editarPerfil"]
					           );

				$respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El usuario ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
									if (result.value) {

									window.location = "usuarios";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El nombre o cedula incorrecto!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
							if (result.value) {

							window.location = "usuarios";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR USUARIO
	=============================================*/

	static public function ctrBorrarUsuario(){

		if(isset($_GET["idUsuario"])){

			$tabla ="usuarios";
			$datos = $_GET["idUsuario"];

			$respuesta = ModeloUsuarios::mdlBorrarUsuario($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El usuario ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then((result) => {
								if (result.value) {

								window.location = "usuarios";

								}
							})

				</script>';

			}		

		}

	}

	/*=============================================
	REGISTRO HORAS
	=============================================*/

	static public function ctrRegistroHoras($HoraIngreso, $estado){

		//obtener informacion base de datos
		$item2 = "USU_ID";
   		$valor2 = $_SESSION["id"];

        $tabla2 = "usuarios";
        $infoUsuario = ModeloUsuarios::mdlMostrarUsuarios($tabla2, $item2, $valor2);

        $diaBD = $infoUsuario["USU_DIA"];
        $horaBD = $infoUsuario["USU_HORA"];
        $minBD = $infoUsuario["USU_MIN"];

        //DIFERENCIA DE HORAS

        if($estado == 0 ){
        	$horaInicio = new DateTime("09:00:00");
       		$horaIngreso = new DateTime($HoraIngreso);
        }else{
        	$horaInicio = new DateTime($HoraIngreso);
       		$horaIngreso = new DateTime("17:30:00");
        }

        

        if( $horaInicio >= $horaIngreso){
            
            //positivo
            $interval = $horaIngreso->diff($horaInicio);
            $hora = $interval->format('%H');
            $min = $interval->format('%i');
            
            $horaBD += $hora;
            $minBD += $min; 
            if($minBD >= 60){
                $minBD -= 60;
                $horaBD += 1; 
            }
            if($horaBD >= 24){
                $horaBD -= 24;
                $diaBD += 1;
            }

        }else{
            //negativo

            $interval = $horaInicio->diff($horaIngreso);
            
            $hora = $interval->format('%H');
            $hora *= -1;
            $horaBD += $hora; 
            
            $min = $interval->format('%i');
            $min *= -1;
            $minBD += $min; 

            if($minBD <= -60){
                $minBD += 60;
                $horaBD -= 1; 
            }
            if($horaBD <= -24){
                $horaBD += 24;
                $diaBD -= 1;
            }
            
        }

        $tabla2 = "usuarios";
        $item11 = "USU_DIA";
        $item12 = "USU_HORA";
        $item13 = "USU_MIN";
        $item14 = "USU_ID";
        $valor14 = $_SESSION["id"];

        $result = ModeloUsuarios::mdlActualizarHoras($tabla2, $item11, $diaBD, $item12, $horaBD, $item13, $minBD, $item14, $valor14);

        return $result;

	}


}
	


