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
- **SQLite3** for task data storage

## Setup and Running Locally

### 1. Download/Clone the Project

```bash
git clone https://github.com/superbabii/simple-task-management.git
```

Or download the ZIP from this repository and extract it.

### 2. Set up SQLite Database

1. **Create the SQLite Database:**

   - Inside the project directory, create a `db/` folder.
   - Inside the `db/` folder, create an SQLite database file called `tasks.sqlite`.

2. **Seed the Database:**

   - Navigate to the project’s `api/v1/` directory.
   - Run the following script to seed the database with tasks:

     ```bash
     php seed_tasks.php
     ```

   This script will generate the tasks and store them in the `tasks.sqlite` database.

### 3. Enable the SQLite3 Extension in PHP

1. Open your `php.ini` file (found in the directory where PHP is installed). Common locations include:

   - **Windows** (with XAMPP): `C:\xampp\php\php.ini`
   - **Manual installation**: `C:\php\php.ini`
   - **Custom installation**: Your custom PHP path.

2. Locate the following line:

   ```ini
   ;extension=sqlite3
   ```

3. Uncomment the line by removing the semicolon `;`, so it looks like this:

   ```ini
   extension=sqlite3
   ```

4. Restart your PHP environment:

   - For XAMPP or similar, restart Apache.
   - For PHP's built-in server, stop and restart it after editing `php.ini`.

### 4. Serve the Application

Navigate to the project directory and run PHP's built-in server:

```bash
cd simple-task-management
php -S localhost:8000
```

This will start a local web server that serves the files in the `public` directory.

### 5. Access the Application

Open your browser and navigate to:

```
http://localhost:8000
```

You should see the task list on the main page.

### 6. API Endpoints

- **Task List API**: Fetches a list of tasks from the SQLite database (returns 1000 tasks).
  - Endpoint: `http://localhost:8000/api/v1/task.php`

- **Task Details API**: Fetches detailed information about a specific task by ID.
  - Endpoint: `http://localhost:8000/api/v1/task-details.php?id=:id`

### 7. Optional: Modifying the Database

If you need to modify the database (e.g., add more tasks, update the schema), you can access and modify the `tasks.sqlite` file directly using an SQLite manager tool (like DB Browser for SQLite) or through PHP.

### 8. Future Enhancements

- Implementing user authentication and authorization.
- Adding the ability to create, update, and delete tasks.
- Expanding the task data schema for more detailed task management.
