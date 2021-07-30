<?php

require_once "conexion.php";

class ModeloUsuarios{

	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/

	static public function mdlMostrarUsuarios($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR RESPONSABLE
	=============================================*/

	static public function mdlMostrarResponsable($tabla, $item1, $item2){


			$stmt = Conexion::conectar()->prepare("SELECT CONCAT($item1,' ',$item2) FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();
		

		$stmt -> close();

		$stmt = null;

	}
	/*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	static public function mdlIngresarUsuario($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(USU_USUARIO, USU_PASSWORD, USU_NOMBRES, USU_EMPRESA, USU_PERFIL) VALUES (:USU_USUARIO, :USU_PASSWORD, :USU_NOMBRES, :USU_EMPRESA, :USU_PERFIL)");

		$stmt->bindParam(":USU_USUARIO", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":USU_PASSWORD", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":USU_NOMBRES", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":USU_EMPRESA", $datos["empresa"], PDO::PARAM_STR);
		$stmt->bindParam(":USU_PERFIL", $datos["perfil"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}

	/*=============================================
	EDITAR USUARIO
	=============================================*/

	static public function mdlEditarUsuario($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET USU_PASSWORD = :USU_PASSWORD, USU_NOMBRES = :USU_NOMBRES, USU_EMPRESA = :USU_EMPRESA, USU_PERFIL = :USU_PERFIL WHERE USU_USUARIO = :USU_USUARIO");

		$stmt -> bindParam(":USU_PASSWORD", $datos["password"], PDO::PARAM_STR);
		$stmt -> bindParam(":USU_NOMBRES", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":USU_EMPRESA", $datos["empresa"], PDO::PARAM_STR);
		$stmt -> bindParam(":USU_PERFIL", $datos["perfil"], PDO::PARAM_STR);
        $stmt -> bindParam(":USU_USUARIO", $datos["usuario"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	ACTUALIZAR USUARIO
	=============================================*/

	static public function mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	BORRAR USUARIO
	=============================================*/

	static public function mdlBorrarUsuario($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE USU_ID = :USU_ID");

		$stmt -> bindParam(":USU_ID", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;


	}

	/*=============================================
	ACTUALIZAR HORAS DE USUARIO
	=============================================*/

	static public function mdlActualizarHoras($tabla, $item1, $valor1, $item2, $valor2, $item3, $valor3, $item4, $valor4){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1, $item2 = :$item2, $item3 = :$item3 WHERE $item4 = :$item4");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_INT);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_INT);
		$stmt -> bindParam(":".$item3, $valor3, PDO::PARAM_INT);
		$stmt -> bindParam(":".$item4, $valor4, PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt -> close();

		$stmt = null;

	}

}