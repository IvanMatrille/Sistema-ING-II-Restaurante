<?php
require_once '../Conexion.php';

$descripcion = $_POST['Descripcion'];

$query = "INSERT INTO Mesa(Descripcion) VALUES('$descripcion')";
$insertar = mysqli_query($Conexion, $query);

if ($insertar) {
    echo "Datos guardados correctamente";
} else {
    echo "Error al intentar guardar los datos: ". mysqli_error($Conexion);
}
