// add_machine.php
<?php
include 'config.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $name = $_POST['name'];
    $token = bin2hex(random_bytes(16));

    $stmt = $conn->prepare("INSERT INTO machines (user_id, name, token) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $user_id, $name, $token);

    if ($stmt->execute()) {
        echo "Machine added successfully. Token: " . $token;
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
