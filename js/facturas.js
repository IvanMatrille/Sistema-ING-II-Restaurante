function lista(busqueda) {
    $.ajax({
        type: "GET",
        url: "/BD/Facturacion/listaFacturas.php",
        data: "busqueda="+busqueda,
        success: function (response) {
            let datos = JSON.parse(response);
            let row = "";

            for (const i in datos) {
                row += "<tr>";
                row += "<td>" + datos[i].NombreCliente + "</td>";
                row += "<td> " + datos[i].Fecha + "</td>";
                row +=
                    '<td> <a href="../Facturacion.php?id='+ datos[i].Id +'">Detalle</a> </td>';
            }

            $("#tbodyFacturas").html(row);
        }
    });
}

$( () => {
    lista('');

    $('#busqueda').on('propertychange input', function () {
        lista( $('#busqueda').val());
    });
})