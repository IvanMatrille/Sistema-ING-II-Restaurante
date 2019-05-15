<?php
require_once '../Conexion.php';

$nombre = $_POST['Nombre'];
$apellido = $_POST['Apellido'];
$usuario = $_POST['Usuario'];
$rol = $_POST['Rol'];
$pass = $_POST['Pass'];

$query = "INSERT INTO Usuario (Nombre, Apellido, NombreUsuario, IdRolUsuario, Password)
            VALUES('$nombre', '$apellido', '$usuario', $rol, '$pass')";
$insertar = mysqli_query($Conexion, $query);

if ($insertar) {
    echo "Usuario registrado con exito";
} else {
    echo "Error al intentar guardar los datos: " . mysqli_error($Conexion);
}
