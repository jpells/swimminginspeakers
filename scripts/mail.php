<?php
if (isset($_POST['email']) && isset($_POST['message']) && isset($_POST['name'])) {
    $to = 'swimminginspeakers@gmail.com';
    $subject = 'swimming in speakers website contact';
    $message = $_POST['message'];
    $headers = 'From: ' . $_POST['name'] . '<' . $_POST['email'] . '>' . "\r\n" .
        'Reply-To: ' . $_POST['name'] . '<' . $_POST['email'] . '>' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    try {
        mail($to, $subject, $message, $headers);
        echo "1";
    } catch (Exception $e) {
        echo "0";
    }
} else {
    echo "0";
}
?>