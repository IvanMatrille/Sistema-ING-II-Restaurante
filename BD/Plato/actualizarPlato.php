<?php
require_once '../Conexion.php';

$id = $_POST['Id'];
$nombre = $_POST['Nombre'];
$cantidad = $_POST['Cantidad'];
$ubicacion = $_POST['Ubicacion'];
$ITBIS = $_POST['ITBIS'];
$costo = $_POST['Costo'];
$precio = $_POST['Precio'];

$query = "UPDATE Plato SET Nombre='$nombre', Cantidad=$cantidad, Ubicacion='$ubicacion', ITBIS=$ITBIS, Costo=$costo, Precio=$precio WHERE Id=$id";
$actualizar = mysqli_query($Conexion, $query);

if ($actualizar) {
    echo "Datos actualizados correctamente";
} else {
    echo "Error al intentar guardar los datos: ". mysqli_error($Conexion);
}