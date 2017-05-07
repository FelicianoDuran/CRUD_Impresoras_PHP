<?php
$conexion = new mysqli("localhost", "root", "");
            if ($conexion->connect_errno > 0) {
                echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
                die ("Error: " . $conexion->connect_error);
            } else {
            $conexion->select_db("gestion_impresoras");
            $conexion->set_charset("utf8");
            }         
            $consulta = $conexion->query('SELECT * FROM gestion_impresora');
            
            $cambia = "UPDATE gestion_impresora SET Marca='$_POST[marca]', Tipo='$_POST[tipo]', Precio='$_POST[precio]' where ID ='$_POST[id]'";
            //error_reporting(E_ALL);
            //ini_set('display_errors', '1');
            //echo $cambia;
            $resultado = $conexion -> query($cambia);
            header('Location: index.php');
?>

