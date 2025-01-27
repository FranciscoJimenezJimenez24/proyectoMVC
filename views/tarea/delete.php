<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>
<body>
    <form action="index.php" method="get">
        <h2>Estas seguro de eliminar la tarea</h2>
        <input type="hidden" name="id" value="<?php echo $_GET['idTarea'];?>">
        <input type="hidden" name="idUsuario" value="<?php echo $_GET['idUsuario'];?>">
        <input type="hidden" name="action" value="eliminarTarea">
        <input type="submit" value="Eliminar">
        <a href="index.php?idUsuario=<?php echo $_GET['idUsuario'];?>">Cancelar</a>
    </form>
</body>
</html>