<?php
require_once 'Conexion.php';

$nombre = $_POST['Nombre'];
$apellido = $_POST['Apellido'];
$cedula = $_POST['Cedula'];
$telefono = $_POST['Telefono'];
$email = $_POST['Email'];
$direccion = $_POST['Direccion'];

$query = "INSERT INTO Cliente(Nombre,Apellido,Cedula,Email,Telefono,Direccion)VALUES('$nombre','$apellido','$cedula','$email','$telefono','$direccion')";
$insertar = mysqli_query($Conexion, $query);

if ($insertar) {
    echo "OK";
    // echo "<script>alert('Datos guardados correctamente.');</script>";
} else {
    echo "<script>alert('Error al intentar guardar los datos.');</script>" . mysqli_error($Conexion);
}
