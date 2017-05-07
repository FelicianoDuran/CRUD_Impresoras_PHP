<?php
session_start();

?>

<?php

$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "gestion_impresoras";
$tbl_name = "usuarios";

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$usuario = $_POST['usuario'];
$password = $_POST['password'];
$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";

$result = $conexion->query($sql);



if ($result->num_rows > 0) {     
 }
 $row = $result->fetch_array(MYSQLI_ASSOC);
 
 
 if (($password==$row['password']) and ($password <> "")) { 
 
    $_SESSION['loggedin'] = true;
    $_SESSION['usuario'] = $usuario;
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
?>

<!DOCTYPE html>
<html>
<head>
 <title>Login</title>
    <link href="CssLogin.css" rel="stylesheet" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset = "utf-8">


</head>
<body>
    <div id="fullscreen_bg" class="fullscreen_bg">
        <div class="container">
    <h1 class="form-signin-heading text-muted">Bienvenido <?php echo $_SESSION['usuario'] ?></h1>
    <hr>
    <a href=index.php> Pulse para continuar </a>
        </div>
    </div>
</body>
</html>

 <?php

 } else {
   echo "Usuario o Contraseña incorrectos";

   echo "<br><a href='LoginCRUD.html'>¿Volver a Intentarlo?</a>";
 }
 mysqli_close($conexion); 
 ?>