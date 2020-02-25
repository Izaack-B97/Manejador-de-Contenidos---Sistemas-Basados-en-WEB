<?php
	require_once('db_credentials.php');

	function db_connect(){
		$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME, '3308');	//	En mi maquina mysql corre en el puerto 3308
		confirm_db_connection();
		return $connection;
	}

	function db_disconnect($connection){
		if(isset($connection)){
			mysqli_close($connection);
		}
	}

	function confirm_db_connection(){
		if(mysqli_connect_errno()){ // Valida si hay un (codigo) de error al conectar la bd
			$msg = "Database connection failed: ";
			$msg .= mysqli_connect_error(); // Funcion que da una descripcion del error a la conexion de la bd
			$msg .= "(" . mysqli_connect_errno() . ")";
			exit($msg);
		}
	}

	function confirm_result_set($result_set){
		if(!$result_set){
			exit("Database query failed");
		}
	}

?>