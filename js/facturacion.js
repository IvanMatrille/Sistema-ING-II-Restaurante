function detalle(id) {
    $.ajax({
        type: "GET",
        url: "BD/Facturacion/detalleFactura.php",
        data: "Id=" + id,
        success: function(response) {
            let datos = JSON.parse(response);

            listaCajeros('', datos[0].IdCajero);
            listaMesas(datos[0].IdMesa);
            listaMeseros('', datos[0].IdMesero);
            detalleCliente(datos[0].IdCliente);
        }
    });
}

function listaCajeros(busqueda, id) {
    $.ajax({
        type: "GET",
        url: "BD/Cajero/listaCajeros.php",
        data: "busqueda=" + busqueda,
        success: function(response) {
            let datos = JSON.parse(response);
            let option = '';
            let selected = (id == 0 || id == '') ? 'selected' : '';

            option += '<option disabled ' + selected + '>-Seleccionar-</option>';
            for (const i in datos) {
                selected = (datos[i].Id == id) ? 'selected' : '';
                option += '<option ' + selected + ' value="' + datos[i].Id + '">' + datos[i].Nombre + ' ' + datos[i].Apellido + '</option>';
            }

            $('#cajero').html(option);
        }
    });
}

function listaMesas(id) {
    $.ajax({
        type: "GET",
        url: "BD/Mesa/listaMesas.php",
        success: function(response) {
            let datos = JSON.parse(response);
            let option = '';
            let selected = (id == 0 || id == '') ? 'selected' : '';

            option += '<option disabled ' + selected + '>-Seleccionar-</option>';
            for (const i in datos) {
                selected = (datos[i].Id == id) ? 'selected' : '';
                option += '<option ' + selected + ' value="' + datos[i].Id + '">' + datos[i].Descripcion + '</option>';
            }

            $('#mesa').html(option);
        }
    });
}

function listaMeseros(busqueda, id) {
    $.ajax({
        type: "GET",
        url: "BD/Mesero/listaMeseros.php",
        data: "busqueda=" + busqueda,
        success: function(response) {
            let datos = JSON.parse(response);
            let option = '';
            let selected = (id == 0 || id == '') ? 'selected' : '';

            option += '<option disabled ' + selected + '>-Seleccionar-</option>';
            for (const i in datos) {
                selected = (datos[i].Id == id) ? 'selected' : '';
                option += '<option ' + selected + ' value="' + datos[i].Id + '">' + datos[i].Nombre + ' ' + datos[i].Apellido + '</option>';
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
                    '<td> <button class="btn btn-success btn-sm" onclick="guardarCliente(' + datos[i].Id + ')" >Aceptar</button> </td>';
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
                    '<td> <button class="btn btn-success btn-sm" onclick="agregarPlato(' + datos[i].Id + ', ' + datos[i].Precio + ')" >Agregar</button> </td>';
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

function platosDeVenta(id) {
    $.ajax({
        type: "GET",
        url: "BD/Facturacion/platosDeVenta.php",
        data: "id=" + id,
        success: function(response) {
            let datos = JSON.parse(response);
            let row = "";

            for (const i in datos) {
                row += "<tr>";
                row += "<td>" + datos[i].Codigo + "</td>";
                row += "<td>" + datos[i].Nombre + "</td>";
                row += "<td>" + datos[i].Cantidad + "</td>";
                row += "<td>" + datos[i].Precio + "</td>";
                row += "<td>" + datos[i].PrecioPlatos + "</td>";
                row += '<td><button class="btn btn-danger btn-sm" onclick="borrarPlato(' + datos[i].Codigo + ')">Borrar</button></td>';
                row += "</tr>";
                $('#tdPrecioTotal').html(datos[i].PrecioTotal);
            }
            $("#tbodyVenta").html(row);
        }
    });

    $.ajax({
        type: "GET",
        url: "BD/Facturacion/precioTotal.php",
        data: "id=" + id,
        success: function(response) {
            let datos = JSON.parse(response);
            $('#tdPrecioTotal').html(datos);
        }
    });
}

function agregarPlato(idPlato, precio) {
    let repetido = false;
    var tablaVenta = document.getElementById('tablaVenta');
    for (var i = 1; i < tablaVenta.rows.length; i++) {
        if (idPlato == tablaVenta.rows[i].cells[0].innerText) {
            repetido = true;
            break;
        }
    }

    let cantidad = $('#cantidad').val();
    if (cantidad > 0) {
        if (!repetido) {
            let datos = {
                "id": $('#txtId').val(),
                "IdPlato": idPlato,
                "Cantidad": cantidad,
                "Precio": precio,
                "PrecioPlatos": parseFloat(cantidad * precio)
            };

            $.ajax({
                type: "POST",
                url: "BD/Facturacion/agregarPlato.php",
                data: datos,
                success: function(response) {
                    console.log(response);
                    platosDeVenta($('#txtId').val());
                }
            });
        } else {
            alert("El producto ya esta registrado!");
        }
    } else {
        alert("La cantidad debe ser mayor igual que 1!");
    }
}

function borrarPlato(idPlato) {
    let datos = {
        "Id": $('#txtId').val(),
        "IdPlato": idPlato
    }
    $.ajax({
        type: "POST",
        url: "BD/Facturacion/borrarPlato.php",
        data: datos,
        success: function(response) {
            console.log('Borrado correcto');
            platosDeVenta($('#txtId').val());
        }
    });

    // var tablaVenta = document.getElementById('tablaVenta');
    // row.closest('tr').remove();
    // $('#tdPrecioProductos').html(sumarPrecios(tablaVenta));
}

function nuevafactura() {
    $.ajax({
        type: "POST",
        url: "BD/Facturacion/nuevaFactura.php",
        success: function(response) {
            if (response == 1) {
                alert('Facturado correctamente');
                $('#idCliente').html('');
                $('#tdNombre').html('');
                $('#tdApellido').html('');
                $('#tdTelefono').html('');
                platosDeVenta($('#txtId').val());
            }
        }
    });
}

function crearFactura() {
    $.ajax({
        type: "POST",
        url: "BD/Facturacion/crearFactura.php",
        success: function(response) {
            console.log('Factura creada con exito');
        }
    });
}

function guardar() {
    $.ajax({
        type: "POST",
        url: "BD/Facturacion/facturar.php",
        data: new FormData(document.getElementById('frmFactura')),
        processData: false,
        cache: false,
        contentType: false,
        success: function(response) {
            console.log(response);
        }
    });
}

function guardarCliente(idCliente) {
    let datos = {
        "id": $('#txtId').val(),
        "idCliente": idCliente
    };
    $.ajax({
        type: "POST",
        url: "BD/Facturacion/agregarCliente.php",
        data: datos,
        success: function(response) {
            console.log(response);
            detalleCliente(idCliente);
        }
    });
}

$(() => {
    detalle($('#txtId').val());
    listaCajeros('');
    listaMesas();
    listaMeseros('');
    platosDeVenta($('#txtId').val());

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

    $('.f-data').change(function(e) {
        e.preventDefault();
        guardar();
    });
})