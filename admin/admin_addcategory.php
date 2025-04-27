<?php require "../users/login/check_admin.php";
if (isset($_POST['category'])) {
    try {
        include '../includes/DatabaseConnection.php';
        include '../includes/DatabaseFunctions.php';

        $categories = allCategories($pdo);
        insertCategory($pdo, $_POST['category']);
        header('Location: admin_addcategory.php');
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

    $title = 'Category Management';
    $categories = allCategories($pdo);
    ob_start();
    include 'templates/admin_addcategory.html.php';
    $output = ob_get_clean();
}

include 'templates/admin_layout.html.php';