
Laravel Application
Prerequisites
PHP: >= 8.0
Composer: Latest version
MySQL (or your preferred database)
Node.js and npm: Latest version (for frontend assets)
Setup Instructions
1. Clone the Repository
Clone the repository to your local machine:

bash
Copy code
git clone https://github.com/AdhamElsharkawy/kanban-borad-backend

2. Install Dependencies
Install PHP dependencies using Composer:
composer install

3. Configure Environment
Copy the .env.example file to .env:

php artisan key:generate
Update the .env file with your database credentials and other settings:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
4. Run Migrations and Seed Database
Run the migrations to set up your database schema and seed the database with initial data:

bash
Copy code
php artisan migrate --seed
Note: The --seed flag will run the seeder classes to populate your database with sample data.

5. Start the Development Server
You can now run the application using Laravel’s built-in server:

bash
Copy code
php artisan serve
The application should now be accessible at http://127.0.0.1:8000.
