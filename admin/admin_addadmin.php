<?php require "../users/login/check_admin.php";
if (isset($_POST['users'])) {
    try {
        include '../includes/DatabaseConnection.php';
        include '../includes/DatabaseFunctions.php';

        insertAdmin($pdo, $_POST['users']);
        header('Location: admin_addadmin.php');
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

    $title = 'Admin Management';
    $users = allUsers($pdo);
    $admins = allAdmins($pdo);

    ob_start();
    include 'templates/admin_addadmin.html.php';
    $output = ob_get_clean();
}

include 'templates/admin_layout.html.php';