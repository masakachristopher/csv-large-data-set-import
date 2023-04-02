# Quick Start Guide

To run the cloned codebase directly, you need to have composer installed.

1. Run `composer install` to install dependencies.
2. Make sure your web server and database server are running.
3. Make your own `.env` file in the project root, following the key name but not value used in [`.env.example`]
4. Don't forget to add database configuration values according to your server preferences `.env` file. See sample below.
   ````
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE={{your database name}}
    DB_USERNAME={{your database username}}
    DB_PASSWORD={{your database password}}
    ````
5. Don't forget to add database queue driver environment variable `QUEUE_CONNECTION` in your   `.env` file. See sample below.
   ````
    QUEUE_CONNECTION=database
    ````

6. Then run migration to create database tables

    ````
    php artisan migrate
    ````


7. From there, any the following should work:
  - `php artisan serve` to run server
  - `php artisan test` to run test


8. For background processes which are added to the queue, eg Exporting Excel file. Use

    ````
    php artisan queue:work
    ````
    or

    ````
    php artisan queue:listen
    ````


## OVERVIEW POINTS
Due to little user experience on the web interface, here are some highlights
- CSV importing process takes about 10 to 15 seconds.
- Excel exporting process takes about 8 minutes
