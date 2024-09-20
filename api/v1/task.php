<?php
// Set content type to JSON
header('Content-Type: application/json');

// Open SQLite database
$db = new SQLite3(__DIR__ . '/../../db/tasks.sqlite');

// Check if cached tasks exist and if they are less than an hour old
$cacheFile = __DIR__ . '/task_cache.json';
if (file_exists($cacheFile) && (time() - filemtime($cacheFile)) < 3600) {
    // Serve cached response
    echo file_get_contents($cacheFile);
    exit;
}

// Fetch 1000 tasks from the database
$query = $db->query('SELECT id, title, date FROM tasks ORDER BY id LIMIT 1000');

// Prepare tasks array
$tasks = [];
while ($row = $query->fetchArray(SQLITE3_ASSOC)) {
    $tasks[] = $row;
}

// Convert to JSON and cache the response
$jsonResponse = json_encode($tasks);
file_put_contents($cacheFile, $jsonResponse);

// Return the JSON response
echo $jsonResponse;
?>
