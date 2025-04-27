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
      max-width: 950px;
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
    <h2>Post Management</h2>

    <table>
      <thead>
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Image</th>
            <th>User</th>
            <th>Category</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
      </thead>
      <tbody id="userTableBody">
        <?php foreach ($posts as $post): ?>
          <tr>
            <td><?=htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8')?></td>
            <td><?=htmlspecialchars($post['content'], ENT_QUOTES, 'UTF-8')?></td>
            <td><img height="80px" src="../images/<?= htmlspecialchars($post['image'], ENT_QUOTES, 'UTF-8') ?>" alt="Post Image" class="post-image">
            <td><?=htmlspecialchars($post['fullname'], ENT_QUOTES, 'UTF-8')?></td>
            <td><?=htmlspecialchars($post['category_name'], ENT_QUOTES, 'UTF-8')?></td>
            <td><?=htmlspecialchars($post['date'], ENT_QUOTES, 'UTF-8')?></td>
            </td>
            <td class="action-buttons">
              <form action="admin_editpost.php?id=<?=$post['id']?>" method="post" style="display:inline;">
                <input type="hidden" name="id" value="<?=$post['id']?>">
                <button class="edit-btn">Edit</button>
              </form>
              <form action="admin_deletepost.php" method="post" style="display:inline;">
                <input type="hidden" name="id" value="<?=$post['id']?>">
                <button class="delete-btn" onclick="return confirm('Delete this post?');">Delete</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</body>
