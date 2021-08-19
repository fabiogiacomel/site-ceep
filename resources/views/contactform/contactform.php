<?php
	header('Content-Type: text/html; charset=UTF-8');
	if ($_SERVER['REQUEST_METHOD']=='POST') {
	 	$name		= $_POST['name'];
	 	$email		= $_POST['email'];
	 	$assunto	= $_POST['subject'];
	 	$mensagem	= $_POST['message'];
	}else{
		return "Erro ao enviar email";
	}

	date_default_timezone_set('America/Sao_Paulo');
	use PHPMailer\PHPMailer\PHPMailer;
	require '../vendor/autoload.php';

	$mail = new PHPMailer;
	$mail->CharSet = 'UTF-8';

	//Tell PHPMailer to use SMTP
	$mail->isSMTP();
	
	//Enable SMTP debugging
	// 0 = off (for production use)
	// 1 = client messages
	// 2 = client and server messages
	$mail->SMTPDebug = 0;

	//Set the hostname of the mail server
	$mail->Host = 'br330.hostgator.com.br';

	//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
	$mail->Port = 465;

	//Set the encryption system to use - ssl (deprecated) or tls
	$mail->SMTPSecure = 'ssl';

	//Whether to use SMTP authentication
	$mail->SMTPAuth = true;

	//Username to use for SMTP authentication - use full email address for gmail
	$mail->Username = "admin@ceepcasccavel.com.br";

	//Password to use for SMTP authentication
	$mail->Password = "fwpmicsc";

	$mail->SetFrom($email, 'Enviado por ' . $email);
	$mail->addAddress('admin@ceepcasccavel.com.br','admin@ceepcasccavel.com.br');
	$mail->Subject=("Contato site do CEEP");

	$mensagemHTML = "<h1>Email gerado pelo site ceepcascavel.com.br</h1>".
									"<p><strong>Nome:</strong>$name</p>".
									"<p><strong>E-Mail:</strong>$email</p>".
									"<p><strong>Assunto:</strong>$assunto</p>".
									"<p><strong>Mensagem:</strong>$mensagem</p>";

	$mail->msgHTML($mensagemHTML);
	$mail->Body 		= $mensagemHTML;
	$mail->AltBody 	= $mensagemHTML;

	if(!$mail->send()) {
		echo 'Contato não pode ser enviado.';
		// echo 'Erro: ' . $mail->ErrorInfo;
	} else {
		echo 'OK';
	}
?>