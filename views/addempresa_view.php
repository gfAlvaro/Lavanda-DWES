<?php
/**
 * Vista para añadir empresa
 * @author Álvaro García Fuentes
 */
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Empresa</title>
</head>
<body>
    <h1>Superhéroes</h1>
    <h3>Añadir Superhéroe</h3>
    <form action="" method="POST">
    <label>cif: </label><input type="text" name="cif">
        <label>Nombre: </label><input type="text" name="nombre">
        <label>Descripcion: </label><input type="text" name="descripcion">
        <label>email: </label><input type="text" name="email">
        <label>telefono: </label><input type="text" name="telefono">
        <label>logo: </label><input type="text" name="logo">
        <label>Observaciones: </label><input type="text" name="observaciones">
        <label>Valoracion: </label><input type="text" name="valoracion">

        <input type="submit" name="enviar" value="Añadir Empresa">
    </form>
    <form action="" method="POST">
        <input type="submit" name="inicio" value="Volver al inicio">
    </form>
</body>
</html>