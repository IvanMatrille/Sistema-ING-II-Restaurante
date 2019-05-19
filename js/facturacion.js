function listaCajeros() {
    $.ajax({
        type: "GET",
        url: "BD/Facturacion/listaEmpleados.php",
        data: "Rol=2",
        success: function(response) {
            let datos = JSON.parse(response);
            let option = '';

            for (const i in datos) {
                option += '<option value="' + datos[i].Id + '">' + datos[i].NombreEmpleado + '</option>';
            }

            $('#cajero').html(option);
        }
    });
}

function listaMesas() {
    $.ajax({
        type: "GET",
        url: "BD/Mesa/listaMesas.php",
        success: function(response) {
            let datos = JSON.parse(response);
            let option = '';

            for (const i in datos) {
                option += '<option value="' + datos[i].Id + '">' + datos[i].Descripcion + '</option>';
            }

            $('#mesa').html(option);
        }
    });
}

function listaMeseros() {
    $.ajax({
        type: "GET",
        url: "BD/Facturacion/listaEmpleados.php",
        data: "Rol=3",
        success: function(response) {
            let datos = JSON.parse(response);
            let option = '';

            for (const i in datos) {
                option += '<option value="' + datos[i].Id + '">' + datos[i].NombreEmpleado + '</option>';
            }

            $('#mesero').html(option);
        }
    });
}

function listaClientes() {
    $.ajax({
        type: "GET",
        url: "BD/Cliente/listaClientes.php",
        success: function(response) {
            let datos = JSON.parse(response);
            let row = "";

            for (const i in datos) {
                row += "<tr>";
                row += "<td>" + datos[i].Id + "</td>";
                row += "<td> " + datos[i].Nombre + "</td>";
                row += "<td> " + datos[i].Apellido + "</td>";
                row += "<td> " + datos[i].Telefono + "</td>";
                row +=
                    '<td> <button class="btn btn-success" onclick="detalleCliente(' + datos[i].Id + ')" >Aceptar</button> </td>';
                row += "</tr>";
            }

            $("#tbodyClientes").html(row);
        }
    });
}

function listaPlatos() {
    $.ajax({
        type: "GET",
        url: "BD/Platos/listaPlatos.php",
        success: function(response) {
            let datos = JSON.parse(response);
            let row = "";

            for (const i in datos) {
                row += "<tr>";
                row += "<td>" + datos[i].Id + "</td>";
                row += "<td>" + datos[i].Descripcion + "</td>";
                row += '<td> <input type="number" id="cantidad"> </td>';
                row += "<td>" + datos[i].Precio + "</td>";
                row +=
                    '<td> <button class="btn btn-success" onclick="agregarPlato(' + datos[i].Id + ')" >Agregar</button> </td>';
                row += "</tr>";
            }
            $("#tbodyPlatos").html(row);
        }
    });
}

function detalleCliente(id) {
    $.ajax({
        type: "GET",
        url: "BD/Cliente/detalleCliente.php",
        data: "id=" + id,
        success: function(response) {
            let datos = JSON.parse(response);
            $('#idCliente').html(datos[0].Id);
            $("#tdNombre").html(datos[0].Nombre);
            $("#tdApellido").html(datos[0].Apellido);
            $("#tdTelefono").html(datos[0].Telefono);

            $('#modalCliente').modal('hide');
        }
    });
}

function agregarPlato(id) {
    let data = '';
    data += '<tr>';
    data += '<td>' + id + '</td>';
    data += '<td>Arroz</td>';
    data += '<td>2</td>';
    data += '<td>RD$ 150</td>';
    data += '<td><button class="btn btn-danger" onclick="borrarPlato(this)">Borrar</button></td>';
    data += '</tr>';

    $('#tbodyVenta').append(data);
}

function borrarPlato(row) {
    row.closest('tr').remove();
}

$(() => {
    listaCajeros();
    listaMesas();
    listaMeseros();

    $('#btnCliente').click(function(e) {
        listaClientes();
    });

    $('#btnPlatos').click(function(e) {
        listaPlatos();
    });
})