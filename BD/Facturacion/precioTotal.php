<?php
require_once '../Conexion.php';

$precioTotal = '';
$queryUsr = "SELECT SUM(PrecioPlatos) 'PrecioTotal' FROM DetalleFactura";

$resultado = mysqli_query($Conexion, $queryUsr);

if ($row = $resultado->fetch_assoc()) {
    $precioTotal = $row['PrecioTotal'];
}

echo json_encode($precioTotal);