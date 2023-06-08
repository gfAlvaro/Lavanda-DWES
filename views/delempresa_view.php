<?php
/**
 * vista de borrado
 * @author Álvaro García Fuentes
 */
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Álvaro García Fuentes">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, 
        initial-scale=1.0">
    <title>BD Lavanda</title>
</head>
<body>
    <h1>BD Lavanda</h1>
    <?php
        echo $data['borrado']? 
            "<p>Empresa borrada con éxito.</p>"
        :   "<p>No se pudo borrar la empresa.</p>";
    ?>
    <a href='/'>Volver</a>
</body>
</html>