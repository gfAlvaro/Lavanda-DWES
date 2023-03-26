<?php
/**
 * vista para editar empresa
 * @author Álvaro García Fuentes
 */
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Empresa</title>
</head>
<body>
    <h1>Editar Empresa</h1>
    <form action="" method="POST">
    <?php
        foreach ($data as $key => $value) {
            echo "Cif nuevo: <input type=\"text\" name=\"cif\" value=\"$value[cif]\"><br/><br/>";
            echo "Nombre nuevo: <input type=\"text\" name=\"nombre\" value=\"$value[nombre]\"><br/><br/>";
            echo "Descripción nueva: <input type=\"text\" name=\"descripcion\" value=\"$value[descripcion]\"><br/><br/>";
            echo "Email nuevo: <input type=\"text\" name=\"email\" value=\"$value[email]\"><br/><br/>";
            echo "Telefono nuevo: <input type=\"text\" name=\"telefono\" value=\"$value[telefono]\"><br/><br/>";
            echo "Logo nuevo: <input type=\"text\" name=\"logo\" value=\"$value[logo]\"><br/><br/>";
            echo "Observaciones nueva: <input type=\"text\" name=\"observaciones\" value=\"$value[observaciones]\"><br/><br/>";
            echo "Valoración nueva: <input type=\"text\" name=\"valoracion\" value=\"$value[valoracion]\"><br/><br/>";
        }
    ?>
        <input type="submit" name="enviar" value="Confirmar nombre">
    </form>
    <form action="" method="POST">
        <br/><input type="submit" name="inicio" value="Volver al inicio">
    </form>
</body>
</html>