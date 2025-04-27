<?php require "login/check.php";
try{
    include '../includes/DatabaseConnection.php';
    include '../includes/DatabaseFunctions.php';

    $posts = allPosts($pdo);
    $title = 'Posts List';
    $totalPosts = totalPosts($pdo);

    ob_start();
    include 'templates/user_posts.html.php';
    $output = ob_get_clean();
}catch (PDOException $e){
    $title = 'An error has occured';
    $output = 'Database error: ' . $e->getMessage();
}
include 'templates/user_layout.html.php';
?>