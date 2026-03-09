<?php
include("conexion.php");

$sql="SELECT clases.*, 
alumnos.nombre AS alumno,
profesores.nombre AS profesor,
asignaturas.nombre AS asignatura,
aulas.numero AS aula

FROM clases
JOIN alumnos ON clases.alumno_id=alumnos.id
JOIN profesores ON clases.profesor_id=profesores.id
JOIN asignaturas ON clases.asignatura_id=asignaturas.id
JOIN aulas ON clases.aula_id=aulas.id";

$resultado=mysqli_query($conexion,$sql);
?>

<h2>Lista de clases</h2>

<table border="1">

<tr>
<th>Fecha</th>
<th>Hora</th>
<th>Alumno</th>
<th>Profesor</th>
<th>Asignatura</th>
<th>Aula</th>
</tr>

<?php
while($fila=mysqli_fetch_assoc($resultado)){

echo "<tr>";
echo "<td>".$fila['fecha']."</td>";
echo "<td>".$fila['hora']."</td>";
echo "<td>".$fila['alumno']."</td>";
echo "<td>".$fila['profesor']."</td>";
echo "<td>".$fila['asignatura']."</td>";
echo "<td>".$fila['aula']."</td>";
echo "</tr>";

}
?>

</table>