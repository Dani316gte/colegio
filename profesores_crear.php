<?php
include("conexion.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){

$nombre=$_POST['nombre'];
$email=$_POST['email'];

$sql="INSERT INTO profesores (nombre,email)
VALUES ('$nombre','$email')";

mysqli_query($conexion,$sql);

header("Location: profesores_listar.php");
}
?>

<h2>Crear Profesor</h2>

<form method="POST">

Nombre:<br>
<input type="text" name="nombre"><br><br>

Email:<br>
<input type="text" name="email"><br><br>

<input type="submit" value="Guardar">

</form>