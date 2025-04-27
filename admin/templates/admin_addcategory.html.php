<head>
  <meta charset="UTF-8">
  <title>User Management</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f4f8;
      margin: 0;
    }

    .container1 {
      max-width: 900px;
      margin: auto;
      border-radius: 12px;
      background: #ffffff;
      padding: 20px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    h2 {
      text-align: center;
      color: #333;
      margin-bottom: 30px;
    }

    .form-group {
      display: flex;
      gap: 20px;
      margin-bottom: 20px;
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
      text-align: center;
    }

    table th {
      background-color: #f5f5f5;
    }

    .action-buttons form {
      display: inline;
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
  </style>
</head>

<body>
  <br>
  <div class="container1">
    <h2>Category Management</h2>

    <form class="form-group" method="post" action="admin_addcategory.php">
      <input type="text" name="category" placeholder="Category Name" required>
      <button type="submit">Add new Category</button>
    </form>

    <table>
      <thead>
        <tr>
            <th>Category</th>
            <th>Actions</th>
        </tr>
      </thead>
      <tbody id="userTableBody">
        <?php foreach ($categories as $category): ?>
          <tr>
            <td><?=htmlspecialchars($category['category_name'], ENT_QUOTES, 'UTF-8')?></td>
            <td class="action-buttons">
              <form action="admin_editcategory.php?id=<?=$category['id']?>" method="post" style="display:inline;">
                <input type="hidden" name="id" value="<?=$category['id']?>">
                <button class="edit-btn">Edit</button>
              </form>
              <form action="admin_deletecategory.php" method="post" style="display:inline;">
                <input type="hidden" name="id" value="<?=$category['id']?>">
                <button class="delete-btn">Delete</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</body>
