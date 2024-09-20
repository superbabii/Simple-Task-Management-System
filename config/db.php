<?php
// db.php

try {
    // For SQLite (database file is located in the /data/ folder)
    $pdo = new PDO('sqlite:' . __DIR__ . '/../data/tasks.db');
    // Set error mode to exceptions
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Uncomment this for MySQL or other DBMS connections
    /*
    $dsn = 'mysql:host=localhost;dbname=your_db_name';
    $username = 'your_username';
    $password = 'your_password';
    $pdo = new PDO($dsn, $username, $password);
    */

} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
