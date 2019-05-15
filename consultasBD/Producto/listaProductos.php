<?php
require_once '../Conexion.php';

$rows = array();
$queryUsr = "SELECT Id, Nombre, Referencia, Categoria, Precio FROM Producto";
$resultado = mysqli_query($Conexion, $queryUsr);

while ($row = $resultado->fetch_assoc()) {
    array_push($rows, $row);
}

echo json_encode($rows);