# E-laundry

E-laundry adalah aplikasi berbasis web yang digunakan untuk mencatat transaksi laundry secara online.

## Framework

E-laundry dibangun menggunakan laravel 10

## Installation

* Install [Composer](https://getcomposer.org/download)
* Clone the repository: `git clone https://github.com/ajiswn/elaundry.git`
* Install dependencies: `composer install`
* Run `cp .env.example .env` for create .env file
* Create MySQL database
* Run `php artisan migrate` for migration database
* Run `php artisan key:generate` for generates encryption key
* Run `php artisan serve` for start local server
