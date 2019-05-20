<?php
require_once '../Conexion.php';

$idMesa = ($_POST['IdMesa'] == null) ? 0 : $_POST['IdMesa'];
$fecha = $_POST['Fecha'];
$hora = $_POST['Hora'];

$rows = array();
$queryUsr = "SELECT CONCAT(c.Nombre, ' ', c.Apellido) 'NombreCliente', m.Descripcion 'DescripcionMesa', 
             r.Fecha, r.Hora FROM Reservaciones r INNER JOIN Cliente c ON r.IdCliente = c.Id INNER JOIN Mesa m
             ON r.IdMesa = m.Id WHERE r.Fecha = '$fecha' AND r.Hora = '$hora' AND r.IdMesa = $idMesa";

$resultado = mysqli_query($Conexion, $queryUsr);

while ($row = $resultado->fetch_assoc()) {
    array_push($rows, $row);
}

echo json_encode($rows);