<?php
require_once '../Conexion.php';

$id = $_GET['id'];

$rows = array();
$queryUsr = "SELECT df.IdPlatos 'Codigo', p.Nombre, df.CantidadPlatos 'Cantidad', p.Precio, 
            df.PrecioPlatos FROM DetalleFactura df INNER JOIN Plato p ON df.IdPlatos = p.Id
            WHERE df.IdFactura = $id";

$resultado = mysqli_query($Conexion, $queryUsr);

while ($row = $resultado->fetch_assoc()) {
    array_push($rows, $row);
}

echo json_encode($rows);