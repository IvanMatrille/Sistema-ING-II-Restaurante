<?php
require_once '../Conexion.php';

$id = $_GET['id'];

$precioTotal = '';
$queryUsr = "SELECT SUM(PrecioPlatos) 'PrecioTotal' FROM DetalleFactura WHERE IdFactura = $id";

$resultado = mysqli_query($Conexion, $queryUsr);

if ($row = $resultado->fetch_assoc()) {
    $precioTotal = $row['PrecioTotal'];
}

echo json_encode($precioTotal);