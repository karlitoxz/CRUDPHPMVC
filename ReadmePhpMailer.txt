En el formulario html:

<form action="dondeseenvian.php" method="POST" enctype="multipart/form-data">
      Enviar estos ficheros:<br />
      <input multiple="true" name="archivos[]" type="file" /><br />
      <input type="submit" value="Enviar ficheros" />
    </form>

----------------------------------------------------------------------------------

<?php 
$archivos = $_FILES['archivos'];
$nombre_archivos = $archivos['name'];
$ruta_archivos = $archivos['tmp_name'];

require 'mailsend/PHPMailerAutoload.php';

    $mail = new PHPMailer;

    $mail->isSMTP();
    //for PHP 7--
	 $mail->SMTPOptions = array(
    'ssl' => array(
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => true)
    );
    //for PHP 7--
    $mail->Host = 'servidor@smtp.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'usuario@smtp.com'; 
    $mail->Password = 'clavesmtp';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('remitente@correo.com', 'Nombre remitente');
    $mail->addAddress('destinatario@correo.com');

    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Subject = 'Asunto archivos adjuntos';
    $mail->Body = "Adjuntos se encuentran los archivos";
    $i = 0;
    foreach ($ruta_archivos as $rutas_archivos) {
        $mail->AddAttachment($rutas_archivos,$nombre_archivos[$i]);
        $i++;
    }

    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
 ?>

 ------------------------------Servidor redundante-----------
 
$gloMailHost = "192.168.0.1"
$gloMailHostRedundant = "192.168.0.2"

 $mail->Host = "$gloMailHost;$gloMailHostRedundant";