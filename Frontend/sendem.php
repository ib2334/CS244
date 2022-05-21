<?php
    session_start();
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require_once "../vendor/autoload.php";

    $email=$_SESSION['email'];
    $mail=new PHPMailer(true);
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "ssl";
    $mail->Host = "smtp.gmail.com";
    $mail->Port = '587';
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    $mail->Username="ziad.shaker0@gmail.com";
    $mail->Password="zizo2002";
    $mail->From = "ziad.shaker0@gmail.com";
    $mail->FromName = "Ziad Fehr";
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = "Subject Text";
    $mail->Body = "<H3>Bienvenido! Esto Funciona!</H3>";
    try {
        $mail->send();
        echo "Message has been sent successfully";
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
?>
<br>
csasc