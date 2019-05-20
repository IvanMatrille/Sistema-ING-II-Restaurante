<?php
require_once '../Conexion.php';

$id = $_GET['id'];

$rows = array();
$queryUsr = "SELECT Id, Nombre, Cantidad, Ubicacion, ITBIS, Costo, Precio FROM Plato WHERE Id = $id";
$resultado = mysqli_query($Conexion, $queryUsr);

while ($row = $resultado->fetch_assoc()) {
    array_push($rows, $row);
}

echo json_encode($rows);