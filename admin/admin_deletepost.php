<?php require "../users/login/check_admin.php";
try{
    include '../includes/DatabaseConnection.php';
    include '../includes/DatabaseFunctions.php';

    deletePost($pdo, $_POST['id']);
    header('location: admin_posts.php');
    exit;
}catch (PDOException $e) {
    $title = 'An error has occured';
    $output = 'Unable to connect to delete joke: ' . $e->getMessage();
}
include 'templates/admin_layout.html.php';