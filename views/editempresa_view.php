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
    <title>Lavanda</title>
</head>
<body>
    <h1>Lavanda</h1>
    <h2>Editar empresa</h2>
    <form name='editar' action="" method="POST">
        <label>Cif: <input type='text' name='cif' value='<?php echo $data['cif'];?>'><label/><br/>
        <label>Nombre: <input type='text' name='nombre' value='<?php echo $data['nombre'];?>'><label/><br/>
        <label>Descripción: <input type='text' name='descripcion' value='<?php echo $data['descripcion'];?>'><label/><br/>
        <label>Email: <input type='text' name='email' value='<?php echo $data['email']?>'><label/><br/>
        <label>Telefono: <input type='text' name='telefono' value='<?php echo $data['telefono']?>'><label/><br/>
        <label>Logo: <input type='text' name='logo' value='<?php echo $data['logo']?>'><label/><br/>
        <label>Observaciones: <input type='text' name='observaciones' value='<?php echo $data['observaciones']?>'><label/><br/>
        <label>Valoración: <input type='text' name='valoracion' value='<?php echo $data['valoracion']?>'><label/><br/>
        <input type="submit" value="Editar"><br/>
    </form>
    <?php
        if(  isset( $_POST['cif'] )
        && isset( $_POST['nombre'] )
        && isset( $_POST['descripcion'] )
        && isset( $_POST['email'] )
        && isset( $_POST['telefono'] )
        && isset( $_POST['logo'] )
        && isset( $_POST['observaciones'] )
        && isset( $_POST['valoracion'] )  )
            echo $data['editado']?
                "<p>Empresa editada con éxito.</p>"
            :   "<p>No se pudo editar la empresa.</p>";
    ?>
        <a href='/'>Volver</a>
</body>
</html>