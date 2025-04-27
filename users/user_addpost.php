<?php require "login/check.php";
if (isset($_POST['title'])) {
    try {
        include '../includes/DatabaseConnection.php';
        include '../includes/DatabaseFunctions.php';

        $image = null;

        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $target_dir = "../images/";

            // Ensure uploads directory exists
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
        $user = $_SESSION["UserID"];

        if (!isset($_POST['content'], $_POST['categories'])) {
            throw new Exception("Missing form data.");
        }

        insertPost($pdo, $_POST['title'], $_POST['content'], $image, $_POST['categories'], $user);

        // Redirect after success
        header('Location: user_posts.php');
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
    $categories = allCategories($pdo);

    ob_start();
    include 'templates/user_addpost.html.php';
    $output = ob_get_clean();
}

include 'templates/user_layout.html.php';