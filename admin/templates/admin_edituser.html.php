
<head>
  <meta charset="UTF-8">
  <title>User Management</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f4f8;
      margin: 0;
      padding: 0px;
    }

    .container {
      max-width: 1000px;
      margin: auto;
      background-color: #ffffff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    h2 {
      text-align: center;
      color: #333;
    }

    .form-group {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      margin-bottom: 20pxpx;
    }

    .form-group input {
      flex: 1;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 8px;
    }

    .form-group button {
      padding: 10px 20px;
      background-color: #007bff;
      border: none;
      color: white;
      border-radius: 8px;
      cursor: pointer;
    }

    .form-group button:hover {
      background-color: #0056b3;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    table th, table td {
      padding: 12px;
      border-bottom: 1px solid #ddd;
      text-align: left;
    }

    table th {
      background-color: #f5f5f5;
    }

    .action-buttons button {
      padding: 6px 12px;
      margin-right: 6px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      color: white;
    }

    .edit-btn {
      background-color: #28a745;
    }

    .delete-btn {
      background-color: #dc3545;
    }

    .edit-btn:hover {
      background-color: #218838;
    }

    .delete-btn:hover {
      background-color: #c82333;
    }

    img{
      width: 60px;
      height: 60px;
    }

  </style>
</head>
<body>
  <div class="container">
    <h2>Edit User Information</h2><br/>
    <form class="form-group" action="admin_edituser.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8') ?>">
        <input type="text" name="fullname" id="fullname" placeholder="Full Name" value="<?= htmlspecialchars($user['fullname'], ENT_QUOTES, 'UTF-8') ?>" required>
        <input type="text" name="username" id="username" placeholder="Username" value="<?= htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') ?>" required>
        <input type="text" name="email" id="email" placeholder="Email" value="<?= htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8') ?>" required>
        <input type="password" name="password" id="password" placeholder="Password" minlength="8" required>

        <input type="file" name="image" id="image" accept="image/*">
        <button id="addUserBtn">Edit User</button>
  </form>
  </div>
</body>