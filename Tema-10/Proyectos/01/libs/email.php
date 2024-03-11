<?php

function enviarEmail($nombre, $destinatario, $asunto, $mensaje) {
    try {
        $mail = new PHPMailer(true);
        $mail->CharSet = "UTF-8";
        $mail->Encoding = "quoted-printable";
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;

        /*
                USUARIO y PASS se reemplazan por tu usuario y pass
            */
        $mail->Username = USUARIO;
        $mail->Password = PASS;

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        /* 
                Configurar destinatario, remitente, asunto y mensaje
            */
        $remitente = USUARIO;

        $mail->setFrom($remitente, $nombre);
        $mail->addAddress($destinatario);
        $mail->addReplyTo($remitente, $nombre);

        $mail->isHTML(true);
        $mail->Subject = $asunto;
        $mail->Body = $mensaje;

        /*
                Una vez hecho todo, se envía el email
            */
        $mail->send();
    }
    /*
        Si ocurre un error al enviar el email, seguiremos en
        el formulario, para poder intentarlo otra vez sin tener
        que introducir todos los datos manualmente
    */ catch (Exception $ex) {
        $_SESSION['error'] = 'Error al enviar el mensaje: ' . $ex->getMessage();
        exit();
    }
}
