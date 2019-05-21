<?php
require_once '../Conexion.php';

$factura = [
    "id" => $_POST['id'],
    "cajero" => $_POST['cajero'],
    "mesa" => $_POST['mesa'],
    "mesero" => $_POST['mesero'],
];

$update = "UPDATE Factura SET IdCajero = $factura[cajero], IdMesa = $factura[mesa], IdMesero = $factura[mesero], Fecha=SYSDATE() WHERE Id= $factura[id]";
$resultUpdate = mysqli_query($Conexion, $update);

if ($resultUpdate) {
    echo true;
} else {
    echo false;
}

// $cajero = $_POST['Cajero'];
// $cliente = $_POST['Cliente'];
// $mesa = $_POST['Mesa'];
// $mesero = $_POST['Mesero'];

// $idMax = "SELECT MAX(Id) FROM Factura";
// $resultMax = mysqli_query($Conexion, $idMax);
// $id = '';

// if ($row = $resultMax->fetch_assoc()) {
//     $id = $row['MAX(Id)'];
// }

// $update = "UPDATE Factura SET IdCajero = $cajero, IdCliente = $cliente, IdMesa = $mesa,
//                IdMesero = $mesero, Fecha=SYSDATE() WHERE Id= $id";
// $resultUpdate = mysqli_query($Conexion, $update);

// if ($resultUpdate) {
//     echo "ID: " . $id;
// } else {
//     echo "Error al intentar guardar los datos: " . mysqli_error($Conexion);
// }
