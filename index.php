<?php
session_start();
if(($_SESSION["loggedin"])== true ){
 
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta charset="UTF-8">
        <link href="HojaStylesCRUD.css" rel="stylesheet" type="text/css" />
        <meta name="viewport" content="width=device-width, initial-scale=1">

        
        <title> CRUD IMPRESORAS</title>
    </head>
    <body>
        
        <h1 style="text-align: center"> Bienvenidos al programa de gestión de Impresoras 3D!</h1>
        
//
//        error_reporting(E_ALL);
//            ini_set('display_errors', '1');
//            $conexion = new mysqli("localhost", "root", "");
//            if ($conexion->connect_errno > 0) {
//                echo "No se ha podido establecer conexión con el servidor de bases de datos.";
//                die ("Error: " . $conexion->connect_error);
//            } else {
//            $conexion->select_db("gestion_impresoras");
//            $conexion->set_charset("utf8");
//            $consulta = $conexion->query('SELECT * FROM gestion_impresora');
//            }
            
        

            <table align="center">
                    
                    <th> ID</th>
                    <th> Marca</th>
                    <th> Tipo</th>
                    <th> Precio</th>
                    <th> Eliminar producto</th>
                    <th> Modificar producto</th>
                
                
                <?php
                while ($valores = $consulta->fetch_array()){
                
                echo "<tr>";
                echo "<td>".$valores['ID']."</td>";
                echo "<td>".$valores['Marca']."</td>";
                echo "<td>".$valores['Tipo']."</td>";
                echo "<td>".$valores['Precio']. "€". "</td>";
                echo "<td><a href='EliminaCRUD.php?id=".$valores['ID']."'> Eliminar </a></td>";
                echo "<td><a href='FormularioModificaCRUD.php?id=".$valores['ID']."'> Modificar </a></td>";
                               
                echo "</tr>";
                
                }
                ?>
                
                <form name="inserta" id="inserta" action="InsertaDatosCRUD.php" method="post">
                   <input type="hidden" name="ejercicio" value="01">
                   <input type="hidden" name="accion" value="Nuevo cliente">
                
                 <td></td>
                 <td><input type="text" name="Marca" placeholder="Marca" required></td>
                 <td><input type="text" name="Tipo" placeholder="Tipo" required></td>
                 <td><input type="text" name="Precio" placeholder="Precio" size="12" required></td>
                 
                 <td colspan="3">
                   <button type="submit" class="button"> Nuevo producto </button>
                 </td>
                </form>
                 
            
            </table>
    </body>
</html>
    
<?php

session_destroy();
//if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
//    // last request was more than 30 minutes ago
//    session_unset();     // unset $_SESSION variable for the run-time 
//    session_destroy();   // destroy session data in storage
//}
//$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp


} else {
//    echo "Error";
    ?>

    <html>
        <h2> No estas logeado, Pulse el siguiente enlace para continuar</h2>
     <h2><a href="http://localhost:8080/CRUD_Impresoras/LoginCRUD.html">->  Pulsa aqui para loguearte  <-</a></h2>
    </html>
    <?php
    
}
?>
