<?php
include("conexion.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){

$nombre=$_POST['nombre'];

$sql="INSERT INTO asignaturas (nombre)
VALUES ('$nombre')";

mysqli_query($conexion,$sql);

header("Location: asignaturas_listar.php");
}
?>

<h2>Crear Asignatura</h2>

<form method="POST">

Nombre:<br>
<input type="text" name="nombre"><br><br>

<input type="submit" value="Guardar">

</form>