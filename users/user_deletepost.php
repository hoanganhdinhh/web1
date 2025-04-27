<?php require "login/check.php";
try{
    include '../includes/DatabaseConnection.php';
    include '../includes/DatabaseFunctions.php';

    deletePost($pdo, $_POST['id']);
    header('location: user_posts.php');
    exit;

}catch (PDOException $e) {
    $title = 'An error has occured';
    $output = 'Unable to connect to delete joke: ' . $e->getMessage();
}

include 'templates/user_layout.html.php';