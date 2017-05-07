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
        $cambia = "select * from gestion_impresora where ID ='$_GET[id]'";
        //echo $cambia;
        $resultado = $conexion -> query($cambia);
        $valores= mysqli_fetch_assoc($resultado);

?>
    <!DOCTYPE html>
    <html>
     <head>
        <meta charset="utf-8">
        
        <link href="CssFormulario.css" rel="stylesheet" type="text/css" />
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <style>
            body{
                text-align:  center;
            }
            
        </style>
     </head>
     <body>
         
         <p> Introduzca la <b>Marca</b> , <b>Tipo</b> y <b>Precio</b>: </p>
            <form action="ModificaCRUD.php" method="post">
                           
            
                <input type="hidden" name="id" placeholder="ID" required value="<?php echo $valores['ID']; ?>"> <br><br>
             
             
                
                <input type="text" name="marca" placeholder="Marca" required value="<?php echo $valores['Marca']; ?>"> <br><br>
                
                
                <input type="text" name="tipo" placeholder="Tipo" required value="<?php echo $valores['Tipo']; ?>"> <br><br>

             
                <input type="text" name="precio" placeholder="Precio" required value="<?php echo $valores['Precio']; ?>"> <br> <br>
                
              <input type="submit" value="Cambiar">
            
            </form>

            
      </body>
</html>