<?php 
namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email{

    public $email;
    public $nombre;
    public $token;

    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion(){
        // Crear el objeto de email
        //datos de la app phpmailer
        $phpmailer = new PHPMailer();
        $phpmailer->isSMTP();
        $phpmailer->Host = 'smtp.mailtrap.io';
        $phpmailer->SMTPAuth = true;
        $phpmailer->Port = 2525;
        $phpmailer->Username = 'a8656a990c1a78';
        $phpmailer->Password = 'a432241b404b8e';

        $phpmailer->setFrom('cuentas@COLPOMED.com');
        $phpmailer->addAddress('cuentas@COLPOMED.com','Colpomed.com');
        $phpmailer->Subject = 'Confirma tu cuenta';

        //Set Html
        $phpmailer->isHTML(TRUE);
        $phpmailer->CharSet = 'UTF-8';
        
        $contenido = "<html>";
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has creado tu cuenta en COLPOMED, solo debes confirmarla presionando en el siguiente enlace: </p>";
        $contenido .= "<p>Presiona aquí: <a href='http://localhost:3000/confirmar-cuenta?token=" . $this->token . "'>Confirmar Cuenta</a></p>";
        $contenido .= "<p>Si usted no solicitó esta cuenta, puedes ignorar el mensaje</p>";
        $contenido .= "</html>";

        $phpmailer->Body = $contenido;
        $phpmailer->send();
    }

    public function enviarInstrucciones(){
        // Crear el objeto de email
        //datos de la app phpmailer
        $phpmailer = new PHPMailer();
        $phpmailer->isSMTP();
        $phpmailer->Host = 'smtp.mailtrap.io';
        $phpmailer->SMTPAuth = true;
        $phpmailer->Port = 2525;
        $phpmailer->Username = 'a8656a990c1a78';
        $phpmailer->Password = 'a432241b404b8e';

        $phpmailer->setFrom('cuentas@COLPOMED.com');
        $phpmailer->addAddress('cuentas@COLPOMED.com','Colpomed.com');
        $phpmailer->Subject = 'Reestablece tu contraseña';

        //Set Html
        $phpmailer->isHTML(TRUE);
        $phpmailer->CharSet = 'UTF-8';
        
        $contenido = "<html>";
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has solicitado reestablecer su contraseña, sigue el siguiente enlace para configurar su nueva contraseña: </p>";
        $contenido .= "<p>Presione aquí: <a href='http://localhost:3000/recuperar?token=" . $this->token . "'>Reestablezca su contraseña</a></p>";
        $contenido .= "<p>Si usted no solicitó esta cuenta, puedes ignorar el mensaje</p>";
        $contenido .= "</html>";

        $phpmailer->Body = $contenido;
        $phpmailer->send();
    }

}