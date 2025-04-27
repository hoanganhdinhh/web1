<html>
<head>
    <title><?= $title ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      min-height: 100vh;
      display: flex;
    }
    .sidebar {
      width: 250px;
      background-color: #343a40;
    }
    .sidebar .nav-link {
      color: #fff;
    }
    .sidebar .nav-link:hover {
      background-color: #495057;
    }
    .content {
      flex-grow: 1;
      padding: 20px;
    }
  </style>
</head>
<body>

  <div class="sidebar d-flex flex-column p-3">
    <a href="#" class="text-white text-decoration-none fs-4 mb-3">Admin Site</a>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="../admin/admin_posts.php" class="nav-link">Posts list</a>
      </li>
      <li>
        <a href="../admin/admin_addpost.php" class="nav-link">Add new Post</a>
      </li>
      <li>
        <a href="../admin/admin_addcategory.php" class="nav-link">Categories</a>
      </li>
      <li>
        <a href="../admin/admin_adduser.php" class="nav-link">Users</a>
      </li>  
      <li>
        <a href="../admin/admin_addadmin.php" class="nav-link">Admins</a>
      </li>
      <li>
        <a href="../admin/admin_information.php" class="nav-link">My Information</a>
      </li>
      <li>
        <a href="../users/login/Logout.php" class="nav-link text-danger">Logout</a>
      </li>
    </ul>
  </div>

  <div class="content">
    <main>
      <?=$output?>
    </main>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 