<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            margin: 0;
        }
        .profile-card {
            max-width: 400px;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            background: #fff;
            overflow: hidden;
        }
        .profile-image {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid #fff;
            background-color: #e9ecef;
        }
    </style>
</head>

<body>
<div class="container py-5 d-flex justify-content-center align-items-center">
    <div class="card profile-card text-center p-4">
        <div class="mb-3">
            <img src="images/<?= htmlspecialchars($user['user_image'], ENT_QUOTES, 'UTF-8') ?>" class="profile-image" alt="User Image">
        </div>
        <h4 class="card-title"><?= htmlspecialchars($user['fullname'], ENT_QUOTES, 'UTF-8') ?></h4>
        <h6 class="card-subtitle mb-2 text-muted">@<?= htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') ?></h6>
        <p class="card-text small text-muted"><?= htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8') ?></p>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
