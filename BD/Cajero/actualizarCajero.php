<?php
require_once '../Conexion.php';

$id = $_POST['Id'];
$nombre = $_POST['Nombre'];
$apellido = $_POST['Apellido'];

$query = "UPDATE Cajero SET Nombre='$nombre', Apellido='$apellido' WHERE Id=$id";
$insertar = mysqli_query($Conexion, $query);

if ($insertar) {
    echo 1;
} else {
    echo "Error al intentar guardar los datos: ". mysqli_error($Conexion);
}