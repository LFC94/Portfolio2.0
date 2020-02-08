<?php


 
$nome = addslashes($_POST['name']);
$email = addslashes($_POST['email']);
$mensagem = addslashes($_POST['message']);

 
 
$to = "contatofreelancerweb@gmail.com";
$subject = "Portfólio - Contato";
$body = "<strong>Nome: </strong>".$nome;
$body .= "<br><strong>Email: </strong>".$email;
$body .= "<br><strong>Mensagem: </strong>".$mensagem;
$headers =  "Content-Type:text/html; charset=UTF-8\n";
  $headers .= "From:  gmail.com.br<contatofreelancerweb@gmail.com>\n"; //Vai ser //mostrado que  o email partiu deste email e seguido do nome
  $headers .= "X-Sender:  <contatofreelancerweb@gmail.com>\n"; //email do servidor //que enviou
  $headers .= "X-Mailer: PHP  v".phpversion()."\n";
  $headers .= "X-IP:  ".$_SERVER['REMOTE_ADDR']."\n";
  $headers .= "Return-Path:  <contatofreelancerweb@gmail.com>\n"; //caso a msg //seja respondida vai para  este email.
 
if(mail($to,$subject,$body,$headers)){
   
    echo("Email enviado com sucesso!");

}else{
    echo("O Email não pode ser enviado");
}


?>