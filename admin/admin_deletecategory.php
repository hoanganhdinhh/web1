<?php require "../users/login/check_admin.php";
try{
    include '../includes/DatabaseConnection.php';
    include '../includes/DatabaseFunctions.php';

    deleteCategory($pdo, $_POST['id']);
    header('location: admin_addcategory.php');
}catch (PDOException $e) {
    $title = 'An error has occured';
    $output = 'Unable to connect to delete joke: ' . $e->getMessage();
}
include 'templates/admin_layout.html.php';