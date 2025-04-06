# ⏱️ Dynamic Task Scheduling with Laravel & Filament

This project is a Laravel-based dynamic task scheduler that allows you to manage all your scheduled Artisan commands through a beautiful admin UI using [FilamentPHP](https://filamentphp.com/).  
No need to touch code or cron jobs manually — everything is stored in the database and loaded dynamically into Laravel's scheduler!

---

## ✨ Features

- ✅ Add/Edit/Delete scheduled tasks via Filament UI  
- 🕒 Supports frequencies like `daily`, `everyMinute`, `everyHour`, etc.  
- 📆 Optionally restrict to specific days (e.g., Mondays & Tuesdays)  
- ⏰ Set exact execution time (HH:MM format)  
- 🟢 Toggle tasks active/inactive without deleting  
- 🧠 Built using Laravel Scheduler + FilamentPHP

---

## ⚙️ Installation

Clone the repository and follow these steps to set it up:

```bash
# 1. Install PHP dependencies
composer install

# 2. Run database migrations
php artisan migrate

# 3. Create a Filament admin user
php artisan make:filament-user
