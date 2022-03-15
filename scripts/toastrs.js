function toastrs() {
  if (!showToastrs) {
    // toastr.error('Estamos bajo ataque DDoS', 'Error Critico!');
    toastr.success('Se guardaron los cambios satisfactoriamente', 'Todo en orden');
    // toastr.warning('La latencia del server esta aumentando.', 'Alerta!');
  } else {
    toastr.error('no se puede!\'t.', 'Otro error crítico');
  }
}
