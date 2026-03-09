<?php
include("conexion.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){

$nombre=$_POST['nombre'];
$email=$_POST['email'];
$telefono=$_POST['telefono'];

$sql="INSERT INTO alumnos (nombre,email,telefono)
VALUES ('$nombre','$email','$telefono')";

mysqli_query($conexion,$sql);

header("Location: alumnos_listar.php");
}
?>

<h2>Crear Alumno</h2>

<form method="POST">

Nombre:<br>
<input type="text" name="nombre"><br><br>

Email:<br>
<input type="text" name="email"><br><br>

Telefono:<br>
<input type="text" name="telefono"><br><br>

<input type="submit" value="Guardar">

</form>