<?php

namespace Class;

use PHPMailer\PHPMailer\PHPMailer;

class Email {

  public $email;
  public $name;
  public $token;

  public function __construct($email, $name, $token){
    $this->email = $email;
    $this->name = $name;
    $this->token = $token;

  }

  public function sendEmailConfirmation(){

    $phpmailer = new PHPMailer();
    $phpmailer->isSMTP();
    $phpmailer->Host = 'smtp.mailtrap.io';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 2525;
    $phpmailer->Username = 'c0fc8a3792c156';
    $phpmailer->Password = '7daf86af9dd750';

    $phpmailer->setFrom('cuentas@appsalon.com');
    $phpmailer->addAddress('cuentas@appsalon.com', $this->name);
    $phpmailer->Subject = 'Confirma tu cuenta';

    $phpmailer->isHTML(true);
    $phpmailer->CharSet = 'UTF-8';
  
    $body = "<html>";
    $body .= "<h1>Gracias por registrarte</h1>";
    $body .= "<p>Por favor haz click en el siguiente enlace para confirmar tu cuenta</p>";
    $body .= "<a href='http://localhost:3000/verify?token=" . $this->token . "'>Confirmar cuenta</a>";
    $body .= "</html>";

    $phpmailer->Body = $body;
    $phpmailer->send();
  }

  public function sendEmailInstructions(){

    $phpmailer = new PHPMailer();
    $phpmailer->isSMTP();
    $phpmailer->Host = 'smtp.mailtrap.io';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 2525;
    $phpmailer->Username = 'c0fc8a3792c156';
    $phpmailer->Password = '7daf86af9dd750';

    $phpmailer->setFrom('cuentas@appsalon.com');
    $phpmailer->addAddress('cuentas@appsalon.com', $this->name);
    $phpmailer->Subject = 'Recuperar contraseña';

    $phpmailer->isHTML(true);
    $phpmailer->CharSet = 'UTF-8';
  
    $body = "<html>";
    $body .= "<h1>Hola " . $this->name . "</h1>";
    $body .= "<p>Por favor haz click en el siguiente enlace para recuperar tu contraseña</p>";
    $body .= "<a href='http://localhost:3000/recover-password?token=" . $this->token . "'>Recuperar contraseña</a>";
    $body .= "</html>";

    $phpmailer->Body = $body;
    $phpmailer->send();

  }
}

?>