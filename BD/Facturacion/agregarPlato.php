<?php
require_once '../Conexion.php';

$id = $_POST['id'];
$idPlato = $_POST['IdPlato'];
$cantidad = $_POST['Cantidad'];
$precio = $_POST['Precio'];
$precioPlatos = $_POST['PrecioPlatos'];

$query = "INSERT INTO DetalleFactura
          (
              IdFactura,
              IdPlatos,
              CantidadPlatos,
              PrecioPlatos,
              NumeroItem
          ) (SELECT
              $id,
              $idPlato,
              $cantidad,
              $precioPlatos,
              (SELECT (CASE WHEN MAX(NumeroItem) IS NULL THEN 1 ELSE (MAX(NumeroItem) + 1) END) 
              FROM DetalleFactura WHERE IdFactura = $id LIMIT 1))";

$insertar = mysqli_query($Conexion, $query);

if ($insertar) {
    echo true;
} else {
    echo false;
}
