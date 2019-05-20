function lista() {
    $.ajax({
        type: "GET",
        url: "BD/Mesa/listaMesas.php",
        success: function (response) {
            let datos = JSON.parse(response);
            let row = "";

            for (const i in datos) {
                row += "<tr>";
                row += "<td>" + datos[i].Id + "</td>";
                row += "<td> " + datos[i].Descripcion + "</td>";
                row +=
                    '<td> <button class="btn btn-success btn-sm" onclick="detalle(' + datos[i].Id + ')" data-toggle="modal" data-target="#modalRegistro">Editar</button> </td>';
            }

            $("#tbodyMesas").html(row);
        }
    });
}
function detalle(id) {
    $.ajax({
        type: "GET",
        url: "BD/Mesa/detalleMesa.php",
        data: "id=" + id,
        success: function (response) {
            let datos = JSON.parse(response);
            $('#txtID').val(datos[0].Id);
            $("#txtDescripcion").val(datos[0].Descripcion);
        }
    });
}
function registrar() {
    let datos = {
        Descripcion: $("#txtDescripcion").val()
    };

    $.ajax({
        type: "POST",
        url: "BD/Mesa/registroMesa.php",
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
        Descripcion: $("#txtDescripcion").val()
    };

    $.ajax({
        type: "POST",
        url: "BD/Mesa/actualizarMesa.php",
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