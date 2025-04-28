<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            display: flex;
            min-height: 100vh;
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
            <h2>Edit Post</h2>
            <form method="post" action="admin_editpost.php" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= htmlspecialchars($post['id'], ENT_QUOTES, 'UTF-8') ?>">
                <div class="mb-3">
                    <input type="text" name="title" class="form-control" placeholder="Title" value="<?= htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8') ?>" required>
                </div>
                <div class="mb-3">
                    <textarea name="content" class="form-control" placeholder="Content" required><?= htmlspecialchars($post['content'], ENT_QUOTES, 'UTF-8') ?></textarea>
                </div>
                <div class="mb-3">
                    <select name="users" class="form-select" required>
                        <option value="<?= htmlspecialchars($post['user_id'], ENT_QUOTES, 'UTF-8') ?>">Select New User</option>
                        <?php foreach($users as $user): ?>
                        <option value="<?=htmlspecialchars($user['id'])?>">
                            <?=htmlspecialchars($user['fullname'])?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <select name="categories" class="form-select" required>
                        <option value="<?=htmlspecialchars($post['category_id'])?>">Select New Category</option>
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