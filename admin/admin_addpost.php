<?php require "../users/login/check_admin.php";
if (isset($_POST['title'])) {
    try {
        include '../includes/DatabaseConnection.php';
        include '../includes/DatabaseFunctions.php';

        $image = null;

        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $target_dir = "../images/";

            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0755, true);
            }
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $image = basename($_FILES["image"]["name"]);
            } else {
                throw new Exception("Error uploading the image.");
            }
        }

        session_start();
        $users = $_SESSION["UserID"];
        if (!isset($_POST['content'], $_POST['categories'])) {
            throw new Exception("Missing form data.");
        }

        insertPost($pdo, $_POST['title'], $_POST['content'], $image, $_POST['categories'], $users);
        header('Location: admin_posts.php');
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

    $title = 'Add a new Post';
    $users = allUsers($pdo);
    $categories = allCategories($pdo);
    ob_start();
    include 'templates/admin_addpost.html.php';
    $output = ob_get_clean();
}

include 'templates/admin_layout.html.php';