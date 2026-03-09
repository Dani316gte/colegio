<?php
include("conexion.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){

$numero=$_POST['numero'];
$capacidad=$_POST['capacidad'];
$edificio=$_POST['edificio'];

$sql="INSERT INTO aulas (numero,capacidad,edificio)
VALUES ('$numero','$capacidad','$edificio')";

mysqli_query($conexion,$sql);

header("Location: aulas_listar.php");
}
?>

<h2>Crear Aula</h2>

<form method="POST">

Numero:<br>
<input type="text" name="numero"><br><br>

Capacidad:<br>
<input type="number" name="capacidad"><br><br>

Edificio:<br>
<input type="text" name="edificio"><br><br>

<input type="submit" value="Guardar">

</form>