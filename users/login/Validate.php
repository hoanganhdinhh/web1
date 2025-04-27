<?php
include '../../includes/DatabaseConnection.php';
include '../../includes/DatabaseFunctions.php';

$users = users($pdo);

foreach ($users as $user) {
    if ($_POST['username'] == $user['username'] && password_verify($_POST['password'], $user['password'])) {
        session_start();
        $_SESSION["Authorised"] = "Y";
        $_SESSION["UserID"] = $user['id'];
        $_SESSION["FullName"] = $user['fullname'];

        if ($user['role'] == 'admin') {
            $_SESSION["Admin"] = "Y";
            header('Location: ../../admin/admin_posts.php');
            exit;
        } else {
            header('Location: ../../users/user_posts.php');
            exit;
        }
    }
}

header('Location: Wrongpassword.php');
exit();
?>