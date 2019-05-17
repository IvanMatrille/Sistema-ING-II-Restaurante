function lista() {
    $.ajax({
        type: "GET",
        url: "BD/Cliente/listaClientes.php",
        success: function (response) {
            let datos = JSON.parse(response);
            let row = "";

            for (const i in datos) {
                row += "<tr>";
                row += "<td> " + datos[i].Nombre + "</td>";
                row += "<td> " + datos[i].Apellido + "</td>";
                row += "<td> " + datos[i].Cedula + "</td>";
                row +=
                    '<td> <button class="btn btn-success" onclick="detalle(' + datos[i].Id + ')" >Aceptar</button> </td>';
                row += "</tr>";
            }

            $("#tbodyClientes").html(row);
        }
    });
}
function detalle(id) {
    $.ajax({
        type: "GET",
        url: "BD/Cliente/detalleCliente.php",
        data: "id=" + id,
        success: function (response) {
            let datos = JSON.parse(response);
            $('#idCliente').val(datos[0].Id);
            $("#tdNombre").html(datos[0].Nombre);
            $("#tdApellido").html(datos[0].Apellido);
            $("#tdCedula").html(datos[0].Cedula);

            $('#modalCliente').modal('hide');
        }
    });
}

$(() => {
    lista();

    $("#btnNuevo").click(function (e) {
        $("#frmRegistro").trigger("reset");
        $('#txtID').val(0);
        roles(0);
    });
});