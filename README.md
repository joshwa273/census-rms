# Census Record Management System (Cen-RMS)

A simple PHP-based Census Record Management System with user authentication and modules for managing geographic and demographic data, including regions, provinces, municipalities, barangays, households, and residents.

Project Structure

- `census_db.sql` – SQL dump file to set up the database
- `includes/` – Shared PHP components (header, footer, sidebar)
- `regions/`, `provinces/`, `municipalities/`, `barangays/`, `households/`, `residents/`, `users/` – CRUD modules for each entity
- `login.php`, `logout.php` – User authentication
- `dashboard.php` – Admin landing page after login

Getting Started

Prerequisites

- [XAMPP](https://www.apachefriends.org/) or any local server with PHP (≥ 7.4) and MySQL
- A modern web browser

Installation & Setup

1. Clone or Download the Project:

   git clone https://github.com/your-username/cen-rsm.git

2. Move to XAMPP htdocs Directory:
   Copy or move the project folder (e.g., cen-rsm) into:
    - C:\xampp\htdocs\

3. Import the Database:
  - Open http://localhost/phpmyadmin
  - Create a new database named: census_db
  - Click on the Import tab
  - Choose the census_db.sql file located in the project root
  - Click Go

4.Start the Server:
  - Launch XAMPP
  - Start Apache and MySQL
  - Visit the app in your browser:
      http://localhost/cen-rsm/index.php

🔐 Login Credentials
Use the following default admin account to log in:
Username: admin@gmai.com
Password: password
⚠️ You can change this in the users table via phpMyAdmin.

✅ Modules
Each module supports Create, Read, Update, and Delete (CRUD) operations:
- Regions
- Provinces
- Municipalities
- Barangays
- Households
- Residents
- Users

🎨 Design
- Green-themed responsive UI
- Mobile-friendly layout
- Sidebar-based navigation

🛡️ Security Notes
- Basic authentication system implemented
- Passwords should be hashed in production (currently plaintext for demo purposes)
- Add proper session expiration and CSRF protection for production use

📄 License
This project is open-source and free to use for educational and development purposes.
