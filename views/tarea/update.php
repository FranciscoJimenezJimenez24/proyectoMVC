<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>

<body>
    <h1>Edit Task</h1>
    <form action="index.php" method="get">
        <input type="hidden" name="idUsuario" value="<?php echo $_GET['idUsuario'] ?>">
        Title: <input type="text" name="titulo"><br>
        Description: <input type="text" name="descripcion"><br>
        <input type="hidden" name="action" value="modificarTarea">
        <input type="submit">
    </form>
    <p><a href="index.php">Back</a></p>
</body>

</html>