<?php
require_once '../Conexion.php';

$rows = array();
$queryUsr = "SELECT u.Id, u.Nombre, u.Apellido, u.NombreUsuario, r.Nombre 'NombreRol' FROM Usuario u
            INNER JOIN RolUsuario r ON u.IdRolUsuario = r.Id";

$resultado = mysqli_query($Conexion, $queryUsr);

while ($row = $resultado->fetch_assoc()) {
    array_push($rows, $row);
}

echo json_encode($rows);