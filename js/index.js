//SELECCIONAMOS TODOS LOS OBJETOS CON EL NOMBRE DE CLASE 'IMAGEN'
var imagen = document.getElementsByClassName("imagen");

window.onload = function()
{
    SetDocumentItemsStyle();
}

//METODO QUE SETEA EL ESTILO A LAS IMAGENES DEL CAROUSEL
function SetDocumentItemsStyle() {
    for (let index = 0; index < imagen.length; index++) {
        imagen[index].style.height = "400px";
        imagen[index].style.borderRadius = "10px";
    }
}

