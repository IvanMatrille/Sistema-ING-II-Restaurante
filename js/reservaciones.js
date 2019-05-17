function lista() {
    $.ajax({
        type: "GET",
        url: "BD/Reservacion/listaReservaciones.php",
        success: function (response) {
            let datos = JSON.parse(response);
            let row = "";

            for (const i in datos) {
                row += "<tr>";
                row += '<td> </td>';
                row += "<td> " + datos[i].Id + "</td>";
                row += "<td> " + datos[i].NombreCliente + "</td>";
                row += "<td> " + datos[i].DescripcionMesa + "</td>";
                row += "<td> " + datos[i].Fecha + "</td>";
                row += "</tr>";
            }

            $("#tbodyReservaciones").html(row);
        }
    });
}

function listaClientes() {
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
                    '<td> <button class="btn btn-success" onclick="detalleCliente(' + datos[i].Id + ')" >Aceptar</button> </td>';
                row += "</tr>";
            }

            $("#tbodyClientes").html(row);
        }
    });
}
function detalleCliente(id) {
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

function listaMesas() {
    $.ajax({
        type: "GET",
        url: "BD/Mesa/listaMesas.php",
        success: function (response) {
            let datos = JSON.parse(response);
            let row = "";

            for (const i in datos) {
                row += "<tr>";
                row += "<td> " + datos[i].Descripcion + "</td>";
                row +=
                    '<td> <button class="btn btn-success" onclick="detalleMesa(' + datos[i].Id + ')" >Aceptar</button> </td>';
                row += "</tr>";
            }

            $("#tbodyMesas").html(row);
        }
    });
}
function detalleMesa(id) {
    $.ajax({
        type: "GET",
        url: "BD/Mesa/detalleMesa.php",
        data: "id=" + id,
        success: function (response) {
            let datos = JSON.parse(response);
            $('#idMesa').val(datos[0].Id);
            $("#tdDescripcion").html(datos[0].Descripcion);

            $('#modalMesa').modal('hide');
        }
    });
}

function registro(form) {
    let idCliente = $('#idCliente').val();
    let idMesa = $('#idMesa').val();
    let fecha = $('#fecha').val();

    let datos = {
        "IdCliente": idCliente,
        "IdMesa": idMesa,
        "Fecha": fecha
    };
    $.ajax({
        type: form.method,
        url: form.action,
        data: datos,
        success: function (response) {
            if(response == 1) {
                alert('Guardado con exito');
                limpiar();
            } else if(response == 0) {
                alert("La fecha a reservar debe ser mayor que la fecha de hoy");
            } else {
                alert(response);
            }
        }
    });
}

function limpiar() {
    $('#idCliente').val("");
    $('#idMesa').val("");
    $('#fecha').val("");

    $("#tdNombre").html("");
    $("#tdApellido").html("");
    $("#tdCedula").html("");

    $("#tdDescripcion").html("");
}

$(() => {
    lista();

    $('#btnCliente').click(function (e) {
        listaClientes();
    });
    $('#btnMesa').click(function (e) {
        listaMesas();
    });

    $('#formRegistro').submit(function (e) {
        e.preventDefault();

        let idCliente = $('#idCliente').val();
        let idMesa = $('#idMesa').val();
        let fecha = $('#fecha').val();

        if (idCliente != '' && idMesa != '' && fecha != '') {
            registro(this);
        } else {
            alert("Hay campos en blanco!");
        }
    });
});