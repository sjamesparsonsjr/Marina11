// receive_post.php
<?php
include 'config.php';

$data = json_decode(file_get_contents('php://input'), true);

$token = $data['token'];
$title = $data['title'];
$image_path = $data['image_path'];
$print_time = $data['print_time'];
$filament_use = $data['filament_use'];
$cost = $data['cost'];

$stmt = $conn->prepare("SELECT id FROM machines WHERE token = ?");
$stmt->bind_param("s", $token);
$stmt->execute();
$result = $stmt->get_result();
$machine = $result->fetch_assoc();

if ($machine) {
    $machine_id = $machine['id'];
    $stmt = $conn->prepare("INSERT INTO posts (machine_id, title, image_path, print_time, filament_use, cost) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssii", $machine_id, $title, $image_path, $print_time, $filament_use, $cost);

    if ($stmt->execute()) {
        echo "Post received successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }
} else {
    echo "Invalid token.";
}
?>
