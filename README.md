# Login_RegisterPHPBackEnd
Secure PHP Login & Registration System
A full-stack, responsive user authentication system built using PHP (Object-Oriented MySQLi), MySQL, JavaScript, and CSS. The system supports role-based access control (Admin and User workflows) and implements modern security practices like password hashing.

🚀 Features
Role-Based Redirection: Authenticated users are dynamically redirected based on their role (admin redirected to admin_page.php, standard user redirected to user_page.php).

Secure Authentication: Passwords are safely hashed using PHP's native password_hash() function with PASSWORD_DEFAULT.

Stateful Forms & Validation: Built-in error reporting utilizing PHP sessions. If an error occurs (e.g., email already exists or wrong credentials), the system retains the view of the currently open form.

Single-Page Form Toggle: Clean JavaScript layout switching that smoothly toggles between Login and Registration views without page reloads.

Session Guardrails: Protected user and admin profile routes that prevent unauthorized access by checking active session tokens.

🛠️ Tech Stack
Backend: PHP 8.x

Database: MySQL (via mysqli extension)

Frontend: HTML5, CSS3 (Google Fonts Poppins integration), JavaScript (Vanilla ES6)

📂 Project Structure
Plaintext
├── config.php            # Database connection configuration
├── index.php             # Core landing page (Dynamic Login/Registration UI)
├── login_register.php    # Form handler & authentication logic controller
├── admin_page.php        # Protected dashboard layout for Admin users
├── user_page.php         # Protected dashboard layout for standard Users
├── logout.php            # Destroys active user sessions and redirects
├── style.css             # Main stylesheet containing layout designs
└── script.js             # Client-side UI toggling utility script
💾 Database Setup
Before running the application, you need to set up your MySQL database.

Open phpMyAdmin (or your preferred SQL client).

Create a new database named user.

Run the following SQL script to generate the structured users table:

SQL
CREATE TABLE IF NOT EXISTS `users` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(100) NOT NULL,
  `email` VARCHAR(150) NOT NULL UNIQUE,
  `password` VARCHAR(255) NOT NULL,
  `role` ENUM('user', 'admin') NOT NULL DEFAULT 'user',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
⚙️ Installation & Local Setup
Prerequisites
Local server environment (e.g., XAMPP, WAMP, MAMP, or a native PHP/MySQL server installation).

Step-by-Step Instructions
Clone the Repository:

Bash
git clone https://github.com/YOUR_USERNAME/YOUR_REPOSITORY_NAME.git
Move files to your server directory:
Place the project folder inside your web server's root folder (e.g., C:/xampp/htdocs/ for XAMPP or /var/www/html/ for Linux).

Configure Database Connection:
Open config.php and verify the database connection credentials match your environment:

PHP
$host = "localhost";
$user = "root";
$password = ""; // Add your local database password here if applicable
$database = "user";
Run the Application:
Start your Apache and MySQL modules, then navigate to the local environment link in your browser:

Plaintext
http://localhost/YOUR_PROJECT_FOLDER_NAME/index.php
🔒 Security Best Practices Implemented
SQL Injection Risks Mitigation: (Note: To maximize system production-readiness, consider upgrading raw $conn->query() inputs to Prepared Statements).

Password Protections: Raw user passwords are intentionally excluded from database transactions via one-way cryptographic hashing.

Page Access Interceptors: Both dashboard assets evaluate $_SESSION['email'] variables immediately upon request lifecycle start to prevent direct path traversal exploits.
