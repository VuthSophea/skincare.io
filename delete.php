<?php
include 'db.php';

if (!isset($_GET['id'])) {
    echo "<div class='alert alert-danger'>Error: No ID provided for deletion.</div>";
    exit();
}

$id = $_GET['id'];

try {
    $stmt = $con->prepare("DELETE FROM items WHERE id = ?");
    $stmt->execute([$id]);
    header("Location: index.php?message=Item deleted successfully!");
    exit();
} catch (PDOException $e) {
    echo "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
}
?>
