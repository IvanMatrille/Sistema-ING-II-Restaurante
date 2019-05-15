<?php
require_once '../Conexion.php';

$nombre = $_POST['Nombre'];
$referencia = $_POST['Referencia'];
$cantidadInicial = $_POST['CantidadInicial'];
$categoria = $_POST['Categoria'];
$ubicacion = $_POST['Ubicacion'];
$ITBIS = $_POST['ITBIS'];
$costo = $_POST['Costo'];
$precio = $_POST['Precio'];

$query = "INSERT INTO Producto(Nombre, Referencia, CantidadInicial, Categoria, Ubicacion, ITBIS, Costo, Precio)
            VALUES('$nombre', '$referencia', $cantidadInicial, '$categoria', '$ubicacion', $ITBIS, $costo, $precio)";
$insertar = mysqli_query($Conexion, $query);

if ($insertar) {
    echo "Datos guardados correctamente";
} else {
    echo "Error al intentar guardar los datos: ". mysqli_error($Conexion);
}