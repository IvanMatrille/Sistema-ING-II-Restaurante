<?php
require_once '../Conexion.php';

$rows = array();
$queryUsr = "SELECT r.Id, CONCAT(c.Nombre, ' ', c.Apellido) 'NombreCliente', m.Descripcion 'DescripcionMesa', r.Fecha,
             r.Hora FROM Reservaciones r INNER JOIN Cliente c ON r.IdCliente = c.Id INNER JOIN Mesa m ON r.IdMesa = m.Id";

$resultado = mysqli_query($Conexion, $queryUsr);

while ($row = $resultado->fetch_assoc()) {
    array_push($rows, $row);
}

echo json_encode($rows);