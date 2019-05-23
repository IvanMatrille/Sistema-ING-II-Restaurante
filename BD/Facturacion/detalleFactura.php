<?php
require_once '../Conexion.php';

$id = $_GET['Id'];
$select = "SELECT IdCajero, IdMesa, IdMesero, IdCliente FROM Factura WHERE Id = $id";

$rows = array();
$resultado = mysqli_query($Conexion, $select);

if ($row = $resultado->fetch_assoc()) {
    array_push($rows, $row);
}

echo json_encode($rows);