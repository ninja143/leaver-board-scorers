## Laravel REST API App 

About Me

Hi! I'm the developer behind this Laravel REST API. My goal is to provide a well-structured, secure, and efficient foundation for your application. (Feel free to personalize this section with your name or team information)

# Getting Started
## *Prerequisites* :

PHP >= 8.0< Composer<br>
MySQL (or compatible database)<br>
> **Installation**: <br>
1. **Clone the repository**: *git clone __https://github.com/ninja143/leaver-board-scorers.git__*<br>
2. **Install dependencies**: *composer install*<br>
3. **Generate application key**: *php artisan key:generate*<br>
4. **Create a .env file from .env.example and configure database credentials and other settings.**<br>
5. **Database Setup**: Create a database as specified in your .env file.<br>
6. **Run migrations**: *php artisan migrate* (Optional: Add --seed to seed your database with sample data)<br><br>
> **Development Server**<br>
7. **Start a development server**: *php artisan serve*<br>
8. **Access your API at**: http://localhost:8000/api/ 

> **Run Command Scheduler : php artisan schedule : run --watch**<br>

> **Run Queue Job worker : php artisan queue : work**

## Third-party Packages
- **simplesoftwareio/simple-qrcode** - To generate user qr-code based on text, <br>
    It depeneds on php extensions as below. We can allow extensions fro **php.ini file** <br>
    1. __gd extension__ 
    2. __imagick extension__ <br>
<br>

# App Services : Route List 
![image](https://github.com/ninja143/leaver-board-scorers/assets/26186108/31f5e25d-1c90-48b7-b4bf-29d9328f64dd)

# App Services : Route List 
> **php artisan leaverboard:winner** -> It has been set to run as scheduler every 5 minute to decide winnner of the board<br><br>
> **php artisan database:reset-scorer-points** ->  We can hit in manually in cmd to reset all scorers points in databse table


<br><br>
# About development: <br>

We recommend using a production-grade web server like Nginx or Apache with PHP-FPM. Configure your server to serve the public directory of your Laravel application.
Be sure to set appropriate environment variables (e.g., APP_ENV=production) for production settings.
Queues and Schedulers

Laravel provides robust queue and scheduler systems for background jobs and recurring tasks.
To work with queues:
Configure your queue drivers (e.g., database, Redis) in .env and configure workers (php artisan queue:work).
Dispatch jobs using Laravel's Queue facade.
To run scheduled tasks:
Define scheduled tasks in the App\Console\Commands directory.
Schedule them in the App\Console\Kernel class.
Run the scheduler: php artisan schedule:run (manually) or set up a cron job to run it periodically.
API Documentation

For comprehensive API documentation, consider using tools like Swagger (https://github.com/swagger-api) or Laravel Dingo API (https://github.com/dingo/api).
Testing

Unit and feature tests are encouraged for reliable code.
Use Laravel's built-in testing framework (PHPUnit) or a third-party library like Pest (https://laravel.com/docs/11.x/testing).
Security

Security is paramount in APIs. Follow Laravel's security best practices (https://laravel.com/docs/4.2/security).
Sanitize user input, validate data, and protect against common vulnerabilities (e.g., XSS, SQL injection).
Version Control

Use a version control system like Git for code management, collaboration, and tracking changes.
Consider branching strategies (e.g., feature branches, pull requests) for development.
Additional Notes

This readme provides a starting point. Customize it to fit your project's specific requirements.
Refer to Laravel's official documentation (https://laravel.com/docs/11.x/installation) for more in-depth guidance.
I hope this enhanced readme.md serves as a valuable resource for developers using your Laravel REST API!
