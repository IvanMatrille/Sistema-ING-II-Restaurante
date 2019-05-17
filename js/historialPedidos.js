function lista(busqueda) {
    $.ajax({
        type: "GET",
        url: "BD/Pedido/historialPedidos.php",
        data: "busqueda="+busqueda,
        success: function (response) {
            let datos = JSON.parse(response);
            let row = "";

            for (const i in datos) {
                row += "<tr>";
                row += "<td> </td>";
                row += "<td>" + datos[i].Id + "</td>";
                row += "<td> " + datos[i].Descripcion + "</td>";
                row += "<td> " + datos[i].Fecha + "</td>";
                row += "<td> " + datos[i].Hora + "</td>";
                row +=
                    '<td> <button class="btn btn-success" onclick="detalle(' + datos[i].Id + ')" data-toggle="modal" data-target="#modalRegistro">Detalle</button> </td>';
            }

            $("#tbodyPedidos").html(row);
        }
    });
}

$(() => {
    lista('');

    $('#busqueda').on('propertychange input', function () {
        lista( $('#busqueda').val() );
    });
});