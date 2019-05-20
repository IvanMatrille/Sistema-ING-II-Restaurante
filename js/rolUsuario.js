function lista(busqueda) {
    $.ajax({
        type: "GET",
        url: "BD/RolUsuario/listaRoles.php",
        data: "busqueda="+busqueda,
        success: function (response) {
            let datos = JSON.parse(response);
            let row = "";

            for (const i in datos) {
                row += "<tr>";
                row += "<td>" + datos[i].Id + "</td>";
                row += "<td> " + datos[i].Nombre + "</td>";
                row +=
                    '<td> <button class="btn btn-success btn-sm" onclick="detalle(' + datos[i].Id + ')" data-toggle="modal" data-target="#modalRegistro">Editar</button> </td>';
            }

            $("#tbodyRoles").html(row);
        }
    });
}
function detalle(id) {
    $.ajax({
        type: "GET",
        url: "BD/RolUsuario/detalleRol.php",
        data: "id=" + id,
        success: function (response) {
            let datos = JSON.parse(response);
            $('#txtID').val(datos[0].Id);
            $("#txtNombre").val(datos[0].Nombre);
        }
    });
}
function registrar() {
    let datos = {
        Nombre: $("#txtNombre").val()
    };

    $.ajax({
        type: "POST",
        url: "BD/RolUsuario/registroRol.php",
        data: datos,
        success: function (response) {
            alert(response);
            $('#modalRegistro').modal('hide');
            lista($('#busqueda').val());
        }
    });
}
function actualizar() {
    let datos = {
        Id: $('#txtID').val(),
        Nombre: $("#txtNombre").val()
    };

    $.ajax({
        type: "POST",
        url: "BD/RolUsuario/actualizarRol.php",
        data: datos,
        success: function (response) {
            alert(response);
            $('#modalRegistro').modal('hide');
            lista($('#busqueda').val());
        }
    });
}

$(() => {
    lista('');

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

    $('#busqueda').on('propertychange input', function () {
        lista($('#busqueda').val());
    });
});