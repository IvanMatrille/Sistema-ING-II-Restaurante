<?php
require_once '../Conexion.php';

$rol = $_GET['Rol'];

$rows = array();
$queryUsr = "SELECT Id, CONCAT(Nombre, ' ', Apellido) 'NombreEmpleado' FROM Usuario WHERE IdRolUsuario = $rol";
$resultado = mysqli_query($Conexion, $queryUsr);

while ($row = $resultado->fetch_assoc()) {
    array_push($rows, $row);
}

echo json_encode($rows);