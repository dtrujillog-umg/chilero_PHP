<?php

/*
|-------------------------------
|	GENERAL SETTINGS
|-------------------------------
*/

$imSettings['general'] = array(
	'url' => 'http://www.farmaciamoderna.com.gt/',
	'homepage_url' => 'http://www.farmaciamoderna.com.gt/index.html',
	'icon' => 'http://www.farmaciamoderna.com.gt/favImage.png',
	'version' => '13.0.1.16',
	'sitename' => 'Emfama S.A.',
	'public_folder' => '',
	'salt' => '49h9035520pn04y8e45q85g56nbchj49t5f3cn7ld43kljuj7rd77',
	'use_common_email_sender_address' => false,
	'common_email_sender_addres' => ''
);


$imSettings['admin'] = array(
	'notification_public_key' => 'b1e3232b8378bdbf',
	'notification_private_key' => '197c95fb1048f8de',
	'enable_manager_notifications' => false,
	'theme' => 'orange'
);


/*
|--------------------------------------------------------------------------------------
|	DATABASES SETTINGS
|--------------------------------------------------------------------------------------
*/

$imSettings['databases'] = array();

/*
|-------------------------------------------------------------------------------------------
|	GUESTBOOK SETTINGS
|-------------------------------------------------------------------------------------------
*/

$imSettings['guestbooks'] = array();
/*
|-------------------------------------------------------------------------------------------
|	Dynamic Objects SETTINGS
|-------------------------------------------------------------------------------------------
*/

$imSettings['dynamicobjects'] = array(
	'template' => array(
),
	'pages' => array(

	)
);

/*
|-------------------------------
|	EMAIL SETTINGS
|-------------------------------
*/

$ImMailer->emailType = 'phpmailer';
$ImMailer->exposeWsx5 = true;
$ImMailer->header = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">' . "\n" . '<html>' . "\n" . '<head>' . "\n" . '<meta http-equiv="content-type" content="text/html; charset=utf-8">' . "\n" . '<meta name="generator" content="Incomedia WebSite X5 v13 - www.websitex5.com">' . "\n" . '</head>' . "\n" . '<body bgcolor="#808080" style="background-color: #808080;">' . "\n\t" . '<table border="0" cellpadding="0" align="center" cellspacing="0" style="padding: 0; margin: 0 auto; width: 700px;">' . "\n\t" . '<tr><td id="imEmailHeader" style="text-align: left; width: 700px;border-top-style: solid; border-top-color: #000000; border-top-width: 1px; border-left-style: solid; border-left-color: #000000; border-left-width: 1px; border-right-style: solid; border-right-color: #000000; border-right-width: 1px; border-bottom-style: none; border-bottom-color: transparent; border-bottom-width: 0px; border-bottom: none; background-color: #FFFFFF;" width="700px"><img src="http://www.farmaciamoderna.com.gt/images/logo_moderna_webMovil.jpg" style="width: 100px; border: none;" width="100px"></td></tr>' . "\n\t" . '<tr><td id="imEmailContent" style="min-height: 300px; padding: 10px; font: normal normal normal 9pt \'Tahoma\'; color: #000000; background-color: #FFFFFF; text-align: left; text-decoration: none;  width: 700px;border-style: solid; border-color: #000000; border-top-width: 0px; border-top: none; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px;background-color: #FFFFFF" width="700px">' . "\n\t\t";
$ImMailer->footer = "\n\t" . '</td></tr>' . "\n\t" . '</table>' . "\n" . '<table width="100%"><tr><td id="imEmailFooter" style="font: normal normal normal 7pt \'Tahoma\'; color: #FFFFFF; background-color: transparent; text-align: center; text-decoration: none;  padding: 10px; margin-top: 5px;background-color: transparent">' . "\n\t\t" . 'Este e-mail incluye información exclusiva para el destinatario mencionado anteriormente.<br>Si lo ha recibido por error, notifíqueselo inmediatamente al remitente y destrúyalo sin copiarlo.' . "\n\t" . '</td></tr></table>' . "\n\t" . '</body>' . "\n" . '</html>';
$ImMailer->bodyBackground = '#FFFFFF';
$ImMailer->bodyBackgroundEven = '#FFFFFF';
$ImMailer->bodyBackgroundOdd = '#F0F0F0';
$ImMailer->bodyBackgroundBorder = '#CDCDCD';
$ImMailer->bodySeparatorBorderColor = '#000000';
$ImMailer->emailBackground = '#808080';
$ImMailer->emailContentStyle = 'font: normal normal normal 9pt \'Tahoma\'; color: #000000; background-color: #FFFFFF; text-align: left; text-decoration: none; ';
$ImMailer->emailContentFontFamily = 'font-family: Tahoma;';
ImTopic::$captcha_code = "		<div class=\"x5captcha-wrap\">
			<label>Palabra de control:</label><br />
			<input type=\"text\" class=\"imCpt\" name=\"imCpt\" maxlength=\"5\" />
		</div>
";

// End of file x5settings.php