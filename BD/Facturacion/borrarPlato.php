<?php
require_once '../Conexion.php';

$idPlato = $_POST['IdPlato'];

$idMax = "SELECT MAX(Id) FROM Factura";
$resultMax = mysqli_query($Conexion, $idMax);
$id = '';

if ($row = $resultMax->fetch_assoc()) {
    $id = $row['MAX(Id)'];
}

$query = "DELETE FROM DetalleFactura WHERE IdPlatos = $idPlato AND IdFactura = $id";
$delete = mysqli_query($Conexion, $query);

if ($delete) {
    echo 1;
} else {
    echo "Error al intentar guardar los datos: " . mysqli_error($Conexion);
}