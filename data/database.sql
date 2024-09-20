-- database.sql

CREATE TABLE tasks (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    title TEXT NOT NULL,
    date TEXT NOT NULL,
    author TEXT NOT NULL,
    status TEXT NOT NULL,
    description TEXT NOT NULL
);

-- Insert example data
INSERT INTO tasks (title, date, author, status, description) VALUES
('Task 1', datetime('now', '+1 hour'), 'Author 1', 'Pending', 'Description 1'),
('Task 2', datetime('now', '+2 hour'), 'Author 2', 'In Progress', 'Description 2'),
('Task 3', datetime('now', '+3 hour'), 'Author 3', 'Completed', 'Description 3');
