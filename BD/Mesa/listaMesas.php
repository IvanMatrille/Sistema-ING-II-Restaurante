<?php
require_once '../Conexion.php';

$rows = array();
$queryUsr = "SELECT Id, Descripcion FROM Mesa";
$resultado = mysqli_query($Conexion, $queryUsr);

while ($row = $resultado->fetch_assoc()) {
    array_push($rows, $row);
}

echo json_encode($rows);