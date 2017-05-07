<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="refresh" content="0;URL='index.php'" />    
        <title></title>
    </head>
    <body>
        <?php
        
        error_reporting(E_ALL);
        ini_set('display_errors', '1');
            $conexion = new mysqli("localhost", "root", "");
            if ($conexion->connect_errno > 0) {
                echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
                die ("Error: " . $conexion->connect_error);
            } else {
            $conexion->select_db("gestion_impresoras");
            $conexion->set_charset("utf8");
            }
        
        $insercion = "INSERT INTO gestion_impresora (Marca, Tipo, Precio) VALUES ('$_POST[Marca]','$_POST[Tipo]','$_POST[Precio]')";
    
        if ($conexion->query($insercion) === TRUE) {
        echo "Se ha creado un registo de forma satisfactoria";
        } else {
        echo "Error: " . $insercion . "<br>" . $conexion->error;
        }
        
        $conexion->close();
        header('Location: index.php');
        ?>
        
    </body>
</html>
        
        