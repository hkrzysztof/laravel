# Social blog with CMS

## Introduction

It's a social media blog with a full CMS. Developed in Laravel 5.5 in PhpStorm IDE. Database connection was handled with PDO. Front-end was created mostly with Javascript, jQuery and Bootstrap.

## Getting started
1. Make sure you have Composer (https://getcomposer.org/)
2. Run in terminal ```composer global require "laravel/installer ```
3. Download this repository and unzip to your web server /public folder
4. Create database
5. Open .env.example file, rename it to .env
6. Run ```php artisan key:generate``` in your terminal
7. Put the obtained key in APP_KEY in .env file
8. Fill in DB_DATABASE, DB_USERNAME, DB_PASSWORD in .env file
9. run ```npm install``` in the app folder terminal to install all dependencies
10. run ```php artisan migrate```
10. Ready to use
