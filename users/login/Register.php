<?php
include '../../includes/DatabaseConnection.php';
include '../../includes/DatabaseFunctions.php';


if (isset($_POST['fullname'], $_POST['username'], $_POST['email'], $_POST['password'], $_POST['password2'])) {
    if ($_POST['password'] !== $_POST['password2']) {
        header('Location: Wrongpassword.php');
        exit;
    }
    else {
        try {
            $password = $_POST['password'];
            $user_image = null;
            insertUser($pdo, $_POST['fullname'], $_POST['username'], $_POST['email'], $password, $user_image);
            header('Location: Login.html');
            exit;
        } catch (PDOException $e) {
            error_log('Database error: ' . $e->getMessage());
            header('Location: ErrorPage.php');
            exit;
        } catch (Exception $e) {
            error_log('Error: ' . $e->getMessage());
            header('Location: ErrorPage.php');
            exit;
        }
    }
}

header('Location: Wrongpassword.php');
exit;
?>