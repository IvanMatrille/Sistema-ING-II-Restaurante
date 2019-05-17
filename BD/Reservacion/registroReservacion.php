<?php
require_once '../Conexion.php';

$idCliente = $_POST['IdCliente'];
$idMesa = $_POST['IdMesa'];
$fecha = $_POST['Fecha'];

$insert = "INSERT INTO Reservaciones(IdCliente, IdMesa, Fecha) VALUES($idCliente, $idMesa, '$fecha')";

$curDate = "SELECT CURDATE()";
$resultado = mysqli_query($Conexion, $curDate);

if ($row = $resultado->fetch_assoc()) {
    $hoy = $row['CURDATE()'];
}

if ($hoy <= $fecha) {
    $insertar = mysqli_query($Conexion, $insert);

    if ($insertar) {
        echo 1;
    } else {
        echo mysqli_error($Conexion);
    }
} else {
    echo 0;
}
