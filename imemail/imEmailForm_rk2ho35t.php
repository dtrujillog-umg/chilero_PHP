<?php
if(substr(basename($_SERVER['PHP_SELF']), 0, 11) == "imEmailForm") {	
	include '../res/x5engine.php';
	$form = new ImForm();
	$form->setField('Contacto', 'Contacto', '', true);
	$form->setField('Nombre completo', $_POST['nombrecompleto'], '', false);
	$form->setField('Celular', $_POST['celular'], '', false);
	$form->setField('Residencial', $_POST['celular'], '', false);
	$form->setField('Correo electrónico', $_POST['email'], '', false);
	$form->setField('Tema', $_POST['tipoconsulta'], '', true);
	$form->setField('Tipo de contacto', $_POST['tipoconsulta'], '', false);
	$form->setField('Descripción', $_POST['descripcion'], '', false);
	// $form->setField('Adjuntos', 'Documentos adjuntos', '', true);
	$fileResult = $form->setFile('Evidencias', $_FILES['adjunto'], $imSettings['general']['public_folder'], '', 'jpg, png, pdf, doc, docx, xls, xlsx');
	if ($fileResult == -1) { die(imPrintError('Cannot send file: Evidencias')); }
	if ($fileResult < -1) { die(imPrintError('"Evidencias" formato incorrecto.')); }

	if(@$_POST['action'] != 'check_answer') {
	
		// if(!isset($_POST['imJsCheck']) || $_POST['imJsCheck'] != 'jsactive' || (isset($_POST['imSpProt']) && $_POST['imSpProt'] != ""))
		// 	echo 'estoy en el check';
		// 	die(imPrintJsError());

		
		$form->mailToOwner($_POST['email'] != "" ? $_POST['email'] : 'sugerencias@emfama.com', 'sugerencias@emfama.com', 'Contacto por medio de Página WEB', 'Buen día, 
		
	Un cliente se ha comunicado con nostros por medio de la Página Web', true);
		$form->mailToCustomer('sugerencias@emfama.com', $_POST['email'], 'Confirmación de recibido de Contacto', 'Buen día,

		
	Hemos recibido su Contacto.

	Gracias de antemano por el tiempo que se ha tomado para realizar dicho contacto.

	Nos estaremos comunicando con usted lo más pronto posible.

	Si su contacto es urgente puede utilizar nuestros PBX:
 	7926 1377
 	7926 0520

	Saludos.', true);
		@header('Location: ../index.html');		
		exit();
	} else {
		echo 'acá';
		echo $form->checkAnswer(@$_POST['id'], @$_POST['answer']) ? 1 : 0;
	}
}

// End of file