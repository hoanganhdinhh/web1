
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
  </style>
</head>
<body>
  <div class="container">
    <h2>Edit Category</h2><br/>
    <form class="form-group" method="post" action="admin_editcategory.php">
        <input type="hidden" name="id" value="<?=$category['id'] ?>">
        <input type="text" name="category" placeholder="Category Name" value="<?= $category['category_name'] ?>">
        <button class="edit-btn">Edit</button>  
    </form>
</body>