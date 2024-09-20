<?php
// Connect to SQLite database
$db = new SQLite3(__DIR__ . '/../../db/tasks.sqlite');

// Create tasks table if it doesn't exist
$db->exec('CREATE TABLE IF NOT EXISTS tasks (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    title TEXT NOT NULL,
    date TEXT NOT NULL
)');

// Clear existing data
$db->exec('DELETE FROM tasks');

// Insert 1000 tasks
$currentTime = new DateTime();
for ($i = 1; $i <= 1000; $i++) {
    $title = "Задача $i";
    $taskDate = clone $currentTime;
    $taskDate->modify("+$i hour");
    $taskDateFormatted = $taskDate->format('Y-m-d H:i:s');

    $db->exec("INSERT INTO tasks (title, date) VALUES ('$title', '$taskDateFormatted')");
}

echo "Tasks have been generated.";
?>
