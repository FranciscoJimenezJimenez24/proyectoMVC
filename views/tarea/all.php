<?php

$listaTareas = $data['listaTareas'];

if (count($listaLibros) == 0) {
    echo "No hay datos";
  } else {
    echo "<table border ='1'>";
    foreach ($listaLibros as $fila) {
      echo "<tr>";
      echo "<td>" . $fila->titulo . "</td>";
      echo "<td>" . $fila->descripcion . "</td>";
      echo "<td><a href='index.php?action=updateTarea&idTarea=" . $fila->idLibro . "'>Modificar</a></td>";
      echo "<td><a href='index.php?action=deleteTarea&idTarea=" . $fila->idLibro . "'>Borrar</a></td>";
      echo "</tr>";
    }
    echo "</table>";
  }
  echo "<p><a href='index.php?action=createTarea'>Nuevo</a></p>";

?>