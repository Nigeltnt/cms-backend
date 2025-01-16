# cms-backend
This is the application with the CMS Logic

To deploy this project on your local machine you should follow these steps:

Step 1: Install Required Software
Ensure your machine has the following installed:

PHP (v7.4 or higher)
Download PHP
Composer (Dependency Manager for PHP)
Download Composer

Database Server (MySQL or MariaDB)

MySQL Community Edition: Download MySQL
Alternatively, install XAMPP or Laragon, which come bundled with Apache, PHP, and MySQL.

Web Server (Optional):
Laravel comes with a built-in development server, so installing Apache or Nginx is optional.

Step 2: Clone or Copy the Project
Clone from GitHub:

git clone https://github.com/your-repo/your-project.git
cd your-project
Or Copy the Project Folder to a local directory of your choice.

Step 3: Set Up Environment Variables
Navigate to the project directory:


cd your-project
Copy the .env.example file to .env:

cp .env.example .env
Open the .env file in a text editor and configure your local database settings:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=root
DB_PASSWORD=your_password

Step 4: Install Dependencies
Run the following command to install all required PHP dependencies:

composer install

Step 5: Generate the Application Key
Run the following command to generate the application’s encryption key:

php artisan key:generate

Step 6: Set Up the Database
Create a Database:

Open your database management tool (like phpMyAdmin, HeidiSQL, or MySQL Workbench).
Create a new database (e.g., laravel_db).

Run Database Migrations:


php artisan migrate --seed

Step 7: Serve the Application
Start the local development server:


php artisan serve
You will see output similar to:


Starting Laravel development server: http://127.0.0.1:8000

Visit http://127.0.0.1:8000 in your web browser to view the project.

NOW YOU HAVE YOUR APPLICATION RUNNING. 
You can now start creating, updating and storing information using the CMS

NOTE: The Admin Panel is accessible through the url localhost:8000/admin/hero or you can alternatively access it by clicking the Admin link on the navbar from the website.
