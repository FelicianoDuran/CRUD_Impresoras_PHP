<?php
$conexion = new mysqli("localhost", "root", "");
            if ($conexion->connect_errno > 0) {
                echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
                die ("Error: " . $conexion->connect_error);
            } else {
            $conexion->select_db("gestion_impresoras");
            $conexion->set_charset("utf8");
            }
            
 error_reporting(E_ALL);
 ini_set('display_errors', '1');

 $consulta = "SELECT * FROM usuarios WHERE usuario = '$_POST[username]'";
 
 
 //echo $consulta;
 //$mail = "SELECT * FROM usuarios WHERE usuario = '$usuario'";

 $resultado = $conexion -> query($consulta);

 $row = mysqli_fetch_assoc($resultado);

 $password = $row['password'];
 
$to = $_POST['mail'];
$subject = "Recuperar contraseña";

$message .= "Password: \n\r". $password; 
$message .= "\n\r Usuario: \n\r". $_POST['username'];


    
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <felidp8@gmail.com>' . "\r\n";
$headers .= 'Cc: felidp8@egmail.com' . "\r\n";

mail($to,$subject,$message,$headers);

echo "<br><br><a href=Login.html> Pulse para volver atrás. </a>";

?>