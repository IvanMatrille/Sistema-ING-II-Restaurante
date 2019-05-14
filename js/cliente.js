let datos = {
  Nombre: $("#txtNombre").val(),
  Apellido: $("#txtApellido").val(),
  Cedula: $("#txtCedula").val(),
  Telefono: $("#txtTelefono").val(),
  Email: $("#txtEmail").val(),
  Direccion: $("#txtDireccion").val()
};

function lista() {
  $.ajax({
    type: "GET",
    url: "consultasBD/Cliente/listaClientes.php",
    success: function(response) {
      let datos = JSON.parse(response);
      let row = "";

      for (const i in datos) {
        row += "<tr>";
        row += "<td> </td>";
        row += "<td>" + datos[i].Id + "</td>";
        row += "<td> "+ datos[i].Nombre +"</td>";
        row += "<td> "+ datos[i].Apellido +"</td>";
        row += "<td> "+ datos[i].Cedula +"</td>";
        row += '<td> <button class="btn btn-success" data-toggle="modal" data-target="#modalRegistro">Editar</button> </td>';
      }

      $('#tbodyClientes').html(row);
    }
  });
}
function registrar() {
  $.ajax({
    type: "POST",
    url: "consultasBD/Cliente/registroCliente.php",
    data: datos,
    success: function(response) {
      alert(response);
    }
  });
}

$(() => {
  lista();

  $("#btnNuevo").click(function(e) {
    $("#frmRegistro").trigger("reset");
  });

  $("#frmRegistro").submit(function(e) {
    e.preventDefault();
    registrar();
  });
});
