function lista(busqueda) {
    $.ajax({
        type: "GET",
        url: "BD/Cajero/listaCajeros.php",
        data: "busqueda="+busqueda,
        success: function(response) {
            let datos = JSON.parse(response);
            let row = "";

            for (const i in datos) {
                row += "<tr>";
                row += "<td>" + datos[i].Id + "</td>";
                row += "<td> " + datos[i].Nombre + "</td>";
                row += "<td> " + datos[i].Apellido + "</td>";
                row +=
                    '<td> <button class="btn btn-success btn-sm" onclick="detalle(' + datos[i].Id + ')" data-toggle="modal" data-target="#modalRegistro">Editar</button> </td>';
            }

            $("#tbodyCajeros").html(row);
        }
    });
}

function detalle(id) {
    $.ajax({
        type: "GET",
        url: "BD/Cajero/detalleCajero.php",
        data: "id=" + id,
        success: function(response) {
            let datos = JSON.parse(response);
            $('#txtID').val(datos[0].Id);
            $("#txtNombre").val(datos[0].Nombre),
            $("#txtApellido").val(datos[0].Apellido)
        }
    });
}

function registrar() {
    let datos = {
        Nombre: $("#txtNombre").val(),
        Apellido: $("#txtApellido").val()
    };

    $.ajax({
        type: "POST",
        url: "BD/Cajero/registroCajero.php",
        data: datos,
        success: function(response) {
            if (response == 1) {
                alert("Datos guardados correctamente");
                $('#modalRegistro').modal('hide');
            } else {
                alert("El numero de cedula no puede repetirse!");
            }

            lista($('#busqueda').val());
        }
    });
}

function actualizar() {
    let datos = {
        Id: $('#txtID').val(),
        Nombre: $("#txtNombre").val(),
        Apellido: $("#txtApellido").val()
    };

    $.ajax({
        type: "POST",
        url: "BD/Cajero/actualizarCajero.php",
        data: datos,
        success: function(response) {
            if (response == 1) {
                alert("Datos actualizados correctamente");
                $('#modalRegistro').modal('hide');
            }

            lista($('#busqueda').val());
        }
    });
}

$(() => {
    lista('');

    $("#btnNuevo").click(function(e) {
        $("#frmRegistro").trigger("reset");
        $('#txtID').val(0);
    });

    $("#frmRegistro").submit(function(e) {
        e.preventDefault();
        let id = $('#txtID').val();

        if (id == 0) {
            registrar();
        } else {
            actualizar();
        }
    });

    $('#busqueda').on('propertychange input', function () {
        lista( $('#busqueda').val() );
    });
});