
# 💻 PHP Login & Registration System with 3D Background

A simple, elegant, and responsive user authentication system built using **PHP + MySQL**, styled with **CSS**, and enhanced with **3D animated backgrounds** using **Vanta.js (Three.js)**.


## 🌟 Features

* ✅ Register new users
* ✅ Secure login using hashed passwords
* ✅ Session management
* ✅ Login/logout with alert feedback
* ✅ Responsive modals for Login/Register
* ✅ Stylish 3D animated background (Vanta.js)
* ✅ Clean UI with modern UX

---

## 📁 Folder Structure

```
login_PHP/
│
├── index.php              // Main webpage (Landing + Login/Register modals)
├── config.php             // Database connection settings
├── auth_process.php       // Handles login and registration logic
├── logout.php             // Ends session and logs out user
├── style.css              // UI styling
├── script.js              // Modal toggle and client-side logic
└── README.md              // You're reading this!
```

---

## ⚙️ Requirements

* XAMPP, WAMP, MAMP, or LAMP server
* PHP >= 7.2
* MySQL
* A web browser (Chrome recommended)

---

## 🛠️ Setup Instructions

### 1. 🚀 Start Localhost Server

Make sure Apache & MySQL are running on XAMPP/WAMP.

### 2. 🗃️ Create Database

Open [phpMyAdmin](http://localhost/phpmyadmin) and create a new database:

```sql
CREATE DATABASE login_db;
```

Then run:

```sql
USE login_db;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255)
);
```

### 3. 📂 Place Files

Put the `login_PHP` folder in your server directory:

* For XAMPP: `htdocs/login_PHP`
* For WAMP: `www/login_PHP`

### 4. ⚙️ Configure Database

Edit `config.php` with your database credentials:

```php
$host = 'localhost';
$user = 'root';     // default in XAMPP
$pass = '';         // default is blank
$dbname = 'login_db';
```

---

## 🌐 Open the Website

Visit:

```
http://localhost/login_PHP/index.php
```

You should see:

* A home page with a 3D animated background
* A login button to open the modal
* Register option in the modal

---

## 🧪 Test Credentials

* Register using your name, email, and password.
* Log in after successful registration.
* See your name appear on the navbar.
* Click logout to return to guest view.

---

## 🎨 Technologies Used

* PHP
* MySQL
* HTML5
* CSS3
* JavaScript
* [Vanta.js](https://www.vantajs.com/) (WAVES 3D Background)
* [Boxicons](https://boxicons.com/) (icons)

---

## 🛡️ Security Notes

* Passwords are hashed using `password_hash()`.
* Session management ensures user privacy.
* SQL is simple and safe for basic usage, but **prepared statements** are recommended for production.

---

## 📸 Screenshots (Optional)

You can add screenshots of:

* Homepage
* Login modal
* Registration modal
* Logged-in view

---

## 🧑‍💻 Author

Created by **Sharmila Rapeti** using love for clean UI and cool 3D effects 💙
Ready to be deployed or extended into full-stack apps!
