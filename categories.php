<?php
try{
  include 'includes/DatabaseConnection.php';
  include 'includes/DatabaseFunctions.php';

  $categories = allCategories($pdo);
  $title = 'Post list';

  ob_start();
  include 'templates/categories.html.php';
  $output = ob_get_clean();

}catch (PDOException $e) {
  $output = 'Database error: ' . $e->getMessage();
  $title = 'An error has occured';
}

include 'templates/layout.html.php';