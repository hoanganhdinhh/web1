<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{
            font-family: Arial, sans-serif;
        }
        .form-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            max-width: 700px;
            margin: auto;
        }
        .form-container h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .form-container input,
        .form-container textarea,
        .form-container select {
            width: 100%;
        }
    </style>
</head>
<body>
<div>
    <div class="content flex-grow-1 p-4">
        <div class="form-container">
            <h2>Add a New Post</h2>
            <form method="post" action="user_addpost.php" enctype="multipart/form-data">
                <div class="mb-3">
                    <input type="text" name="title" class="form-control" placeholder="Title" required>
                </div>
                <div class="mb-3">
                    <textarea name="content" class="form-control" placeholder="Content" required></textarea>
                </div>               
                <div class="mb-3">
                    <select name="categories" class="form-select" required>
                        <option value="">Select a Category</option>
                        <?php foreach($categories as $category): ?>
                            <option value="<?=htmlspecialchars($category['id'])?>">
                                <?=htmlspecialchars($category['category_name'])?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Select image to upload:</label>
                    <input type="file" name="image" id="image" class="form-control" accept="image/*">
                </div>
                <button type="submit" name="submit" class="btn btn-primary w-100">Add</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>