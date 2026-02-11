# 🚀 Laravel 11 Task Manager

A clean and functional Task Manager (CRUD) built to demonstrate Laravel 11 fundamentals, including Eloquent ORM, Blade templating, and Tailwind CSS integration.

## ✨ Features

- **Create**: Add new tasks with real-time validation.
- **Read**: Display all tasks fetched from a MySQL database.
- **Delete**: Remove completed or unwanted tasks.
- **UI/UX**: Responsive design built with Tailwind CSS.
- **Security**: Protection against CSRF attacks and secure form handling.

## 🛠️ Tech Stack

- **Framework**: Laravel 11
- **Language**: PHP 8.2+
- **Database**: MySQL
- **Frontend**: Blade & Tailwind CSS
- **Server**: Apache (via XAMPP/MAMP)

## ⚙️ Installation & Setup

1. **Clone the repository**

   ```bash
   git clone [https://github.com/YOUR_USERNAME/laravel-task-manager.git](https://github.com/YOUR_USERNAME/laravel-task-manager.git)
   cd laravel-task-manager

2. **Install PHP dependencies**

     composer install

3. **Configure Environement**
   cp .env.example .env
   Edit the .env file and set your database credentials:
    DB_DATABASE=Task_manager
    DB_USERNAME=root
    DB_PASSWORD=

4. **INITIALIZE THE APPLICATION**
    php artisan key:generate
    php artisan migrate

5. **Start the developement server**
   🚀 Access the app at: <http://localhost:8000/tasks>

## 🧪 Automated Testing

This project uses **Pest**, a delightful PHP Testing Framework, to ensure stability and prevent regressions.

To run the full test suite, use the following command:

```bash
./vendor/bin/pest