<?php
header('Content-Type: application/json');
require_once '../config/db.php';

// Get task ID from the URL
$id = $_GET['id'];

// Fetch task details from the database
$stmt = $pdo->prepare('SELECT * FROM tasks WHERE id = :id');
$stmt->execute(['id' => $id]);
$task = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if the task was found
if ($task) {
    echo json_encode($task);
} else {
    echo json_encode(['error' => 'Task not found']);
}
?>
