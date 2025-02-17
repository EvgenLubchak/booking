<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Booking 1.0-beta

Features:
<br>
Room list by date range
<br>
Room reservation list by date range
<br>
Creating reservation
<br>
Deleting reservation
<br>
Create rooms command

## local project setup
### Use Laravel Sail
Laravel provides Sail, a built-in solution for running your Laravel project using Docker.
<br>
https://laravel.com/docs/9.x/installation#laravel-and-docker

Tested on Linux and Docker Compose
<br>
https://laravel.com/docs/9.x/installation#getting-started-on-linux

### Some commands
After the project has been created, you can navigate to the application directory and start Laravel Sail. 
Laravel Sail provides a simple command-line interface for interacting with Laravel's default Docker configuration:
```
cd example-app
./vendor/bin/sail up
```
https://laravel.com/docs/9.x/sail#executing-sail-commands

### Don't forget to run composer commands and migrations ets...
```
./vendor/bin/sail composer install
./vendor/bin/sail php artisan migrate
```

## Room commands
Create 50 rooms 
```
./vendor/bin/sail php artisan create:rooms 50
```
