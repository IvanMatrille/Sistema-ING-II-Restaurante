var tabla = document.getElementById('contenedorTabla');

var boton =  document.getElementById('btnEditar');

var table = document.getElementById('table');
                
for(var i = 1; i < table.rows.length; i++)
{
    table.rows[i].onclick = function()
    {
         document.getElementById("txtNombre").value = this.cells[1].innerHTML;
         document.getElementById("txtApellido").value = this.cells[2].innerHTML;
         document.getElementById("txtRol").value = this.cells[3].innerHTML;
         document.getElementById("txtRol").value = this.cells[4].innerHTML;
    };
}


$('#tablaUsuario').DataTable({
"language": {
    "lengthMenu": "Mostrar _MENU_ registros por página",
    "zeroRecords": "Lo Sentimos, no existen registros con los datos especificados",
    "info": "Mostrando página _PAGE_ de _PAGES_",
    "infoEmpty": "No hay registros disponibles",
    "infoFiltered": "(Filtrados de un total de _MAX_ registros)",
    "search": "Buscar:",
    "paginate":{
        "next": "Siguiente",
        "previous": "Anterior"
    }
}
});