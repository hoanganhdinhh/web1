<?php require "../users/login/check_admin.php";
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
        include 'templates/admin_editcategory.html.php';
        $output = ob_get_clean();
    }
}catch(PDOException $e){
    $title = 'error has occured';
    $output = 'Error editing category: ' . $e->getMessage();
}

include 'templates/admin_layout.html.php';
