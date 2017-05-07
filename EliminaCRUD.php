<?php
$conexion = new mysqli("localhost", "root", "");
            if ($conexion->connect_errno > 0) {
                echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
                die ("Error: " . $conexion->connect_error);
            } else {
                
            $conexion->select_db("gestion_impresoras");
            $conexion->set_charset("utf8");
            
            //$consulta = $conexion->query('SELECT * FROM gestion_impresora');
            
            $borra = "DELETE FROM gestion_impresora WHERE ID ='$_GET[id]'";
            
            //error_reporting(E_ALL);
            //ini_set('display_errors', '1');
            
            $resultado = $conexion -> query($borra);
            }
            header('Location: Index.php');
?>

<!--DELETE FROM gestion_impresora WHERE ID ='$_GET[id]'-->