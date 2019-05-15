<?php
require_once '../Conexion.php';

$nombre = $_POST['Nombre'];
$apellido = $_POST['Apellido'];
$cedula = $_POST['Cedula'];
$telefono = $_POST['Telefono'];
$email = $_POST['Email'];
$direccion = $_POST['Direccion'];

$query = "INSERT INTO Cliente(Nombre,Apellido,Cedula,Email,Telefono,Direccion)VALUES('$nombre','$apellido','$cedula','$email','$telefono','$direccion')";
$insertar = mysqli_query($Conexion, $query);

if ($insertar) {
    echo "Datos guardados correctamente";
} else {
    echo "Error al intentar guardar los datos: ". mysqli_error($Conexion);
}
