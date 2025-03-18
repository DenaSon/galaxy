Overview

galaxy is an online store specializing in high-quality local delicacies, dried fruits, nuts, and other traditional snacks sourced from reputable local producers. The platform is built using Laravel with WordPress API integration for content management and SEO enhancement.

Features

E-commerce Platform: Built with Laravel for robust performance and scalability.

WordPress Integration: Uses WP REST API (wp-json) to manage blog content and SEO-friendly articles.

Product Catalog: Comprehensive listing of dried fruits, nuts, and traditional snacks with detailed descriptions and images.

User Authentication: Secure login and registration for customers.

Shopping Cart & Checkout: Streamlined shopping experience with a user-friendly checkout process.

SEO Optimization: High-quality blog content for better search engine rankings.

Admin Panel: Custom-built admin dashboard for managing products, orders, and customer interactions.

Tech Stack

Backend: Laravel (PHP Framework)

Frontend: Blade Templates, Tailwind CSS

CMS Integration: WordPress (for blog & SEO content)

Database: MySQL

API: WP REST API for fetching and displaying blog content

Deployment: Apache/Nginx, DigitalOcean/VPS

Installation & Setup

Prerequisites

Ensure you have the following installed:

PHP 8.x

Composer

MySQL

Node.js & npm

Laravel Installer

Steps to Install

Clone the repository:

git clone https://github.com/denason/galaxy.git
cd galaxy

Install dependencies:

composer install
npm install && npm run build

Set up the environment file:

cp .env.example .env

Configure database credentials in .env file.

Set WordPress API URL for blog integration.

Generate application key:

php artisan key:generate

Run migrations and seed database:

php artisan migrate --seed

Start the development server:

php artisan serve

API Integration

galaxy retrieves blog content using the WordPress REST API. Ensure the WordPress installation has the wp-json API enabled. API endpoint example:

https://your-wordpress-site.com/wp-json/wp/v2/posts

Contribution Guidelines

We welcome contributions! To contribute:

Fork the repository.

Create a feature branch (git checkout -b feature-name).

Commit your changes (git commit -m "Add new feature").

Push to the branch (git push origin feature-name).

Open a Pull Request.

License

galaxy is licensed under the MIT License. See LICENSE for details.

Contact

For inquiries or support, contact us at:

Website: https://galaxy.com

Email: support@galaxy.com

