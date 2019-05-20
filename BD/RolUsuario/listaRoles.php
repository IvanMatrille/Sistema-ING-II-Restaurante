<?php
require_once '../Conexion.php';
$busqueda = $_GET['busqueda'];

$rows = array();
$queryUsr = "SELECT Id, Nombre FROM RolUsuario WHERE Nombre like CONCAT('%', '$busqueda', '%')";
$resultado = mysqli_query($Conexion, $queryUsr);

while ($row = $resultado->fetch_assoc()) {
    array_push($rows, $row);
}

echo json_encode($rows);