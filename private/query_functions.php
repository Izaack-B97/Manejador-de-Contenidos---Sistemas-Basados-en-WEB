<?php
function find_all_subjects(){
	global $db;
	$sql = "SELECT * FROM subjects ";
	$sql .= "ORDER BY position ASC";
	// echo $sql;
	$result = mysqli_query($db, $sql);
	confirm_result_set($result);
	return $result;
}

function find_subject_by_id($id){
	global $db;

	$sql = "SELECT * FROM subjects ";
	$sql .= "WHERE id='" . $id . "'"; // Query de consulta
	$result = mysqli_query($db, $sql); // Ejecutamos la consulta
	confirm_result_set($result); // Verificamos que se hizo correctamente la consulta
	$subject = mysqli_fetch_assoc($result); // Convertimos el resultset en array associativo
	mysqli_free_result($result); // Liberamos la memoria del resultset
	return $subject; // return an assoc. array
}

function find_all_pages(){
	global $db;

	$sql = "SELECT * FROM pages ";
	$sql .= "ORDER BY subject_id ASC, position ASC";
	$result = mysqli_query($db,$sql);
	confirm_result_set($result);
	return $result;
}

function insert_subject($menu_name, $position, $visible){
	global $db;

	$sql = "INSERT INTO subjects ";
	$sql .= "(menu_name, position, visible) ";
	$sql .= "VALUES (";
	$sql .= "'" . $menu_name . "',";
	$sql .= "'" . $position . "',";
	$sql .= "'" . $visible . "'";
	$sql .= ")";
	$result = mysqli_query($db, $sql);
	// For INSERT statements, $result is true/false
	if ($result) {
		return true;
	} else {
		// INSERT failed
		echo mysqli_error($db);
		db_discconect($db);
		exit();
	}
}

function update_subject($subject){
	global $db;

	$sql = "UPDATE subjects SET ";
	$sql .= "menu_name='" . $subject['menu_name'] . "', ";
	$sql .= "position='" . $subject['position'] . "', ";
	$sql .= "visible='" . $subject['visible'] . "' ";
	$sql .= "WHERE id='" . $subject['id'] . "' ";
	$sql .= "LIMIT 1";
  
	$result = mysqli_query($db, $sql);
	// for UPDATE statements, $result is true/false
	if ($result) {
		return true;
	} else {
	  //UPDATE failed
	  echo mysqli_error($db);
	  db_disconnect($db);
	  exit;
	}
}

?>