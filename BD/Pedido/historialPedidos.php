<?php
require_once '../Conexion.php';

$busqueda = $_GET['busqueda'];

$rows = array();
$queryUsr = "SELECT Id, Descripcion, Fecha, Hora FROM Pedido WHERE Descripcion like CONCAT('%', '$busqueda', '%')";
$resultado = mysqli_query($Conexion, $queryUsr);

while ($row = $resultado->fetch_assoc()) {
    array_push($rows, $row);
}

echo json_encode($rows);