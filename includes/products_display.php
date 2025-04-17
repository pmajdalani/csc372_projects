<?php

require_once __DIR__ . '/db_connect.php';  // $pdo is now available

// Build the SQL statement.
$sql = "SELECT name, description, price
        FROM products
        ORDER BY created_at DESC";

// Run the query; PDO::query() returns a PDOStatement.
$stmt = $pdo->query($sql);

if ($stmt === false) {                     // Sanity check (rarely needed)
    echo "<p>There was an error running the query.</p>";
    return;
}

if ($stmt->rowCount() === 0) {
    echo "<p>No products found.</p>";
    return;
}

// Fetch every row as an associative array.
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<ul class="product-list">
<?php foreach ($products as $p): ?>
    <li class="product">
        <h3><?= htmlspecialchars($p['name']) ?></h3>
        <p><?= htmlspecialchars($p['description']) ?></p>
        <strong>$<?= number_format($p['price'], 2) ?></strong>
    </li>
<?php endforeach; ?>
</ul>
