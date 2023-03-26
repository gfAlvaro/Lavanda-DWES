<?php
/**
 * Vista inicial
 * @author Álvaro García Fuentes
 */
require("../vendor/autoload.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superhéroes</title>
</head>
<body>
    <h1>BD Lavanda</h1>
    <form action="" method="post">
        <label>Nombre de empresa a buscar: <input type="text" name="nombre"></label>
        <input type="submit" name="buscar" value="Buscar">
    </form>
    <br/>
    <?php
        echo "<form action=\"lavanda/add\" method=\"post\">
            <input type=\"submit\" name=\"add\" value=\"Add\">
        </form>";
    
        foreach ($data as $key => $value) {
            echo "<br>id = $value[id],
                <br>cif = $value[cif],
                <br>nombre: $value[nombre],
                <br>descripción: $value[descripcion],
                <br>email: $value[email],
                <br>telefono: $value[telefono],
                <br>logo: $value[logo],
                <br>observaciones: $value[observaciones],
                <br>valoracion: $value[valoracion],
                <br>creado el $value[created_at],
                <br>Última modificación el $value[updated_at]";
            echo "<a href=\"lavanda/edit/$value[id]\">edit</a><a href=\"lavanda/del/$value[id]\">delete</a><br/>";
        }
    ?>
</body>
</html>