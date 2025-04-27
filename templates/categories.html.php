<head>
  <meta charset="UTF-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
  <div class="container my-5">
    <div class="card shadow rounded-4">
      <div class="card-body">
        <h2 class="text-center mb-4">Category List</h2>

        <div class="table-responsive">
          <table class="table table-striped table-hover align-middle text-center">
            <thead class="table-light">
              <tr>
                <th scope="col">Category</th>
              </tr>
            </thead>
            <tbody id="userTableBody">
              <?php foreach ($categories as $category): ?>
                <tr>
                  <td><?= htmlspecialchars($category['category_name'], ENT_QUOTES, 'UTF-8') ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
