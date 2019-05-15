<?php
require_once '../Conexion.php';

$id = $_POST['Id'];
$nombre = $_POST['Nombre'];

$query = "UPDATE RolUsuario SET Nombre='$nombre' WHERE Id=$id";
$insertar = mysqli_query($Conexion, $query);

if ($insertar) {
    echo "Datos actualizados correctamente";
} else {
    echo "Error al intentar guardar los datos: ". mysqli_error($Conexion);
}