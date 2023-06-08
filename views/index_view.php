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
    <meta name="author" content="Álvaro García Fuentes">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BD Lavanda</title>
</head>
<body>
    <h1>BD Lavanda</h1>
    <br/>
    <a href='empresa/add'>Añadir empresa</a>
    <p>Lista de empresas</p>
    <?php
        echo "<table>";
        echo "<tr><td>Id</td><td>Cif</td><td>Nombre</td>"
        ."<td>Descripcion</td><td>Email</td><td>Teléfono</td><td>Logo</td>"
        ."<td>Observaciones</td><td>Valoración</td><td>Creado</td><td>Modificado</td></tr>";
        foreach( $data['empresas'] as $empresa ){
            echo "<tr>"
            ."<td>$empresa[id]</td><td>$empresa[cif]</td><td>$empresa[nombre]</td>"
            ."<td>$empresa[descripcion]</td>"
            ."<td>$empresa[email]</td>"
            ."<td>$empresa[telefono]</td>"
            ."<td>$empresa[logo]</td>"
            ."<td>$empresa[observaciones]</td>"
            ."<td>$empresa[valoracion]</td>"
            ."<td>$empresa[created_at]</td>"
            ."<td>$empresa[updated_at]</td>"
            ."<td><a href='empresa/edit/?id=".$empresa['id']."'>edit</a>"
            ."&nbsp<a href='empresa/del/?id=".$empresa['id']."'>delete</a></td>"
            ."</tr>";
        }
        echo "</table>";
    ?>
</body>
</html>