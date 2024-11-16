
Laravel Application
Prerequisites
PHP: >= 8.0
Composer: Latest version
MySQL (or your preferred database)
Node.js and npm: Latest version (for frontend assets)
Setup Instructions
- Clone the Repository
Clone the repository to your local machine:

git clone https://github.com/AdhamElsharkawy/kanban-borad-backend

- Install Dependencies
Install PHP dependencies using Composer:
composer install

- Configure Environment
Copy the .env.example file to .env:

php artisan key:generate
Update the .env file with your database credentials and other settings:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mysql
DB_USERNAME=root
DB_PASSWORD=

RUN 

php artisan migrate --seed

php artisan serve
The application should now be accessible at http://127.0.0.1:8000.


## API Documentation
The API documentation is available at: [http://127.0.0.1:8000/api/documentation]
