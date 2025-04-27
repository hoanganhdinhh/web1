<head>
  <meta charset="UTF-8">
  <title>User Management</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f0f4f8;
      font-family: Arial, sans-serif;
      min-height: 100vh;
    }
    .container-custom {
      max-width: 900px;
      background-color: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    img.user-image {
      width: 60px;
      height: 60px;
      object-fit: cover;
      border-radius: 50%;
    }
    .action-buttons .btn {
      margin-right: 5px;
    }
  </style>
</head>

<body>
<div class="container container-custom">
  <h2 class="text-center mb-4">User Management</h2>

  <form class="row g-3 mb-4" action="admin_adduser.php" method="post" enctype="multipart/form-data">
    <div class="col-md-6">
      <input type="text" class="form-control" name="fullname" placeholder="Full Name" required>
    </div>
    <div class="col-md-6">
      <input type="text" class="form-control" name="username" placeholder="Username" required>
    </div>
    <div class="col-md-6">
      <input type="email" class="form-control" name="email" placeholder="Email" required>
    </div>
    <div class="col-md-6">
      <input type="password" class="form-control" name="password" placeholder="Password" required>
    </div>
    <div class="col-md-12">
      <input type="file" class="form-control" name="image" accept="image/*" required>
    </div>
    <div class="col-12 text-end">
      <button type="submit" class="btn btn-primary">Add User</button>
    </div>
  </form>

  <div class="table-responsive">
    <table class="table align-middle">
      <thead class="table-light">
        <tr>
          <th>Image</th>
          <th>Full Name</th>
          <th>Username</th>
          <th>Email</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($users as $user): ?>
        <tr>
          <td><img src="../users/images/<?= htmlspecialchars($user['user_image'], ENT_QUOTES, 'UTF-8') ?>" alt="User Image" class="user-image"></td>
          <td><?= htmlspecialchars($user['fullname'], ENT_QUOTES, 'UTF-8') ?></td>
          <td><?= htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') ?></td>
          <td><?= htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8') ?></td>
          <td class="action-buttons">
            <form action="admin_edituser.php?id=<?= $user['id'] ?>" method="post" class="d-inline">
              <input type="hidden" name="id" value="<?= $user['id'] ?>">
              <button class="btn btn-success btn-sm">Edit</button>
            </form>
            <form action="admin_deleteuser.php" method="post" class="d-inline">
              <input type="hidden" name="id" value="<?= $user['id'] ?>">
              <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this user?');">Delete</button>
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
