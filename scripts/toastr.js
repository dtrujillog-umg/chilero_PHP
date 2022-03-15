Command: toastr["success"]("Correo enviado correctamente...", "Correcto")

toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-full-width",
  "preventDuplicates": true,
  "onclick": null,
  "showDuration": "1000",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "5000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
var showToastrs = false;

function toastrsSuccess() {
  if (!showToastrs) {
    // toastr.error('Estamos bajo ataque DDoS', 'Error Critico!');
    toastr.success('Se guardaron los cambios satisfactoriamente', 'Todo en orden');
    // toastr.warning('La latencia del server esta aumentando.', 'Alerta!');
  } else {
    toastr.error('no se puede!\'t.', 'Otro error crítico');
  }
}
function toastrsError() {
  if (!showToastrs) {
    // toastr.error('Estamos bajo ataque DDoS', 'Error Critico!');
    toastr.error('Error', 'El correo electrónico parace no estar correcto');
    // toastr.warning('La latencia del server esta aumentando.', 'Alerta!');
  } else {
    toastr.error('no se puede!\'t.', 'Otro error crítico');
  }
}

// Definimos los callback cuando el TOAST le da un fade in/out:
toastr.options.onFadeIn = function() {
  showToastrs = true;
};
toastr.options.onFadeOut = function() {
  showToastrs = false;
};

$(function() {
  var correo = document.getElementById("correosolicitante").value;
  $("#btn").on("click", function() {
    // show toastrs :)
    //if (validarEmail(correo)) {
      toastrsSuccess();  
    //}
    //else{
      //toastrsError();
    //}    
  });
});

// function validarEmail(valor) {
//   if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3,4})+$/.test(valor)){
//     return true;
//   } else {
//     return false;
//   }
// }