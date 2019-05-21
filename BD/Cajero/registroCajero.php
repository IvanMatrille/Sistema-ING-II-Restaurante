<?php
require_once '../Conexion.php';

$nombre = $_POST['Nombre'];
$apellido = $_POST['Apellido'];

$query = "INSERT INTO Cajero(Nombre,Apellido)VALUES('$nombre','$apellido')";
$insertar = mysqli_query($Conexion, $query);

if ($insertar) {
    echo 1;
} else {
    echo "Error al intentar guardar los datos: ". mysqli_error($Conexion);
}