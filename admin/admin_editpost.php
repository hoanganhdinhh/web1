<?php require "../users/login/check_admin.php";
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunctions.php';
    try{
        $post_image = null;

        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $target_dir = "../images/";

            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0755, true);
            }
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $post_image = basename($_FILES["image"]["name"]);
            } else {
                $output = "Error uploading the image.";
            }
        }

    if(isset($_POST['title']) && isset($_POST['id'])){
        updatePost($pdo, $_POST['id'], $_POST['title'], $_POST['content'], $post_image, $_POST['categories'], $_POST['users']);
        header('location: admin_posts.php');
    }else{

        $post = getPost($pdo, $_GET['id']);
        $user = getUser($pdo, $_GET['id']);
        $category = getCategory($pdo, $_GET['id']);
        $categories = allCategories($pdo);
        $users = allUsers($pdo);
        $title = 'Edit Post';
        ob_start();
        include 'templates/admin_editpost.html.php';
        $output = ob_get_clean();
    }
}catch(PDOException $e){
    $title = 'error has occured';
    $output = 'Error editing joke: ' . $e->getMessage();
}

include 'templates/admin_layout.html.php';
