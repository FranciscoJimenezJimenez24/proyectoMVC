<?php

$listaTareas = $data['listaTareas'];

if (count($listaTareas) == 0) {
    echo "No hay datos";
  } else {
    echo "<table border ='1'>";
    foreach ($listaTareas as $tarea) {
      echo "<tr>";
      echo "<td>" . $tarea->titulo . "</td>";
      echo "<td>" . $tarea->descripcion . "</td>";
      echo "<td><a href='index.php?action=modificarTarea&id=" . $tarea->id . "'>Modificar</a></td>";
      echo "<td><a href='index.php?action=deleteTarea&id=" . $tarea->id . "'>Borrar</a></td>";
      echo "</tr>";
    }
    echo "</table>";
  }
  echo "<p><a href='index.php?action=createTarea'>Nuevo</a></p>";

?>