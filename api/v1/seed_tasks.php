<?php
// Connect to SQLite database
$db = new SQLite3(__DIR__ . '/../../db/tasks.sqlite');

// Create tasks table if it doesn't exist (updated with additional fields)
$db->exec('CREATE TABLE IF NOT EXISTS tasks (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    title TEXT NOT NULL,
    date TEXT NOT NULL,
    author TEXT NOT NULL,
    status TEXT NOT NULL,
    description TEXT NOT NULL
)');

// Clear existing data
$db->exec('DELETE FROM tasks');

// Insert 1000 tasks
$currentTime = new DateTime();
for ($i = 1; $i <= 1000; $i++) {
    $title = "Задача $i"; // Task title
    $taskDate = clone $currentTime;
    $taskDate->modify("+$i hour"); // Task date + i hours
    $taskDateFormatted = $taskDate->format('Y-m-d H:i:s'); // Formatted date

    $author = "Автор $i"; // Author of the task
    $status = "Статус $i"; // Task status
    $description = "Опис $i"; // Task description

    // Insert task into the database with all fields
    $db->exec("INSERT INTO tasks (title, date, author, status, description) VALUES (
        '$title',
        '$taskDateFormatted',
        '$author',
        '$status',
        '$description'
    )");
}

echo "Tasks have been generated.";
?>
