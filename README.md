Prerequisites to preview this Laravel application:
1. To have Xampp installed (at least version 8.0.5) - Apache and MySql needed.

Steps to preview the application
1. Clone this repository
2. Create an empty database for our application
3. Copy .env.example file to .env on the root folder.
4. Open your .env file and change the database name (DB_DATABASE) to whatever you named it, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration.
5. By default, the username is root and you can leave the password field empty.
6. Run all of those commands:
    1. composer install
    2. npm install
    3. php artisan key:generate
    4. php artisan migrate
7. Download the clinic-vet.sql file from this repository and import it to the empty database you created
8. npm run watch

