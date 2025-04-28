<?php
if (isset($_POST['message'])){
    $title = "Contact us";
    $message = $_POST['message'];
    ini_set('sendmail_path', "\"C:\xampp\sendmail\sendmail.exe\" -t");
    ini_set('SMTP', 'smtp.gmail.com');
    ini_set('smtp_port', 587);
    ini_set('smtp_ssl', 'auto');
    ini_set('error_logfile', 'error.log');

   
    mail('dinhnguyenhoanganh2103@gmail.com', 'Mail from Website', $message, "From: dinhnguyenhoanganh2005@gmail.com");
    $output = "Thank you for your message";
}else{
    $title = "Contact us";
    ob_start();
    include 'templates/contact.html.php';
    $output = ob_get_clean();
}
include 'templates/layout.html.php';
?>