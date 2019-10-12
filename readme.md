
## About project
this is asimple ecommerce restful api project
user can create, retrieve, update, delete products through api
user can also create, retrieve, update, delete reviews of these products 


## How to get started 
_______________________

## Installation

    git clone https://github.com/A2mm/ecommerce-restful-api.git
    take copy of .env.example and name it as .env
    run composer install 
    php artisan key:generate

    /*  create database with name of your choice >>>> in .env file


*/*  run php artisan migrate command through your terminal to publish all tables on database 

*/*  run php artisan db:seed to fill products table and reviews table with some records

*/*  get to your postman tool and run project endpoints indicated in routes/api.php file 