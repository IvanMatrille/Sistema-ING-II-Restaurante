function lista() {
    $.ajax({
        type: "GET",
        url: "BD/Pedido/listaPedidos.php",
        success: function (response) {
            let datos = JSON.parse(response);
            let row = "";

            for (const i in datos) {
                row += "<tr>";
                row += "<td> </td>";
                row += "<td>" + datos[i].Id + "</td>";
                row += "<td> " + datos[i].Descripcion + "</td>";
                row += "<td> " + datos[i].Estado + "</td>";
                row +=
                    '<td> <button class="btn btn-success" onclick="detalle(' + datos[i].Id + ')" data-toggle="modal" data-target="#modalRegistro">Editar</button> </td>';
            }

            $("#tbodyPedidos").html(row);
        }
    });
}
function detalle(id) {
    $.ajax({
        type: "GET",
        url: "BD/Pedido/detallePedido.php",
        data: "id=" + id,
        success: function (response) {
            let datos = JSON.parse(response);
            $('#txtID').val(datos[0].Id);
            $("#txtDescripcion").val(datos[0].Descripcion);
            $("#Estado").val(datos[0].Estado);
        }
    });
}
function registrar() {
    let datos = {
        Descripcion: $("#txtDescripcion").val(),
        Estado: $("#Estado").val()
    };

    $.ajax({
        type: "POST",
        url: "BD/Pedido/registroPedido.php",
        data: datos,
        success: function (response) {
            alert(response);
            $('#modalRegistro').modal('hide');
            lista();
        }
    });
}
function actualizar() {
    let datos = {
        Id: $('#txtID').val(),
        Descripcion: $("#txtDescripcion").val(),
        Estado: $("#Estado").val()
    };

    $.ajax({
        type: "POST",
        url: "BD/Pedido/actualizarPedido.php",
        data: datos,
        success: function (response) {
            alert(response);
            $('#modalRegistro').modal('hide');
            lista();
        }
    });
}

$(() => {
    lista();

    $("#btnNuevo").click(function (e) {
        $("#frmRegistro").trigger("reset");
        $('#txtID').val(0);
    });

    $("#frmRegistro").submit(function (e) {
        e.preventDefault();
        let id = $('#txtID').val();

        if (id == 0) {
            registrar();
        } else {
            actualizar();
        }
    });
});