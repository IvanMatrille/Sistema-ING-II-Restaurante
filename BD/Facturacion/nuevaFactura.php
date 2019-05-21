<?php
require_once '../Conexion.php';

$query = "INSERT INTO Factura(IdCajero, IdCliente, IdMesa, IdMesero, Fecha) 
          VALUES(0,0,0,0,SYSDATE())";
$insertar = mysqli_query($Conexion, $query);

if ($insertar) {
    echo 1;
} else {
    echo "Error al intentar guardar los datos: ". mysqli_error($Conexion);
}