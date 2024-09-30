Clone app - git clone git@github.com:jdavyds/url-test.git

There are 2 separate folders.
1. Laravel backend
    Run "composer install" on folder location on terminal
   
    Manually rename your .env.example to .env then change the db name and configurations in .env file
   
    Then, generate an application key: "php artisan key:generate"
   
    Configure the Database
   
    Run migrations to create the necessary database tables: "php artisan migrate"
   
    Start server: "php artisan serve"

2. Vue frontend
   
    cd current working directory to vue folder
   
    Run "npm install"
   
    Run "npm run dev" to start up project
   
    Go to "http://localhost:5173/" on browser to view project
   


Ensure the following are installed on your computer: mysql, node, php, composer.


