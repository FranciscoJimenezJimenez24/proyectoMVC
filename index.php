<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/proyectoMVC/controllers/gestionTareas.php";

// Miramos el valor de la variable "$_REQUEST["action"]", si existe. Si no, le asignamos una acción por defecto
if (isset($_REQUEST["action"])) {
    $action = "mostrarTareasUsuario";  // solo el nombre del método
} else {
    $action = "sendToLogin";  // Acción por defecto
}

$gestionTareas = new GestionTareas();

// Si el método requiere parámetros, como mostrarTareasUsuario, pasamos el parámetro adecuado
if ($action == "mostrarTareasUsuario") {
    call_user_func([$gestionTareas, $action], $_SESSION["idUsuario"]);
} else {
    call_user_func([$gestionTareas, $action]);
}
?>
