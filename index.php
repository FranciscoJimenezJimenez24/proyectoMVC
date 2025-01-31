<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/proyectoMVC/controllers/gestionTareas.php";

// Miramos el valor de la variable "$_REQUEST["action"]", si existe. Si no, le asignamos una acción por defecto
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];  // solo el nombre del método
} else {
    $action = "sendToLogin";  // Acción por defecto
}

$gestionTareas = new GestionTareas();

call_user_func([$gestionTareas, $action]);

?>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        justify-content: center;
        align-items: center;
        display: flex;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    tr:hover {background-color: #f5f5f5;}
</style>
