let datos = {
    "Nombre" : $('#txtNombre').val(),
    "Apellido" : $('#txtApellido').val(),
    "Cedula" : $('#txtCedula').val(),
    "Telefono" : $('#txtTelefono').val(),
    "Email" : $('#txtEmail').val(),
    "Direccion" : $('#txtDireccion').val(),
};

function registrar () {
    $.ajax({
        type: "POST",
        url: "consultasBD/registroCliente.php",
        data: datos,
        success: function (response) {
            alert(response);
        }
    });
}

$(() => {
    $('#frmRegistro').submit(function (e) { 
        e.preventDefault();
        registrar();
    });
});