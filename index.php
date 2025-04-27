<?php
try{
    include 'includes/DatabaseConnection.php';
    include 'includes/DatabaseFunctions.php';

    $posts = allPosts($pdo);
    $title = 'Post list';

    ob_start();
    include 'templates/posts.html.php';
    $output = ob_get_clean();

}catch (PDOException $e) {
    $output = 'Database error: ' . $e->getMessage();
    $title = 'An error has occured';
}

include 'templates/layout.html.php';