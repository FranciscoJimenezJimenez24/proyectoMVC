<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Task</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header text-center font-weight-bold">
                    Add Task
                </div>
                <div class="card-body">
                    <form action="index.php?action=insertarTarea" method="post">
                        <input type="hidden" name="idUsuario" value="<?php echo $_COOKIE['idUsuario'] ?>">

                        <div class="form-group">
                            <label for="titulo">Title</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" required>
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Description</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Add Task</button>
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
