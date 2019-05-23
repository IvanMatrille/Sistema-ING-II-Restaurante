function lista() {
    $.ajax({
        type: "GET",
        url: "/BD/Facturacion/listaFacturasPendientes.php",
        success: function (response) {
            let datos = JSON.parse(response);
            let row = "";

            for (const i in datos) {
                row += "<tr>";
                row += "<td> " + datos[i].Fecha + "</td>";
                row +=
                    '<td> <a href="../Facturacion.php?id='+ datos[i].Id +'">Detalle</a> </td>';
            }

            $("#tbodyFacturas").html(row);
        }
    });
}

$( () => {
    lista();
})