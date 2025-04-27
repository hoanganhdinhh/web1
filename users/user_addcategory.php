<?php require "login/check.php";
if (isset($_POST['category'])) {
    try {
        include '../includes/DatabaseConnection.php';
        include '../includes/DatabaseFunctions.php';

        $categories = allCategories($pdo);

        insertCategory($pdo, $_POST['category']);
        header('Location: user_addcategory.php');
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

    $title = 'Add Category';
    $categories = allCategories($pdo);

    ob_start();
    include 'templates/user_addcategory.html.php';
    $output = ob_get_clean();
}

include 'templates/user_layout.html.php';