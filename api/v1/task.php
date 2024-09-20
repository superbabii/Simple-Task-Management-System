<?php
header('Content-Type: application/json');
require_once '../config/db.php';

// Fetch tasks from the database
$query = $pdo->query('SELECT * FROM tasks LIMIT 1000');
$tasks = $query->fetchAll(PDO::FETCH_ASSOC);

// Return tasks as JSON
echo json_encode($tasks);
?>
