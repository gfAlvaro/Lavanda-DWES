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
    <title>Lavanda</title>
</head>
<body>
    <h1>Lavanda</h1>
    <h2>Añadir Empresa</h2>
    <form name='empresaAdd' action="" method="POST">
        <label>cif: <input type="text" name="cif"></label>
        <label>Nombre: <input type="text" name="nombre"></label>
        <label>Descripcion: <input type="text" name="descripcion"></label>
        <label>email: <input type="text" name="email"></label>
        <label>telefono: <input type="text" name="telefono"></label>
        <label>logo: <input type="text" name="logo"></label>
        <label>Observaciones: <input type="text" name="observaciones"></label>
        <label>Valoracion: <input type="text" name="valoracion"></label>
        <input type="submit" value="Añadir Empresa">
    </form>
    <?php
        if( isset( $_POST['nombre'] ) )
            echo $data['existe']?
                "<p>La empresa ya existe en la BD</p>"
            :   "<p>Empresa añadida a la BD</p>";
    ?>
        <a href='/'>Volver</a>
</body>
</html>