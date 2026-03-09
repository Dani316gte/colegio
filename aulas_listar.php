<?php
include("conexion.php");

$sql="SELECT * FROM aulas WHERE borrado=0";
$resultado=mysqli_query($conexion,$sql);
?>

<h2>Lista de aulas</h2>

<table border="1">

<tr>
<th>ID</th>
<th>Numero</th>
<th>Capacidad</th>
<th>Edificio</th>
</tr>

<?php
while($fila=mysqli_fetch_assoc($resultado)){

echo "<tr>";
echo "<td>".$fila['id']."</td>";
echo "<td>".$fila['numero']."</td>";
echo "<td>".$fila['capacidad']."</td>";
echo "<td>".$fila['edificio']."</td>";
echo "</tr>";

}
?>

</table>