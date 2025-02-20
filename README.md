#School Results Uploads and Checker Portal

Overview

This is a School Results Uploads and Checker Portal built using Vanilla PHP. The portal allows administrators or teachers to upload student results, and students can check their results using their unique credentials.

Features

Admin Panel: Secure login for administrators to upload and manage student results.

Student Portal: Allows students to check their results using unique credentials (e.g., Registration Number or Student ID).

Secure Authentication: Prevents unauthorized access using session-based authentication.

File Upload Support: Admins can upload results in CSV format for batch processing.

Database Integration: Uses MySQL for storing and retrieving student records.

Search Functionality: Students can search for their results easily.

Responsive UI: Works across devices (mobile, tablet, and desktop).

Technologies Used

Backend: PHP (Vanilla, no framework)

Database: MySQL

Frontend: HTML, CSS, JavaScript

Styling Framework: Bootstrap (optional)

Installation Guide

Prerequisites

Ensure you have the following installed:

PHP (7.4 or later recommended)

MySQL Server

Apache Server (or use XAMPP/LAMP/WAMP for easy setup)

Setup Instructions

Clone the repository

git clone https://github.com/your-repo/school-results-portal.git
cd school-results-portal

Setup Database

Create a new database in MySQL (e.g., school_results)

Import the SQL file provided (database.sql)

Update config.php with your database credentials:

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'yourpassword');
define('DB_NAME', 'school_results');

Run the Application

Start your Apache and MySQL server.

Place the project folder in the htdocs directory if using XAMPP.

Open http://localhost/school-results-portal/ in your browser.

Usage

Admin Login

Visit http://localhost/school-results-portal/admin/

Log in with admin credentials (default credentials can be set in the database).

Upload results manually or via CSV file.

Manage student records.

Student Result Checking

Visit http://localhost/school-results-portal/

Enter Student ID/Registration Number to view results.

Folder Structure

/school-results-portal
│── admin/		    # Admin Panel
│── config/		    # Database and app configurations
│── uploads/		  # Uploaded files (CSV, images, etc.)
│── public/		    # Main student portal
│── index.php		  # Homepage for student result checking
│── admin/index.php   # Admin dashboard
│── styles/		    # CSS and frontend assets
│── scripts/		   # JavaScript and AJAX functions
│── database.sql	  # Database schema and sample data

Security Measures

Password hashing for admin authentication.

Input validation and sanitization.

SQL injection prevention using prepared statements.

Session-based authentication for user roles.

Future Improvements

Role-based access control (RBAC)

Email notifications for results

Graphical data representation of student performance

Export results in PDF format

API integration for external systems

License

This project is open-source under the MIT License.

Author

Developed by DonAbu.

