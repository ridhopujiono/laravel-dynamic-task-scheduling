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
- 🧠 Built using Laravel + FilamentPHP

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
```


## 📌 How It Works

This system dynamically loads scheduled Artisan commands from the database and registers them with Laravel’s built-in task scheduler.

### 🧱 Database Structure

Each scheduled task is stored in the `schedules` table with the following fields:

| Column     | Type         | Description                                                   |
|------------|--------------|---------------------------------------------------------------|
| `name`     | string       | The name of the task (used for logging and identification)    |
| `command`  | string       | The Artisan command to run (e.g., `app:sync-data`)            |
| `frequency`| string/null  | Laravel scheduler method (e.g., `daily`, `everyMinute`, etc.) |
| `days`     | array/null   | (Optional) Specific days to run (e.g., `mondays`, `tuesdays`) |
| `time`     | string/null  | (Optional) Time to run (in `HH:MM` format)                    |
| `active`   | boolean      | Whether the task is enabled or not                            |


## 🎛️ Admin UI (Filament)

This project includes a powerful and user-friendly admin interface built using [Laravel Filament](https://filamentphp.com/), making it easy to manage scheduled tasks without writing code.

### ✨ Features

- ✅ **Create** new scheduled tasks via a form
- ✏️ **Edit** existing tasks with real-time conditional fields
- 🗑️ **Delete** tasks with confirmation
- 📋 **List View** with search, sort, and toggle for `active` status
- 🧠 Intelligent form behavior:
  - If `frequency` is selected → `days` is hidden
  - If `days` is selected → `frequency` is hidden

### 📸 Screenshots

![image](https://github.com/user-attachments/assets/19f6da03-cad9-412e-938b-69645d4e1c36)


### 🧩 UI Components Used

- `TextInput` for task name, command, and time
- `Select` with `multiple` for choosing days of the week
- `ToggleColumn` for switching task `active` status
- Conditional logic using `.hidden(fn (Get $get) => ...)` and `.reactive()`
- Form `Grid` layout for responsive two-column fields (e.g., using `->columns(2)`)

### 👤 Filament User Setup

If you're setting this up for the first time, create a Filament admin user by running:

```bash
php artisan make:filament-user
```


Then access the admin panel at:
http://localhost:8000/admin/login

