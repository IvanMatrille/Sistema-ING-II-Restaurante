<?php
require_once '../Conexion.php';

$descripcion = $_POST['Descripcion'];
$estado = $_POST['Estado'];

$query = "INSERT INTO Pedido(Descripcion, Estado, Fecha, Hora) VALUES('$descripcion', '$estado', CURDATE(), CURTIME())";
$insertar = mysqli_query($Conexion, $query);

if ($insertar) {
    echo "Datos guardados correctamente";
} else {
    echo "Error al intentar guardar los datos: ". mysqli_error($Conexion);
}