<head>
  <meta charset="UTF-8">
  <title>Posts</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      font-family: Arial, sans-serif;
    }

    .center-wrapper {
      display: flex;
      flex-direction: column;
      justify-content: flex-start;
      align-items: center;
      min-height: 100vh;
      padding: 20px;
    }

    .post-card {
      width: 100%;
      max-width: 700px;
      border: 1px solid #ddd;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      background: #fff;
      padding: 20px;
      margin-bottom: 20px;
    }

    .post-header {
      display: flex;
      align-items: center;
      margin-bottom: 15px;
    }

    .post-header img {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      object-fit: cover;
    }

    .post-header .ms-2 {
      flex-grow: 1;
      padding-left: 10px;
    }

    .post-header h6 {
      margin: 0;
      font-size: 1rem;
    }

    .post-header small {
      font-size: 0.875rem;
      color: #6c757d;
    }

    .post-actions {
      display: flex;
      gap: 10px;
    }

    .post-actions form button {
      font-size: 0.9rem;
      color: #0d6efd;
      background: none;
      border: none;
      padding: 0;
      cursor: pointer;
      text-decoration: none;
    }

    .post-actions form button:hover {
      color: #0056b3;
      text-decoration: underline;
    }

    .post-content p {
      font-size: 1rem;
      line-height: 1.6;
    }

    .post-image {
      width: 100%;
      height: auto;
      border-radius: 8px;
      margin-top: 10px;
    }
  </style>
</head>
<body>

<div class="container center-wrapper">
  <?php foreach ($posts as $post): ?>
    <div class="post-card">

      <!-- Header -->
      <div class="post-header">
        <img src="../users/images/<?= htmlspecialchars($post['user_image'], ENT_QUOTES, 'UTF-8') ?>" alt="Profile">
        <div class="ms-2">
          <h6 class="mb-0 fw-bold"><?= htmlspecialchars($post['fullname'], ENT_QUOTES, 'UTF-8') ?></h6>
          <small class="text-muted"><?= htmlspecialchars($post['date'], ENT_QUOTES, 'UTF-8') ?> - <?= htmlspecialchars($post['category_name'], ENT_QUOTES, 'UTF-8') ?></small>
        </div>
        <div class="ms-auto post-actions">
          <form action="user_editpost.php?id=<?= $post['id'] ?>" method="post">
            <input type="hidden" name="id" value="<?= $post['id'] ?>">
            <button type="submit">Edit</button>
          </form>
          <form action="user_deletepost.php?id=<?= $post['id'] ?>" method="post">
            <input type="hidden" name="id" value="<?= $post['id'] ?>">
            <button type="submit" onclick="return confirm('Delete this Post?');">Delete</button>
          </form>
        </div>
      </div>

      <!-- Post Content -->
      <div class="post-content">
        <p class="mb-1 fw-bold"><?= htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8') ?></p>
        <p class="small"><?= htmlspecialchars($post['content'], ENT_QUOTES, 'UTF-8') ?></p>
      </div>

      <!-- Post Image -->
      <img src="../images/<?= htmlspecialchars($post['image'], ENT_QUOTES, 'UTF-8') ?>" alt="Post Image" class="post-image">
    </div>
  <?php endforeach; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
