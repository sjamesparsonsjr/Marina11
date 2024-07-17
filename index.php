<?php
include 'config.php';

$result = $conn->query("SELECT posts.*, machines.name AS machine_name, users.username AS user_name FROM posts
                        JOIN machines ON posts.machine_id = machines.id
                        JOIN users ON machines.user_id = users.id
                        ORDER BY posts.created_at DESC");

include 'includes/header.php';

while ($row = $result->fetch_assoc()) {
    echo "<div class='post'>";
    echo "<h2>" . htmlspecialchars($row['title']) . "</h2>";
    echo "<p>Machine: " . htmlspecialchars($row['machine_name']) . "</p>";
    echo "<p>User: " . htmlspecialchars($row['user_name']) . "</p>";
    echo "<img src='" . htmlspecialchars($row['image_path']) . "' alt='Image'>";
    echo "<p>Print Time: " . htmlspecialchars($row['print_time']) . " mins</p>";
    echo "<p>Filament Use: " . htmlspecialchars($row['filament_use']) . " grams</p>";
    echo "<p>Cost: $" . htmlspecialchars($row['cost']) . "</p>";
    echo "</div>";
}

include 'includes/footer.php';
?>
