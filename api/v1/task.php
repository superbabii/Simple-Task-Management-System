<?php
header('Content-Type: application/json');
require_once '../config/db.php';

try {
    // Securely fetch tasks with pagination
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $tasksPerPage = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;
    $offset = ($page - 1) * $tasksPerPage;

    // Prepare the query with LIMIT and OFFSET
    $query = $pdo->prepare('SELECT * FROM tasks LIMIT :limit OFFSET :offset');
    $query->bindValue(':limit', $tasksPerPage, PDO::PARAM_INT);
    $query->bindValue(':offset', $offset, PDO::PARAM_INT);
    $query->execute();
    
    $tasks = $query->fetchAll(PDO::FETCH_ASSOC);

    // Fetch total task count for pagination
    $totalQuery = $pdo->query('SELECT COUNT(*) FROM tasks');
    $totalTasks = $totalQuery->fetchColumn();

    // Return tasks and pagination info as JSON
    echo json_encode([
        'tasks' => $tasks,
        'pagination' => [
            'currentPage' => $page,
            'tasksPerPage' => $tasksPerPage,
            'totalTasks' => (int)$totalTasks,
            'totalPages' => ceil($totalTasks / $tasksPerPage)
        ]
    ]);
} catch (PDOException $e) {
    // Handle any database errors
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
