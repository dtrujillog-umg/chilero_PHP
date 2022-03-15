<?php 
function esCorreoValido($correo){
    return (false !== filter_var($correo, FILTER_VALIDATE_EMAIL));
}
?>