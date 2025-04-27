<?php
$to = 'dinhnguyenhoanganh2103@gmail.com';
$subject = 'Test PHP Mail từ NAS';
$message = 'Xin chào, đây là test gửi bằng mail() relay Mailjet.';
$headers = 'From: dinhnguyenhoanganh2005@gmail.com' . "\r\n" .
           'X-Mailer: PHP/' . phpversion();

if (mail($to, $subject, $message, $headers)) {
    echo '✔ Gửi thành công!';
} else {
    echo '❌ Gửi thất bại.';
}