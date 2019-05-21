<?php
require_once '../Conexion.php';

$id = $_POST['id'];
$idCliente = $_POST['idCliente'];

$update = "UPDATE Factura SET IdCliente = $idCliente WHERE Id= $id";
$resultUpdate = mysqli_query($Conexion, $update);

if ($resultUpdate) {
    echo true;
} else {
    echo false;
}