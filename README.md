# Simple Task Management System

This is a simple task management system built with PHP (no frameworks) and vanilla JavaScript. It allows users to list tasks, view task details, search tasks by title, and paginate through tasks.

## Features

- **Task Listing**: Displays a list of tasks retrieved from a web service.
- **Task Details**: View detailed information about a task in a modal window.
- **Search**: Search tasks by title.
- **Pagination**: Display 10 tasks per page with pagination.
- **Task Caching**: Task details are cached to avoid repeated requests.

## Requirements

- PHP 7.0 or higher
- Local server (e.g., XAMPP, WAMP, MAMP) or PHP built-in server
- (Optional) Database like SQLite or MySQL (if needed for future expansions)

## Setup and Running Locally

### 1. Download/Clone the Project

```bash
git clone https://github.com/superbabii/simple-task-management.git
```

Or download the ZIP from this repository and extract it.

### 2. Serve the Application

Navigate to the project directory:

```bash
cd simple-task-management
```

Run PHP's built-in server:

```bash
php -S localhost:8000 -t public
```

This will start a local web server that serves the files in the `public` directory.

### 3. Access the Application

Open your browser and navigate to:

```
http://localhost:8000
```

### 4. API Endpoints

- **Task List API**: Fetches a list of tasks (returns 1000 tasks).
  - Endpoint: `http://localhost:8000/api/v1/task.php`

- **Task Details API**: Fetches detailed information about a specific task by ID.
  - Endpoint: `http://localhost:8000/api/v1/task-details.php?id=:id`

### 5. Optional: Using a Database

If you want to use a database (like SQLite or MySQL), follow these steps:

- Configure your database in `config/db.php`.
- Create the tasks table by running the SQL schema found in `data/database.sql`.

### 6. Future Enhancements

- Storing tasks in a real database (e.g., SQLite, MySQL).
- Adding user authentication and authorization.
- Adding the ability to create, update, and delete tasks.

## License

This project is licensed under the MIT License. See the `LICENSE` file for more information.
