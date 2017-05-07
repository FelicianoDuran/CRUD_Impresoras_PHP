<?php
 $host_db = "localhost";
 $user_db = "root";
 $pass_db = "";
 $db_name = "gestion_impresoras";
 $tbl_name = "usuarios";
 
 $form_pass = $_POST['password'];
 $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

 if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

 $buscarUsuario = "SELECT * FROM $usuarios
 WHERE usuaio = '$_POST[username]' ";

 $result = $conexion->query($buscarUsuario);

 $count = mysqli_num_rows($result);

 if ($count == 1) {
 echo "<br />". "El Nombre de Usuario ya ha sido añadido." . "<br />";

 echo "<a href='formulario_registro.html'>Por favor escoga otro Nombre</a>";
 } else {

 $query = "INSERT INTO usuarios (usuario, password)
           VALUES ('$_POST[username]', '$form_pass')";

 if ($conexion->query($query) === TRUE) {
 
 echo "<br />" . "<h2>" . "Usuario Creado Exitosamente!" . "</h2>";
 echo "<h3>" . "Bienvenido: " . $_POST['username'] . "</h3>" . "\n\n";
 echo "<h4>" . "Hacer Login: " . "<a href='LoginCRUD.html'>Login</a>" . "</h4>"; 
 }

 else {
 echo "Error al crear el usuario." . $query . "<br>" . $conexion->error; 
   }
 }
 mysqli_close($conexion);
?>