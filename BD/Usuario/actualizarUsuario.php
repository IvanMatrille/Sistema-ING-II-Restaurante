<?php
require_once '../Conexion.php';

$id = $_POST['Id'];
$nombre = $_POST['Nombre'];
$apellido = $_POST['Apellido'];
$usuario = $_POST['Usuario'];
$rol = $_POST['Rol'];
$pass = $_POST['Pass'];

$query = "UPDATE Usuario SET Nombre='$nombre', Apellido='$apellido', NombreUsuario='$usuario',
                 IdRolUsuario='$rol',Password='$pass' WHERE Id=$id";

$select = "SELECT Password FROM Usuario WHERE Id = $id";
$resultado = mysqli_query($Conexion, $select);
$passActual = "";

if ($row = $resultado->fetch_assoc()) {
    $passActual = $row['Password'];
}

if ($passActual == $pass) {
    $insertar = mysqli_query($Conexion, $query);

    if ($insertar) {
        echo 1;
    } else {
        echo "Error al intentar guardar los datos: " . mysqli_error($Conexion);
    }
} else {
    echo 0;
}
