<?php
include 'db.php';

try {
    $stmt = $pdo->query("SELECT * FROM items ORDER BY id ASC");
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skincares Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-primary">Skincares Information</h1>
            <a href="create.php" class="btn btn-success">
                <i class="fas fa-plus"></i> Add New Item
            </a>
        </div>

        <?php if (!empty($items)): ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Item Name</th>
                            <th>Brand</th>
                            <th>Skin Type</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($items as $item): ?>
                            <tr>
                                <td><?= htmlspecialchars($item['id']) ?></td>
                                <td><?= htmlspecialchars($item['name']) ?></td>
                                <td><?= htmlspecialchars($item['brand']) ?></td>
                                <td>
                                    <span class="badge bg-<?= 
                                        $item['skin_type'] == 'Dry' ? 'info' : 
                                        ($item['skin_type'] == 'Oily' ? 'warning' : 
                                        ($item['skin_type'] == 'Combination' ? 'primary' : 
                                        ($item['skin_type'] == 'Sensitive' ? 'danger' : 'secondary'))) 
                                    ?>">
                                        <?= htmlspecialchars($item['skin_type']) ?>
                                    </span>
                                </td>
                                <td>$<?= number_format($item['price'], 2) ?></td>
                                <td><?= htmlspecialchars($item['stock']) ?></td>
                                <td>
                                    <a href="edit.php?id=<?= $item['id'] ?>" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a href="delete.php?id=<?= $item['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            
        <?php else: ?>
            <div class="alert alert-info">No items found. Add your first skincare item!</div>
        <?php endif; ?>
    </div>
<footer class="bg-light py-4 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4>About</h4>
                <ul class="list-unstyled text-muted">
                    <h5>
                    <li>Topic   : Skincares Information</li>
                    <li>Name    : Vuth Sophea</li>
                    <li>Class   : A6 Year3 Semester2</li>
                    <li>School  : Royal University of Phnom Penh</li></h5>
                </ul>
            </div>
        </div>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
</body>
</html>