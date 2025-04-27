<?php require "../users/login/check_admin.php";
if (isset($_POST['fullname'])) {
    try {
        include '../includes/DatabaseConnection.php';
        include '../includes/DatabaseFunctions.php';

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
                throw new Exception("Error uploading the image.");
            }
        }

        if (!isset($_POST['fullname'], $_POST['username'], $_POST['email'], $_POST['password'])) {
            throw new Exception("Missing form data.");
        }

        insertUser($pdo, $_POST['fullname'], $_POST['username'], $_POST['email'], $_POST['password'], $user_image);
        header('Location: admin_adduser.php');
        exit;

    } catch (PDOException $e) {
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage();
    } catch (Exception $e) {
        $title = 'An error has occurred';
        $output = 'Error: ' . $e->getMessage();
    }

} else {
    include '../includes/DatabaseConnection.php';
    include '../includes/DatabaseFunctions.php';

    $title = 'Add User';
    $users = allUsers($pdo);
    ob_start();
    include 'templates/admin_adduser.html.php';
    $output = ob_get_clean();
}

include 'templates/admin_layout.html.php';