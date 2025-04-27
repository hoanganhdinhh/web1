<?php require "login/check.php";
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunctions.php';
try{
    if(isset($_POST['category'])){
        updateCategory($pdo, $_POST['id'], $_POST['category']);
        header('location: admin_addcategory.php');
        exit;
    }else{

        $category = getCategory($pdo, $_GET['id']);
        $title = 'Edit Category';

        ob_start();
        include 'templates/user_editcategory.html.php';
        $output = ob_get_clean();
    }
}catch(PDOException $e){
    $title = 'error has occured';
    $output = 'Error editing joke: ' . $e->getMessage();
}

include 'templates/user_layout.html.php';
