# TaskFlow - Personal Task Manager

A simple Personal Task Manager built with Laravel. The system allows users to create, view, edit, delete, and update the status of personal tasks.

## Project Information

**Project Code:** WST21-PM-2026-SF

**Student Name:** JOHN LOUI RAMA CARLOS

**Course & Year:** BSIT 2nd Year

**Database Used:** SQLite

## Features

- Add Task
- View Tasks
- Edit Task
- Delete Task
- Update Status
  - Pending
  - Completed
- Set Task Due Date
- Add Task Description
- Form Validation
- Professional user interface

## Technologies Used

- Laravel 13
- PHP 8.5
- SQLite
- Blade
- HTML
- CSS
- JavaScript

## System Structure

The project demonstrates the Laravel development flow:

Routes → Controller → Model → Database → Blade Views

### Routes

The application uses Laravel resource routes to handle task operations.

### Controller

`TaskController` handles creating, displaying, updating, and deleting tasks.

### Model

The `Task` model communicates with the tasks database table.

### Database

SQLite is used as the database for storing task information.

### Blade Views

Blade templates are used to display the task list, add-task form, and edit-task form.

## Database Fields

The `tasks` table contains:

| Field | Purpose |
|---|---|
| id | Task ID |
| task_name | Name of the task |
| description | Task details |
| status | Pending or Completed |
| due_date | Task deadline |
| created_at | Record creation date |
| updated_at | Record update date |

## How to Run the Project

### 1. Install dependencies

```bash
composer install

### 2. Configure the environment

Copy the example environment file:

```bash
cp .env.example .env
```

### 3. Generate application key

```bash
php artisan key:generate
```

### 4. Create the SQLite database

Make sure the SQLite database file exists:

```text
database/database.sqlite
```

### 5. Run database migrations

```bash
php artisan migrate
```

### 6. Start the Laravel development server

```bash
php artisan serve
```

Open the application in your browser using the URL shown in the terminal.

## Project Purpose

TaskFlow was developed as an individual Laravel mini project to demonstrate the basic Laravel development flow:

**Database → Model → Controller → Routes → Blade**

The project focuses on managing personal tasks through a simple and user-friendly web interface.
