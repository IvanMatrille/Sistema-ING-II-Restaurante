<?php
require_once '../Conexion.php';

$rows = array();
$queryUsr = "SELECT Id, Fecha FROM Factura WHERE IdCliente = 0 ORDER BY Fecha";

$resultado = mysqli_query($Conexion, $queryUsr);

while ($row = $resultado->fetch_assoc()) {
    array_push($rows, $row);
}

echo json_encode($rows);