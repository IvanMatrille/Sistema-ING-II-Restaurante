<?php
require_once '../Conexion.php';

$idCliente = $_POST['IdCliente'];
$idMesa = $_POST['IdMesa'];
$fecha = $_POST['Fecha'];
$hora = $_POST['Hora'];

$insert = "INSERT INTO Reservaciones(IdCliente, IdMesa, Fecha, Hora) VALUES($idCliente, $idMesa, '$fecha', '$hora')";

$query = "SELECT CURDATE()";
$result = mysqli_query($Conexion, $query);
$hoy = '';

if($row = $result->fetch_assoc()) {
    $hoy = $row['CURDATE()'];
}

$hayRes = "SELECT IdMesa, Fecha, Hora FROM Reservaciones 
           WHERE Fecha = '$fecha' AND Hora = '$hora' AND IdMesa = $idMesa";
$resultado = mysqli_query($Conexion, $hayRes);

if ($hoy <= $fecha) {
    if (mysqli_num_rows($resultado) < 1) {
        $insertar = mysqli_query($Conexion, $insert);
        
        if ($insertar) {
            echo 1;
        } else {
            echo mysqli_error($Conexion);
        }
    } else {
        echo -1;
    }
} else {
    echo 0;
}
