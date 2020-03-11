<?php

function url_for($script_path) {
  // add the leading '/' if not present
  if($script_path[0] != '/') {
    $script_path = "/" . $script_path;
  }
  return WWW_ROOT . $script_path;
}

function u($string="") {
  return urlencode($string);
}

function raw_u($string="") {
  return rawurlencode($string);
}

function h($string="") {
  return htmlspecialchars($string);
}

function error_404() {
  header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
  exit();
}

function error_500() {
  header($_SERVER["SERVER_PROTOCOL"] . " 500 Internal Server Error");
  exit();
}

function redirect_to($location) {
  header("Location: " . $location);
  exit;
}

function is_post_request() {
  return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function is_get_request() {
  return $_SERVER['REQUEST_METHOD'] == 'GET';
}

// Funcion para validar pages
function validate_page($menu_name, $content){
  $errores = [];
  
  if (trim($menu_name) == "") 
    array_push($errores, "El Menu Name esta vacio");
  
  if(strlen($menu_name) > 25)
    array_push($errores, "El Menu Name es demaciado largo");
  
  // if(preg_match("/^[A-Z]/", $menu_name )){ // Si la primera letra es mayuscula
  //   array_push($errores, "La primera letra del Menu Name debe empezar con mayuscula");
  // }

  if(strlen($content) > 200)
    array_push($errores, "El Content es demaciado largo");

  return $errores;
}

?>
