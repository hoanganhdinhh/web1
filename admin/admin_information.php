<?php  require "../users/login/check_admin.php";
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunctions.php';

try{
    $user_id = $_SESSION['UserID'];
    $user = getUser($pdo, $user_id);
    $title = 'User Information';

    ob_start();
    include 'templates/admin_information.html.php';
    $output = ob_get_clean();
}catch (PDOException $e){
    $title = 'An error has occured';
    $output = 'Database error: ' . $e->getMessage();
}
include 'templates/admin_layout.html.php';
?>