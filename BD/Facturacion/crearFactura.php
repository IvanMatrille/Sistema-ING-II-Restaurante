<?php
require_once '../Conexion.php';
$id = 0;

$query = "INSERT INTO Factura(IdCajero, IdCliente, IdMesa, IdMesero, Fecha)
          VALUES(0,0,0,0,SYSDATE())";
$insertar = mysqli_query($Conexion, $query);
$id = mysqli_insert_id($Conexion);

if ($insertar) {
    header("location: ../../Facturacion.php?id=".$id);
} else {
    echo "Error al intentar guardar los datos: " . mysqli_error($Conexion);
}
