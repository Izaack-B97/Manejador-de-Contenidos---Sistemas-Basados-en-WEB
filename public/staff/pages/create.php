<?php

require_once('../../../private/initialize.php');

if(is_post_request()) {

  // Handle form values sent by new.php
  $errores = validate_page($_POST['menu_name'], $_POST['content']); // Validamos el form

  if ($errores != null) {
    echo "<h1>Errores en el formulario</h1>";
    echo "<p>Porfavor verifique que introdujo correctamente los datos</p>";

    foreach ($errores as $key => $err)
      echo "<h3 style='color:red;'>" . $err . "</h3>";
    
  } else {
    $page['subject_id'] = $_POST['subject_id'] ?? '';
    $page['menu_name'] = $_POST['menu_name'] ?? '';
    $page['position'] = $_POST['position'] ?? '';
    $page['visible'] = $_POST['visible'] ?? '';
    $page['content'] = $_POST['content'] ?? '';
  
    $result = insert_page($page);
    $new_id = mysqli_insert_id($db);
    redirect_to(url_for('/staff/pages/show.php?id=' . $new_id));
  }
    
} else {
  redirect_to(url_for('/staff/pages/new.php'));
}

?>
