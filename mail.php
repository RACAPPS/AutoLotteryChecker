<?php
	$premio = $_GET["premio"];
	$cabecera = "From: Mail Automático<loteria@racapps.com>\r\n";
	$cabecera .= "MIME-Version: 1.0\r\n";
	$cabecera .= "Content-Type: text/html; charset=UTF-8\r\n";
	$mensaje = "<html><body>".$premio."<body/><html/>";

	if(mail("YOUREMAIL@EXAMPLE.COM", "Premio de Lotería", $mensaje, $cabecera)){
		header("Location: index.php?mail=success");
		exit();
	}else{
		header("Location: index.php?mail=fail");
		exit();
	}
?>