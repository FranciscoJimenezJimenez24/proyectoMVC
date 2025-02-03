<?php
    if (!isset($_COOKIE["idTarea"])) {
        die("Error: idTarea no está definido en las cookies.");
    } else {
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Tarea</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header text-center font-weight-bold">
                    Confirmar Eliminación de Tarea
                </div>
                <div class="card-body">
                    <form action="index.php?action=eliminarTarea" method="get">
                        <h4 class="text-danger text-center">¿Estás seguro de eliminar esta tarea?</h4>

                        <input type="hidden" name="idTarea" value="<?php echo $_COOKIE['idTarea']; ?>">
                        <input type="hidden" name="idUsuario" value="<?php echo $_COOKIE['idUsuario']; ?>">
                        <input type="hidden" name="action" value="eliminarTarea">

                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-danger btn-lg">Eliminar</button>
                            <a href="index.php?action=cancelarAccion"
                                class="btn btn-secondary btn-lg ml-3">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>