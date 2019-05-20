function lista(busqueda) {
    $.ajax({
        type: "GET",
        url: "BD/Usuario/listaUsuarios.php",
        data: "busqueda="+busqueda,
        success: function (response) {
            let datos = JSON.parse(response);
            let row = "";

            for (const i in datos) {
                row += "<tr>";
                row += "<td>" + datos[i].Id + "</td>";
                row += "<td> " + datos[i].NombreUsuario + "</td>";
                row += "<td> " + datos[i].Nombre + "</td>";
                row += "<td> " + datos[i].Apellido + "</td>";
                row += "<td> " + datos[i].NombreRol + "</td>";
                row +=
                    '<td> <button class="btn btn-success btn-sm" onclick="detalle(' + datos[i].Id + ')" data-toggle="modal" data-target="#modalRegistro">Editar</button> </td>';
            }

            $("#tbodyUsuarios").html(row);
        }
    });
}
function roles(id) {
    $.ajax({
        type: "GET",
        url: "BD/RolUsuario/listaRoles.php",
        data: "busqueda=",
        success: function (response) {
            let datos = JSON.parse(response);
            let option = "";
            let selected = '';

            for (const i in datos) {
                selected = (datos[i].Id == id ? "selected" : "");
                option += '<option ' + selected + ' value="' + datos[i].Id + '">' + datos[i].Nombre + '</option>';
            }

            $("#roles").html(option);
        }
    });
}
function registrar() {
    let datos = {
        Nombre: $("#txtNombre").val(),
        Apellido: $("#txtApellido").val(),
        Usuario: $("#txtUsuario").val(),
        Rol: $("#roles").val(),
        Pass: $("#txtPass").val()
    };

    $.ajax({
        type: "POST",
        url: "BD/Usuario/registroUsuario.php",
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
        Nombre: $("#txtNombre").val(),
        Apellido: $("#txtApellido").val(),
        Usuario: $("#txtUsuario").val(),
        Rol: $("#roles").val(),
        Pass: $("#txtPass").val()
    };

    $.ajax({
        type: "POST",
        url: "BD/Usuario/actualizarUsuario.php",
        data: datos,
        success: function (response) {
            if (response == 1) {
                alert("Usuario actualizado correctamente");
                $('#modalRegistro').modal('hide');
                lista($('#busqueda').val());
            } else {
                alert("Clave incorrecta");
            }
        }
    });
}

function detalle(id) {
    $("#txtPass").val("");
    
    $.ajax({
        type: "GET",
        url: "BD/Usuario/detalleUsuario.php",
        data: "id=" + id,
        success: function (response) {
            let datos = JSON.parse(response);
            $('#txtID').val(datos[0].Id);
            $("#txtUsuario").val(datos[0].NombreUsuario);
            $("#txtNombre").val(datos[0].Nombre);
            $("#txtApellido").val(datos[0].Apellido);

            roles(datos[0].IdRolUsuario);
        }
    });
}

$(() => {
    lista('');

    $("#btnNuevo").click(function (e) {
        $("#frmRegistro").trigger("reset");
        $('#txtID').val(0);
        roles(0);
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