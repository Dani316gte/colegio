<?php
include("conexion.php");

$sql="SELECT * FROM alumnos WHERE borrado=0";
$resultado=mysqli_query($conexion,$sql);
?>

<h2>Lista de alumnos</h2>

<table border="1">

<tr>
<th>ID</th>
<th>Nombre</th>
<th>Email</th>
<th>Telefono</th>
</tr>

<?php
while($fila=mysqli_fetch_assoc($resultado)){

echo "<tr>";
echo "<td>".$fila['id']."</td>";
echo "<td>".$fila['nombre']."</td>";
echo "<td>".$fila['email']."</td>";
echo "<td>".$fila['telefono']."</td>";
echo "</tr>";

}
?>

</table>