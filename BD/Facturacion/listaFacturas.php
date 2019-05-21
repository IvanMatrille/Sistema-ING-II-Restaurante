<?php
require_once '../Conexion.php';

$busqueda = $_GET['busqueda'];

$rows = array();
$queryUsr = "SELECT f.Id, CONCAT(cli.Nombre, ' ', cli.Apellido) 'NombreCliente', f.Fecha
            FROM Factura f INNER JOIN Cliente cli ON f.IdCliente = cli.Id
            WHERE cli.Nombre LIKE CONCAT('%', '$busqueda', '%') OR 
            cli.Apellido LIKE CONCAT('%', '$busqueda', '%')";

$resultado = mysqli_query($Conexion, $queryUsr);

while ($row = $resultado->fetch_assoc()) {
    array_push($rows, $row);
}

echo json_encode($rows);