function lista() {
  $.ajax({
    type: "GET",
    url: "BD/Producto/listaProductos.php",
    success: function(response) {
      let datos = JSON.parse(response);
      let row = "";

      for (const i in datos) {
        row += "<tr>";
        row += "<td> </td>";
        row += "<td>" + datos[i].Id + "</td>";
        row += "<td>" + datos[i].Nombre + "</td>";
        row += "<td> " + datos[i].Referencia + "</td>";
        row += "<td> " + datos[i].Categoria + "</td>";
        row += "<td> " + datos[i].Precio + "</td>";
        row +=
          '<td> <button class="btn btn-success" onclick="detalle(' +
          datos[i].Id +
          ')" data-toggle="modal" data-target="#modalRegistro">Editar</button> </td>';
      }

      $("#tbodyProductos").html(row);
    }
  });
}
function detalle(id) {
  $.ajax({
    type: "GET",
    url: "BD/Producto/detalleProducto.php",
    data: "id=" + id,
    success: function(response) {
        let datos = JSON.parse(response);
        $("#txtID").val(datos[0].Id);
        $("#txtNombre").val(datos[0].Nombre),
        $("#txtReferencia").val(datos[0].Referencia),
        $("#txtCantidadInicial").val(datos[0].CantidadInicial),
        $("#txtCategoria").val(datos[0].Categoria),
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
      Referencia: $("#txtReferencia").val(),
      CantidadInicial: $("#txtCantidadInicial").val(),
      Categoria: $("#txtCategoria").val(),
      Ubicacion: $("#txtUbicacion").val(),
      ITBIS: $("#txtITBIS").val(),
      Costo: $("#txtCosto").val(),
      Precio: $("#txtPrecio").val()
    };
  
    $.ajax({
      type: "POST",
      url: "BD/Producto/registroProducto.php",
      data: datos,
      success: function(response) {
        alert(response);
        $('#modalRegistro').modal('hide');
        lista();
      }
    });
  }
  function actualizar() {
    let datos = {
      Id: $('#txtID').val(),
      Nombre: $("#txtNombre").val(),
      Referencia: $("#txtReferencia").val(),
      CantidadInicial: $("#txtCantidadInicial").val(),
      Categoria: $("#txtCategoria").val(),
      Ubicacion: $("#txtUbicacion").val(),
      ITBIS: $("#txtITBIS").val(),
      Costo: $("#txtCosto").val(),
      Precio: $("#txtPrecio").val()
    };
  
    $.ajax({
      type: "POST",
      url: "BD/Producto/actualizarProducto.php",
      data: datos,
      success: function(response) {
        alert(response);
        $('#modalRegistro').modal('hide');
        lista();
      }
    });
  }

$(() => {
  lista();

  $("#btnNuevo").click(function(e) {
    $("#frmRegistro").trigger("reset");
    $('#txtID').val(0);
  });

  $("#frmRegistro").submit(function(e) {
    e.preventDefault();
    let id = $('#txtID').val();

    if(id == 0) {
      registrar();
    } else {
      actualizar();
    }
  });
});
