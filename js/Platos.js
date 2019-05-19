function lista() {
    $.ajax({
        type: "GET",
        url: "BD/Platos/listaPlatos.php",
        success: function(response) {
            let datos = JSON.parse(response);
            let row = "";

            for (const i in datos) {
                row += "<tr>";
                row += "<td> </td>";
                row += "<td>" + datos[i].Id + "</td>";
                row += "<td>" + datos[i].Descripcion + "</td>";
                row += "<td>" + datos[i].Precio + "</td>";
            }
            $("#tbodyPlatos").html(row);
        }
    });
}

$(() => {
    lista();
})