<?php
include '../res/x5engine.php';
include "../imemail/validarCorreo.php";
if(substr(basename($_SERVER['PHP_SELF']), 0, 11) == "imEmailForm") {

	if($_POST['correosolicitante']!="" || esCorreoValido($_POST['correosolicitante'])){
		
		$form = new ImForm();	
		$form->setField('Datos del solicitante', 'Datos del solicitante','',true);
		$form->setField('No. Ticket', $_POST['numeroticket'],'',false);
		$form->setField('Fecha', $_POST['fecha'], '', false);
		$form->setField('Email solicitante', $_POST['correosolicitante'], '', false);
		$form->setField('Sucursal o Depto', $_POST['sucursal'], '', false);
			

		$form->setField('Datos del documento','Datos del documento','',true);	
		$form->setField('Acción a realizar', $_POST['accion'], '', false);
		$form->setField('Serie', $_POST['seriedocumento'], '', false);
		$form->setField('Número', $_POST['numerodocumento'], '', false);
		$form->setField('Tipo de documento', $_POST['documentos'], '', false);
		$form->setField('Descripción del problema', $_POST['descripcion'], '', false);	
		
		$datomodificar = $_POST['datomodificar'];
		$i_datomodificar = count($datomodificar);
		
		if ($i_datomodificar > 0) {
			$form->setField('Datos a modificar:','datomodificar','',true);	
			foreach ($datomodificar as $key => $value) {
				$form->setField('Dato ', $value, '', false);			
			}
		}	
		
		$form->setField('Documentos adjuntos','Documentos adjuntos',true);
		$form->setField('Adjuntos', $_POST['adjunto'], '', false);
		$fileResult = $form->setFile('Evidencia', $_FILES['adjunto'], $imSettings['general']['public_folder'], '', 'jpg, png');
		if ($fileResult == -1) { die(imPrintError('Cannot send file: Curriculum Vitae')); }
		if ($fileResult < -1) { die(imPrintError('"Curriculum Vitae" formato incorrecto.')); }

		if(@$_POST['action'] != 'check_answer') {
			// $form->mailToOwner($_POST['emailencargado'] != "" ? $_POST['emailencargado'] : 'soporte@emfama.com'
			$form->mailToOwner($_POST['correosolicitante']
			, 'documentos@emfama.com'
			,'Ticket No.: '.$_POST['numeroticket'].' '. $_POST['accion'] .' '. $_POST['documentos']. ' Serie: '. $_POST['seriedocumento'] . ' Número: '. $_POST['numerodocumento']   
			, 'Solicitud de ' . $_POST['sucursal']
			, true);
			$form->mailToCustomer('documentos@emfama.com', $_POST['correosolicitante'], 'Ticket No.: '.$_POST['numeroticket']. ' '. $_POST['accion'] .' '. $_POST['documentos']. ' Serie: '. $_POST['seriedocumento'] . ' Número: '. $_POST['numerodocumento'] , 
			'Buen día, 
			Hemos recibido su solicitud.
			Su número de ticket es: ' . $_POST['numeroticket'] .' 
			Favor estar al pendiente'
			, true);

			$y = date("Y");
			$m = date("m");
			$rutaticket = '../ticket/'.$y.$m.'.txt';
			$file = fopen($rutaticket,"a+") or die("Ser produjó un error al intentar leer el archivo");
			fwrite($file, PHP_EOL . $_POST['numeroticket']);
			fclose($file);	


			@header('Location: ../correcto.php');
			exit();
		} 
		else 	{
			echo $form->checkAnswer(@$_POST['id'], @$_POST['answer']) ? 1 : 0;
		}
	}
	else{
		@header('Location: ../error.php');
		exit();
	}
}
else {
	$mensaje = "Error";
}


// End of file