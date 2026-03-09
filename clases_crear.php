<?php
include("conexion.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){

$alumno_id=$_POST['alumno_id'];
$profesor_id=$_POST['profesor_id'];
$asignatura_id=$_POST['asignatura_id'];
$fecha=$_POST['fecha'];
$hora=$_POST['hora'];

# buscar aula libre
$sql="SELECT * FROM aulas 
WHERE borrado=0 
AND id NOT IN (
SELECT aula_id FROM clases WHERE fecha='$fecha' AND hora='$hora'
)";

$res=mysqli_query($conexion,$sql);

if(mysqli_num_rows($res)==0){
echo "No hay aulas disponibles";
exit;
}

$aula=mysqli_fetch_assoc($res);
$aula_id=$aula['id'];

$sql="INSERT INTO clases (fecha,hora,alumno_id,profesor_id,aula_id,asignatura_id)
VALUES ('$fecha','$hora',$alumno_id,$profesor_id,$aula_id,$asignatura_id)";

mysqli_query($conexion,$sql);

header("Location: clases_listar.php");
}

# obtener alumnos
$alumnos=mysqli_query($conexion,"SELECT * FROM alumnos WHERE borrado=0");

# obtener profesores
$profesores=mysqli_query($conexion,"SELECT * FROM profesores WHERE borrado=0");

# obtener asignaturas
$asignaturas=mysqli_query($conexion,"SELECT * FROM asignaturas WHERE borrado=0");

?>

<h2>Crear Clase</h2>

<form method="POST">

Alumno:<br>
<select name="alumno_id">
<?php
while($a=mysqli_fetch_assoc($alumnos)){
echo "<option value='".$a['id']."'>".$a['nombre']."</option>";
}
?>
</select>
<br><br>

Profesor:<br>
<select name="profesor_id">
<?php
while($p=mysqli_fetch_assoc($profesores)){
echo "<option value='".$p['id']."'>".$p['nombre']."</option>";
}
?>
</select>
<br><br>

Asignatura:<br>
<select name="asignatura_id">
<?php
while($as=mysqli_fetch_assoc($asignaturas)){
echo "<option value='".$as['id']."'>".$as['nombre']."</option>";
}
?>
</select>
<br><br>

Fecha:<br>
<input type="date" name="fecha" required>
<br><br>

Hora:<br>
<select name="hora">
<option value="08:00:00">08:00</option>
<option value="09:00:00">09:00</option>
<option value="10:00:00">10:00</option>
<option value="11:00:00">11:00</option>
<option value="12:00:00">12:00</option>
<option value="13:00:00">13:00</option>
</select>

<br><br>

<input type="submit" value="Guardar clase">

</form>