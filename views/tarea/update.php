<?php
// Asegúrate de que la variable $tarea esté definida antes de usarla
if (isset($data['tarea'])) {
    $tarea = $data['tarea']; // Asignar el objeto tarea
} else {
    $tarea = null; // En caso de que no exista tarea
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Task</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header text-center font-weight-bold">
                    Update Task
                </div>
                <div class="card-body">
                    <!-- Formulario para actualizar la tarea -->
                    <form action="index.php?action=modificarTarea" method="post">
                        <input type="hidden" name="idUsuario" value="<?php echo $_COOKIE['idUsuario'] ?>">

                        <!-- Asegúrate de acceder correctamente a la propiedad id de la tarea -->
                        <input type="hidden" name="idTarea" value="<?php echo isset($tarea) ? $tarea->id : ''; ?>">

                        <!-- Campo para el título -->
                        <div class="form-group">
                            <label for="titulo">Title</label>
                            <input type="text" class="form-control" id="titulo" name="titulo"
                                value="<?php echo isset($tarea) ? $tarea->titulo : ''; ?>" required>
                        </div>

                        <!-- Campo para la descripción -->
                        <div class="form-group">
                            <label for="descripcion">Description</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required>
                                <?php echo isset($tarea) ? $tarea->descripcion : ''; ?>
                            </textarea>

                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Update Task</button>
                    </form>
                </div>
            </div>
            <div class="text-center mt-3">
                <a href="index.php?action=mostrarTareasUsuario" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
</body>

</html>