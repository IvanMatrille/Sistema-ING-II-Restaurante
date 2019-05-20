function lista(busqueda) {
  $.ajax({
    type: "GET",
    url: "BD/Plato/listaPlatos.php",
    data: "busqueda="+busqueda,
    success: function (response) {
      let datos = JSON.parse(response);
      let row = "";

      for (const i in datos) {
        row += "<tr>";
        row += "<td>" + datos[i].Id + "</td>";
        row += "<td>" + datos[i].Nombre + "</td>";
        row += "<td> " + datos[i].Ubicacion + "</td>";
        row += "<td> " + datos[i].Cantidad + "</td>";
        row += "<td> " + datos[i].Precio + "</td>";
        row +=
          '<td> <button class="btn btn-success btn-sm" onclick="detalle(' +
          datos[i].Id +
          ')" data-toggle="modal" data-target="#modalRegistro">Editar</button> </td>';
      }

      $("#tbodyPlatos").html(row);
    }
  });
}
function detalle(id) {
  $.ajax({
    type: "GET",
    url: "BD/Plato/detallePlato.php",
    data: "id=" + id,
    success: function (response) {
      let datos = JSON.parse(response);
      $("#txtID").val(datos[0].Id);
      $("#txtNombre").val(datos[0].Nombre),
      $("#txtCantidad").val(datos[0].Cantidad),
      $("#txtUbicacion").val(datos[0].Ubicacion),
      $("#txtITBIS").val(datos[0].ITBIS);
      $("#txtCosto").val(datos[0].Costo);
      $("#txtPrecio").val(datos[0].Precio);
    }
  });
}
function registrar() {
  let datos = {
    Nombre: $("#txtNombre").val(),
    Cantidad: $("#txtCantidad").val(),
    Ubicacion: $("#txtUbicacion").val(),
    ITBIS: $("#txtITBIS").val(),
    Costo: $("#txtCosto").val(),
    Precio: $("#txtPrecio").val()
  };

  $.ajax({
    type: "POST",
    url: "BD/Plato/registroPlato.php",
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
    Cantidad: $("#txtCantidad").val(),
    Ubicacion: $("#txtUbicacion").val(),
    ITBIS: $("#txtITBIS").val(),
    Costo: $("#txtCosto").val(),
    Precio: $("#txtPrecio").val()
  };

  $.ajax({
    type: "POST",
    url: "BD/Plato/actualizarPlato.php",
    data: datos,
    success: function (response) {
      alert(response);
      $('#modalRegistro').modal('hide');
      lista($('#busqueda').val());
    }
  });
}

$(() => {
  lista($('#busqueda').val());

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
