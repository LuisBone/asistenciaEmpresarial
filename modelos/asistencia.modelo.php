<?php

require_once "conexion.php";

class ModeloAsistencia{

	/*=============================================
	REGISTRO ASISTENCIA
	=============================================*/

	static public function mdlRegistrarAsistencia($tabla, $item1, $valor1, $item2, $valor2, $item3, $valor3, $item4, $valor4){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1, $item4 = :$item4 WHERE $item2 = :$item2 && $item3 = :$item3");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item4, $valor4, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item3, $valor3, PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}


	/*=============================================
	ACTUALIZAR HORA SALIDA
	=============================================*/

	static public function mdlRegistrarAsistenciaSalida($tabla, $item1, $valor1, $item2, $valor2, $item3, $valor3){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2 && $item3 = :$item3");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item3, $valor3, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	REGISTRO JUSTIFICACIÓN
	=============================================*/

	static public function mdlRegistrarJustificacion($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(USU_ID, ASI_FECHA, ASI_OBSERVACION) VALUES (:USU_ID,  :ASI_FECHA, :ASI_OBSERVACION)");

		$stmt->bindParam(":USU_ID", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":ASI_FECHA", $datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":ASI_OBSERVACION", $datos["justificacion"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}

	/*=============================================
	TRAER FECHA
	=============================================*/

	static public function mdlTraerFecha($tabla, $item, $valor, $item2, $valor2){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item && $item2 = :$item2");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE ASI_FECHA BETWEEN date_sub(now(), interval 7 month)  AND NOW() ORDER BY ASI_FECHA DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	TRAER JUSTIFICACION
	=============================================*/

	static public function mdlTraerJustificacion($tabla, $item, $valor){


			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
		

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	ACTUALIZAR JUSTIFICACION
	=============================================*/

	static public function mdlActualizarAsistencia($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	 REGISTRO ASISTENCIA DIARIA
	=============================================*/

	static public function mdlRegistrofechaDiaria($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(USU_ID, ASI_FECHA) VALUES (:USU_ID,  :ASI_FECHA)");

		$stmt->bindParam(":USU_ID", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":ASI_FECHA", $datos["fecha"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}

	/*=============================================
	MOSTRAR ATRASOS
	=============================================*/

	static public function mdlMostrarAtrasos($tabla, $item, $valor, $item2, $valor2){


			$stmt = Conexion::conectar()->prepare("SELECT COUNT(ASI_ESTADO) AS ATRASOS FROM $tabla WHERE $item = :$item && $item2 = :$item2");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetch();
	

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	TRAER HORA ACUMULADA
	=============================================*/

	static public function mdlHoraAcumulada($tabla, $item, $valor, $item2){

			$stmt = Conexion::conectar()->prepare("SELECT TIME(SUM($item2)) AS total FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();		

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	TRAER HISTORIAL DE ASISTENCIAS POR FECHA INICIO Y FIN
	=============================================*/

	static public function mdlTraerFechaReporte($tabla, $item, $valor1, $valor2){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item BETWEEN '$valor1' AND '$valor2' ORDER BY USU_ID");

			$stmt -> execute();

			return $stmt -> fetchAll();
		

		$stmt -> close();

		$stmt = null;

	}

}