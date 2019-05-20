function lista() {
    $.ajax({
        type: "GET",
        url: "BD/Reservacion/listaReservaciones.php",
        success: function (response) {
            let datos = JSON.parse(response);
            let row = "";

            for (const i in datos) {
                row += "<tr>";
                row += "<td> " + datos[i].Id + "</td>";
                row += "<td> " + datos[i].NombreCliente + "</td>";
                row += "<td> " + datos[i].DescripcionMesa + "</td>";
                row += "<td> " + datos[i].Fecha + "</td>";
                row += "<td> " + datos[i].Hora + "</td>";
                row += "</tr>";
            }

            $("#tbodyReservaciones").html(row);
        }
    });
}

function listaClientes(busqueda) {
    $.ajax({
        type: "GET",
        url: "BD/Cliente/listaClientes.php",
        data: "busqueda="+busqueda,
        success: function (response) {
            let datos = JSON.parse(response);
            let row = "";

            for (const i in datos) {
                row += "<tr>";
                row += "<td> " + datos[i].Nombre + "</td>";
                row += "<td> " + datos[i].Apellido + "</td>";
                row += "<td> " + datos[i].Cedula + "</td>";
                row +=
                    '<td> <button class="btn btn-success btn-sm" onclick="detalleCliente(' + datos[i].Id + ')" >Aceptar</button> </td>';
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
                    '<td> <button class="btn btn-success btn-sm" onclick="detalleMesa(' + datos[i].Id + ')" >Aceptar</button> </td>';
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

function registro() {
    let idCliente = $('#idCliente').val();
    let idMesa = $('#idMesa').val();
    let fecha = $('#fecha').val();
    let hora = $('#hora').val() + ' ' + $('#tipo').val();;

    let datos = {
        "IdCliente": idCliente,
        "IdMesa": idMesa,
        "Fecha": fecha,
        "Hora": hora
    };
    $.ajax({
        type: "POST",
        url: "BD/Reservacion/registroReservacion.php",
        data: datos,
        success: function (response) {
            if(response == 1) {
                alert('Guardado con exito');
                limpiar();
            } else if(response == 0) {
                alert("La fecha a reservar debe ser mayor que la fecha de hoy!");
            } else if(response == -1) {
                alert("Esta reservacion esta ocupada!");
            } else {
                alert(response);
            }
        }
    });
}
function usada() {
    let idMesa = $('#idMesa').val();
    let fecha = $('#fecha').val();
    let hora = $('#hora').val() + ' ' + $('#tipo').val();;

    let datos = {
        "IdMesa": idMesa,
        "Fecha": fecha,
        "Hora": hora
    };
    $.ajax({
        type: 'POST',
        url: 'BD/Reservacion/reservacionUsada.php',
        data: datos,
        success: function (response) {
            alert(response);
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
function horas() {
    let hora ='';
    for(var i=1; i<13; i++) {
        hora += '<option value="'+ i +'">'+ i +'</option>';
    }
    $('#hora').html(hora);
}

$(() => {
    lista();
    horas();

    $('#btnCliente').click(function (e) {
        listaClientes('');
    });
    $('#btnMesa').click(function (e) {
        listaMesas();
    });

    $('#btnRegistrar').click(function (e) {
        let idCliente = $('#idCliente').val();
        let idMesa = $('#idMesa').val();
        let fecha = $('#fecha').val();

        if (idCliente != '' && idMesa != '' && fecha != '') {
            registro();
        } else {
            alert("Favor de definir el cliente, la fecha y la mesa a reservar!");
        }
    });
    
    $('#btnUsada').click(function (e) { 
        usada();
    });

    $('#busquedaCliente').on('propertychange input', function () {
        listaClientes($('#busquedaCliente').val());
    });
});