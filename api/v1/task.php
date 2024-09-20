<?php
// Set content type to JSON
header('Content-Type: application/json');

// Open SQLite database
$db = new SQLite3(__DIR__ . '/../../db/tasks.sqlite');

// Check if the task ID is provided in the URL
if (isset($_GET['id'])) {
    // Fetch task details by ID
    $taskId = (int) $_GET['id'];

    // Query to get task information by ID
    $query = $db->prepare('SELECT id, title, date, author, status, description FROM tasks WHERE id = :id');
    $query->bindValue(':id', $taskId, SQLITE3_INTEGER);

    $result = $query->execute();
    $task = $result->fetchArray(SQLITE3_ASSOC);

    if (!$task) {
        echo json_encode(['error' => 'Task not found']);
        exit;
    }

    // Return task details as JSON
    echo json_encode($task);
    exit;
}

// Otherwise, fetch 1000 tasks from the database
$query = $db->query('SELECT id, title, date FROM tasks ORDER BY id LIMIT 1000');

// Prepare tasks array
$tasks = [];
while ($row = $query->fetchArray(SQLITE3_ASSOC)) {
    $tasks[] = $row;
}

// Convert to JSON and cache the response
$jsonResponse = json_encode($tasks);
file_put_contents(__DIR__ . '/task_cache.json', $jsonResponse);

// Return the JSON response
echo $jsonResponse;