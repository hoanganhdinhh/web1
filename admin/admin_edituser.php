<?php  require "../users/login/check_admin.php";
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunctions.php';
    try{

        $user_image = null;
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $target_dir = "../users/images/";

            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0755, true);
            }
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $user_image = basename($_FILES["image"]["name"]);
            } else {
                $output = "Error uploading the image.";
            }
        }

    if(isset($_POST['fullname']) && isset($_POST['id'])){
        updateUser($pdo, $_POST['id'], $_POST['fullname'], $_POST['username'], $_POST['email'], $_POST['password'], $user_image);
        header('location: admin_adduser.php');
        exit;
    }else{

        $user = getUser($pdo, $_GET['id']);
        $title = 'Edit User';
        ob_start();
        include 'templates/admin_edituser.html.php';
        $output = ob_get_clean();
    }
}catch(PDOException $e){
    $title = 'error has occured';
    $output = 'Error editing joke: ' . $e->getMessage();
}
include 'templates/admin_layout.html.php';
