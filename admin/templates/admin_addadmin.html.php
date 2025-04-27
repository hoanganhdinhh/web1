
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
      max-width: 900px;
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
    <h2>Admin Management</h2><br/>
    <form class="form-group" action="admin_addadmin.php" method="post">
        <select name="users" class="users" required>
            <option value="">Select new Admin</option>
            <?php foreach($users as $user): ?>
                <option value="<?=htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8'); ?>">
                    <?=htmlspecialchars($user['fullname'], ENT_QUOTES, 'UTF-8')?>
                </option>
            <?php endforeach; ?>
        </select></br>
      <button id="addUserBtn">Add new Admin</button>
  </form>

    <table>
    
      <thead>
        <tr>
          <th>Image</th>
          <th>Full Name</th>
          <th>Username</th>
          <th>Email</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody id="userTableBody">
        <tr>
        <?php foreach ($admins as $admin): ?>
            <td><img src="../users/images/<?=htmlspecialchars($admin['user_image'], ENT_QUOTES, 'UTF-8');?>" alt="User Image"></td>
            <td><?=htmlspecialchars($admin['fullname'], ENT_QUOTES, 'UTF-8')?></td>
            <td><?=htmlspecialchars($admin['username'], ENT_QUOTES, 'UTF-8')?></td>
            <td><?=htmlspecialchars($admin['email'], ENT_QUOTES, 'UTF-8')?></td>
            <td class="action-buttons">

            <form action="admin_deleteadmin.php" method="post">
                <input type="hidden" name="id" value="<?=$admin['id']?>">
                <button class="delete-btn">Delete</button>
            </form>
          </td>
        </tr>
        <?php endforeach; ?>
        
      </tbody>
      
    </table>
  </div>
</body>