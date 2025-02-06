<?php
$listaTareas = $data['tareas'];

// Cargar Bootstrap
echo "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'>";

if (count($listaTareas) == 0) {
  echo "<div class='alert alert-warning' role='alert'>No hay tareas disponibles.</div>";
} else {
  echo "<div class='container mt-5'>";
  echo "<div class='table-responsive'>";
  echo "<table class='table table-bordered'>";
  echo "<thead class='thead-dark'>";
  echo "<tr>";
  echo "<th>Título</th>";
  echo "<th>Descripción</th>";
  echo "<th>Acciones</th>";
  echo "</tr>";
  echo "</thead>";
  echo "<tbody>";
  foreach ($listaTareas as $tarea) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($tarea->titulo) . "</td>";
    echo "<td>" . htmlspecialchars($tarea->descripcion) . "</td>";
    echo "<td>";
    echo "<a href='index.php?action=sendToUpdateTarea&idTarea=" . $tarea->id . "' class='btn btn-warning btn-sm'>Modificar</a> ";
    echo "<a href='index.php?action=sendToDeleteTarea&idTarea=" . $tarea->id . "' class='btn btn-danger btn-sm'>Borrar</a>";
    echo "</td>";
    echo "</tr>";
  }
  echo "</tbody>";
  echo "</table>";
  echo "</div>"; // .table-responsive
  echo "</div>"; // .container
}

echo "<div class='text-center mt-3'>";
echo "<a href='index.php?action=sendToCreateTarea' class='btn btn-success'>Nuevo</a>";
echo "</div>";

// Colocamos el botón de Cerrar sesión debajo de la tabla
echo "<div class='text-center mt-3'>";
echo "<a class='btn btn-warning' href='index.php?action=cerrarSesion'>Cerrar sesión</a>";
echo "</div>";

echo "<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js'></script>";
?>