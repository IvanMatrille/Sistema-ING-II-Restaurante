<?php
require_once '../Conexion.php';

$id = $_POST['Id'];
$nombre = $_POST['Nombre'];
$apellido = $_POST['Apellido'];
$cedula = $_POST['Cedula'];
$telefono = $_POST['Telefono'];
$email = $_POST['Email'];
$direccion = $_POST['Direccion'];

$query = "UPDATE Cliente SET Nombre='$nombre', Apellido='$apellido', Cedula='$cedula', 
         Email='$email',Telefono='$telefono', Direccion='$direccion' WHERE Id=$id";
$insertar = mysqli_query($Conexion, $query);

if ($insertar) {
    echo "Datos actualizados correctamente";
} else {
    echo "Error al intentar guardar los datos: ". mysqli_error($Conexion);
}