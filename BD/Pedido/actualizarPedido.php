<?php
require_once '../Conexion.php';

$id = $_POST['Id'];
$descripcion = $_POST['Descripcion'];
$estado = $_POST['Estado'];

$query = "UPDATE Pedido SET Descripcion='$descripcion', Estado='$estado' WHERE Id=$id";
$insertar = mysqli_query($Conexion, $query);

if ($insertar) {
    echo "Datos actualizados correctamente";
} else {
    echo "Error al intentar guardar los datos: ". mysqli_error($Conexion);
}