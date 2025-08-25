<?php
require("class.phpmailer.php");

function check_input($data)
 {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }
 
$mail = new PHPMailer();

//$mail->IsSMTP();                                   // send via SMTP
$mail->Host     = "mail.cyprus-datacenter.com"; // SMTP servers
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->Username = "info@nefes21.com";  // SMTP username
$mail->Password = "65Efb9?e8"; // SMTP password
$mail->Port = 587; 
$mail->SMTPSecure = 'tls'; 
$mail->From     = "info@nefes21.com"; // same with smtp username
$mail->FromName = "Nefes21.Com İletişim";
$mail->AddAddress("destek@nefes21.online","BG Destek");
$mail->AddAddress("bgapp@nektaryazilim.com","BG Destek");

$mail->CharSet = 'utf-8';
$mail->Subject  =  $_POST['subject'];

        $name      =    check_input($_POST['name']);
        $email    =    check_input($_POST['email']);
        $phone    =    check_input($_POST['phone']);
        $subject  =    check_input($_POST['subject']);
        $message =    check_input($_POST['message']);
        
$body  = "BG WEB İletişim Formu \n"."----------------------"."\n\n";
$body .= "Gönderen Adı     : ".$name."\n";
$body .= "E-posta Adresi   : ".$email."\n";
$body .= "Telefonu         : ".$phone."\n";
$body .= "Konu             : ".$subject."\n";
$body .= "Mesaj            : ".$message."\n";

$mail->Body = $body;
if ($email && $subject && $message) {

    if ($subject == 'bireysel_danismanlik' || $subject == 'bireysel danismanlik'){
        $mail->AddAddress("info@nefes21.cominfo@nefes21.com");
    }
	    if ($subject == 'bireysel_danismanlik'){
        $mail->AddAddress("info@nefes21.com");
    }
    if ($subject == 'nefes_koclugu'){
        $mail->AddAddress("info@nefes21.com");
    }
    if ($subject == 'yasam_koclugu'){
        $mail->AddAddress("info@nefes21.com");
    }
	    if ($subject == 'yasam_koclugu'){
        $mail->AddAddress("info@nefes21.com");
    }
    if ($subject == 'urunler_etkinlikler'){
        $mail->AddAddress("info@nefes21.com");
    }

    if(!$mail->Send())
    {
        echo "Mesaj Gönderilemedi <p>";
        echo "Mailer Error: " . $mail->ErrorInfo;
        exit;
    }

    echo '<h1 style="text-align: center;">Mesajınız Başarıyla İletilmiştir.</h1><meta http-equiv="refresh" content="3;URL=https://nefes21.com/">
';
}
else echo '<h1 style="text-align: center;">Boş Mesaj G&ouml;nderemezsiniz.</h1>';

?>