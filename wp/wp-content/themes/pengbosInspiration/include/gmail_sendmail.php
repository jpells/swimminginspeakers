<?php
    include_once ('../../../../wp-includes/class-phpmailer.php'); 		

    include_once ('../../../../wp-includes/class-smtp.php'); 
    
    include_once("config.php");

    //we need to get our variables first
    
    
    $str_ind_ip = $_SERVER['REMOTE_ADDR'];
    foreach ($_POST as $key=>$value) {
            $$key = $value;
    }

$name = $_POST['visitor'];
$email = $_POST['visitormail'];
$message = $_POST['notes'];
$email_to = trim($_POST['your_email']);
$your_web_site_name= trim($_POST['your_web_site_name']);

//------------------------------------------------------------------------------------------------
//  PROCEDURA DI INVIO MAIL
//-------------------------------------
$str_oggetto			= OGGETTO_MAIL;
$str_contenuto_email 	= str_replace("{name}",$name,$str_contenuto_email);
$str_contenuto_email 	= str_replace("{mail}",$email,$str_contenuto_email);
$str_contenuto_email 	= str_replace("{ip}", $str_ind_ip,$str_contenuto_email);
$str_contenuto_email 	= str_replace("{corpo}",$message,$str_contenuto_email);
$str_contenuto_email 	= str_replace("{url}",$your_web_site_name,$str_contenuto_email);
$headers = 'From: ' . $your_web_site_name . ' <' . $email_to . '>' . "\r\n" . 'Reply-To: ' . $email;


    $mail=new PHPMailer();  		

    // Let PHPMailer use remote SMTP Server to send Email 		

    $mail->IsSMTP();  		

    // Set the charactor set. The default is 'UTF-8' 		

    $mail->CharSet='UTF-8';  		

    // Add an recipients. You can add more recipients 		// by using this method repeatedly. 		

    $mail->AddAddress($email_to);  		

    // Set the body of the Email. 		

    $mail->Body=$str_contenuto_email;  		

    // Set "From" segment of header. 		

    $mail->From=$email;  		

    $mail->AddReplyTo($email, $email);  		

    // Set addresser's name 		

    $mail->FromName=$name;  		

    // Set the title 		

    $mail->Subject=$str_oggetto;  		

    // Set the SMTP server. 		

    $mail->Host='smtp.gmail.com'; 		

    $mail->Port= 465; 		

    $mail->SMTPAuth = true; 		

    $mail->SMTPSecure = "ssl";   		

    $mail->Username='yourusername@gmail.com'; 		

    $mail->Password='yourpassword'; 		 		// Send Email. 		

    if (!$mail->Send()) {
	echo "<div class=\"error\">Have been some problems sending the email.</div>";
    } else {
        echo "<div class=\"success\">The email has been sent successfully.</div>";
    }

?>