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

function listaClientes(busqueda) {
    $.ajax({
        type: "GET",
        url: "BD/Cliente/listaClientes.php",
        data: "busqueda=" + busqueda,
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
                    '<td> <button class="btn btn-success btn-sm" onclick="detalleCliente(' + datos[i].Id + ')" >Aceptar</button> </td>';
                row += "</tr>";
            }

            $("#tbodyClientes").html(row);
        }
    });
}

function listaPlatos(busqueda) {
    $.ajax({
        type: "GET",
        url: "BD/Plato/listaPlatos.php",
        data: "busqueda=" + busqueda,
        success: function(response) {
            let datos = JSON.parse(response);
            let row = "";

            for (const i in datos) {
                row += "<tr>";
                row += "<td>" + datos[i].Id + "</td>";
                row += "<td>" + datos[i].Nombre + "</td>";
                row += "<td>" + datos[i].Precio + "</td>";
                row +=
                    '<td> <button class="btn btn-success btn-sm" onclick="agregarPlato(' + datos[i].Id + ', \''+ datos[i].Nombre +'\', '+ datos[i].Precio +' )" >Agregar</button> </td>';
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

function agregarPlato(id, nombre, precio) {
    let repetido = false;
    var tablaVenta = document.getElementById('tablaVenta');
    for (var i = 1; i < tablaVenta.rows.length; i++) {
        if (id == tablaVenta.rows[i].cells[0].innerText) {
            repetido = true;
            break;
        }
    }

    let cantidad = $('#cantidad').val();
    if (cantidad > 0) {
        if (!repetido) {
            let data = '';
            data += '<tr>';
            data += '<td>' + id + '</td>';
            data += '<td>' + nombre + '</td>';
            data += '<td>' + cantidad + '</td>';
            data += '<td>' + precio + '</td>';
            data += '<td>' + parseFloat(cantidad * precio) + '</td>';
            data += '<td><button class="btn btn-danger btn-sm" onclick="borrarPlato(this)">Borrar</button></td>';
            data += '</tr>';

            $('#tbodyVenta').append(data);
            $('#tdPrecioProductos').html(sumarPrecios(tablaVenta));
        } else {
            alert("El producto ya esta registrado!");
        }
    } else {
        alert("La cantidad debe ser mayor igual que 1!");
    }
}

function borrarPlato(row) {
    var tablaVenta = document.getElementById('tablaVenta');

    row.closest('tr').remove();
    $('#tdPrecioProductos').html(sumarPrecios(tablaVenta));
}

function sumarPrecios(tablaVenta) {
    var sumatoria = 0;
    var producto = 0;
    for (var i = 1; i < tablaVenta.rows.length; i++) {
        sumatoria += parseFloat(tablaVenta.rows[i].cells[4].innerText)
    }

    return sumatoria;
}

$(() => {
    listaCajeros();
    listaMesas();
    listaMeseros();

    $('#btnCliente').click(function(e) {
        listaClientes('');
    });

    $('#btnPlatos').click(function(e) {
        listaPlatos('');
    });

    $('#busquedaCliente').on('propertychange input', function() {
        listaClientes($('#busquedaCliente').val());
    });
    $('#busquedaPlato').on('propertychange input', function() {
        listaPlatos($('#busquedaPlato').val());
    });
})