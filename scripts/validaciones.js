//valida si se está ingresando números
$(function() {
    $(".validar").keydown(function(event) {
        //alert(event.keyCode);
        if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105) && event.keyCode !== 190 && event.keyCode !== 110 && event.keyCode !== 8 && event.keyCode !== 9) {
            return false;
        }

    });
});
$(function() {
    $(".nomodificar").keydown(function(event) {
        if (event.keyCode > 0) {
            return false;
        }

    });
});

//galeria por carpeta
$(function() {
    var selectedClass = "";
    $(".filter").click(function() {
        selectedClass = $(this).attr("data-rel");
        $("#gallery").fadeTo(100, 0.1);
        $("#gallery div").not("." + selectedClass).fadeOut().removeClass('animation');
        setTimeout(function() {
            $("." + selectedClass).fadeIn().addClass('animation');
            $("#gallery").fadeTo(300, 1);
        }, 300);
    });
});

$(function() {
    $('.mayuscula').keyup(function() {
        this.value = this.value.toUpperCase();
    });
});

$(function(){
    $('.minuscula').keyup(function(){
        this.value = this.value.toLowerCase();
    });
});

//carga imagenes en ventana modal
// $(function(imagen) {
//     $(".boton-abrir").click(function() {
//         $(".modal").fadeIn("300");
//     });
//     $(".boton-cerrar").click(function() {

//         $(".modal").fadeOut("300");

//     });
// });

//tooltip para ayuda a usuario
$(function() {
    $(document).ready(function() {
        $('#menu').tooltip();
    });
});

$(function() {
    $(document).ready(function() {
        $('#boton').tooltip();
    });
});
