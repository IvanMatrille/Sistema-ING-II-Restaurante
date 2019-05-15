<?php
require_once '../Conexion.php';

$id = $_GET['id'];

$rows = array();
$queryUsr = "SELECT Id, Nombre, Referencia, CantidadInicial, Categoria, Ubicacion, ITBIS, Costo, Precio
             FROM Producto WHERE Id = $id";
$resultado = mysqli_query($Conexion, $queryUsr);

while ($row = $resultado->fetch_assoc()) {
    array_push($rows, $row);
}

echo json_encode($rows);