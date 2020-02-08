<?php

use PHPMailer\PHPMailer\PHPMailer;

try {
  include_once "./PHPMailer/src/Exception.php";
  include_once "./PHPMailer/src/PHPMailer.php";
  include_once "./PHPMailer/src/SMTP.php";
  include_once "./config.php";

  $nome = addslashes($_POST['name']);
  $email = addslashes($_POST['email']);
  $mensagem = addslashes($_POST['message']);

  $mail = new PHPMailer();

  //Tell PHPMailer to use SMTP
  $mail->isSMTP();

  //Enable SMTP debugging
  // 0 = off (for production use)
  // 1 = client messages
  // 2 = client and server messages
  $mail->SMTPDebug = 0;

  //Ask for HTML-friendly debug output
  $mail->Debugoutput = 'html';

  //Set the hostname of the mail server
  $mail->Host = 'smtp.gmail.com';

  $mail->SMTPOptions = array(
    'ssl' => array(
      'verify_peer' => false,
      'verify_peer_name' => false,
      'allow_self_signed' => true
    )
  );

  //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
  $mail->Port = 587;

  //Set the encryption system to use - ssl (deprecated) or tls
  $mail->SMTPSecure = 'tls';

  //Whether to use SMTP authentication
  $mail->SMTPAuth = true;

  //Username to use for SMTP authentication - use full email address for gmail
  $mail->Username = Config::USERNAME_MAIL;

  //Password to use for SMTP authentication
  $mail->Password = Config::PASSWORD_MAIL;

  //Set who the message is to be sent from
  $mail->setFrom(Config::NOREPLAY_MAIL, 'Contato Freelancer Web');

  //Set who the message is to be sent to
  $mail->addAddress(Config::SENT_MAIL, 'Contato Freelancer Web');

  $subject = "Portfólio - Contato";
  $body = "<strong>Nome: </strong>" . $nome;
  $body .= "<br><strong>Email: </strong>" . $email;
  $body .= "<br><strong>Mensagem: </strong>" . $mensagem;

  $mail->Subject = $subject;
  $mail->Body = $body;
  $mail->AltBody = $body;


  //send the message, check for errors
  if (!$mail->send()) {
    throw new Exception("Mailer Error: " . $mail->ErrorInfo, 1);
  }
  http_response_code(200);
  print("Email enviado com sucesso");
} catch (Exception $e) {
  http_response_code(400);
  print_r("<b>Erro ao enviar o email</b><br><br>" . $e->getMessage());
}
