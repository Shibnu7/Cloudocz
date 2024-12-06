# Cloudocz
# Laravel Blog Project

## Overview
This is a simple blog application built with Laravel, allowing users to create, read, update, and delete blog posts.

## Prerequisites
Make sure you have the following installed:
- PHP 
- Composer
- MySQL 
- Laravel 

## Setup Instructions

### Step 1: Clone the Repository
Open your terminal and run:
```bash
git clone https://github.com/yourusername/laravel-blog-project.git
cd laravel-blog-project

Step 2: Install Dependencies
Run the following command to install the required packages:
composer install

Step 3: Configure Environment

Step 4: Generate Application Key
Run this command to generate a unique application key:
php artisan key:generate

Step 5: Create Migration, Model, Controller, and View
Create Migration:
Run the following command to create a migration for the blog posts:
php artisan make:migration  create_blog_posts_table
Edit the migration file in database/migrations/ to define the structure of the posts table.

Run Migrations:
Create the necessary database tables by running:
php artisan migrate

Model:
Create a model for the Post:
php artisan make:model Blogpost

Create Controller:
Create a controller for handling blog post logic:
php artisan make:controller BlogPostController

Create Views:
Create the necessary Blade view files in resources/views/blog/ for displaying and managing posts.

step-6: Step 6: Define Routes
Open the routes/web.php file and define the routes  blog application:

Step 7: Start the Development Server
Launch the application using the built-in Laravel server:
php artisan serve
