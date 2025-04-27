<?php
$fullname = $_SESSION['FullName'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $title ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">User Site</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="user_posts.php">Posts</a></li>
        <li class="nav-item"><a class="nav-link" href="user_addpost.php">Add Post</a></li>
        <li class="nav-item"><a class="nav-link" href="user_addcategory.php">Categories</a></li>
        <li class="nav-item"><a class="nav-link" href="user_information.php">My Information</a></li>
      </ul>

      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">
            Hello, <?= htmlspecialchars($fullname, ENT_QUOTES, 'UTF-8') ?>
          </a>
        </li>
        <li class="nav-item">
          <a class="btn btn-primary ms-3" href="login/Logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<main class="container my-5 flex-grow-1">
  <?= $output ?>
</main>

<footer>&copy; HoangAnh 2025</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
