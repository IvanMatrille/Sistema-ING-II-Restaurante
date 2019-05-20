<?php
require_once '../Conexion.php';

$nombre = $_POST['Nombre'];
$cantidad = $_POST['Cantidad'];
$ubicacion = $_POST['Ubicacion'];
$ITBIS = $_POST['ITBIS'];
$costo = $_POST['Costo'];
$precio = $_POST['Precio'];

$query = "INSERT INTO Plato(Nombre, Cantidad, Ubicacion, ITBIS, Costo, Precio)
            VALUES('$nombre', $cantidad, '$ubicacion', $ITBIS, $costo, $precio)";
$insertar = mysqli_query($Conexion, $query);

if ($insertar) {
    echo "Datos guardados correctamente";
} else {
    echo "Error al intentar guardar los datos: ". mysqli_error($Conexion);
}