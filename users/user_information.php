<?php require "login/check.php";
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunctions.php';

try {
    $user_id = $_SESSION['UserID'];
    $user = getUser($pdo, $user_id);
    $title = 'User Information';

    ob_start();
    include 'templates/user_information.html.php';
    $output = ob_get_clean();
} catch (Exception $e) {
    $title = 'An error has occurred';
    $output = 'Error: ' . $e->getMessage();
}

include 'templates/user_layout.html.php';
?>