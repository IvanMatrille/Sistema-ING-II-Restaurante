<?php
require_once '../Conexion.php';

$id = $_POST['Id'];
$idPlato = $_POST['IdPlato'];

$query = "DELETE FROM DetalleFactura WHERE IdPlatos = $idPlato AND IdFactura = $id";
$delete = mysqli_query($Conexion, $query);

if ($delete) {
    echo 1;
} else {
    echo "Error al intentar guardar los datos: " . mysqli_error($Conexion);
}