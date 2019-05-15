<?php
require_once '../Conexion.php';

$nombre = $_POST['Nombre'];

$query = "INSERT INTO RolUsuario(Nombre) VALUES('$nombre')";
$insertar = mysqli_query($Conexion, $query);

if ($insertar) {
    echo "Datos guardados correctamente";
} else {
    echo "Error al intentar guardar los datos: ". mysqli_error($Conexion);
}
