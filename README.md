# VAT Calculator

This project is a simple VAT calculator built with Laravel, designed to calculate VAT amounts based on user input.

## Setup Instructions

Follow these steps to set up and run the project:

### 1. Clone the Repository

Clone this repository to your local machine using the following command:

```bash
git clone https://github.com/topukhan/vat-calculator.git
```
### 2. Install Composer Dependencies

Navigate to the project directory and install the Composer dependencies by running:

```bash
composer install
npm install vite --save-dev
npm run build
```

### 3. Set Up Environment Variables

Copy the `.env.example` file to `.env`

Generate an application key:

```bash
php artisan key:generate
```

### 4. Configure Database

Set up your database connection in the .env file. Update the following variables with your database credentials:

`MySql:`

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database_name
DB_USERNAME=database_username
DB_PASSWORD=database_password
```


`SQLite:`

```bash
DB_CONNECTION=sqlite
```

if you want to use SQLite as a database then make sure you have enabled `extension=sqlite3` and `extension=pdo_sqlite` in `php.ini` and create a `database.sqlite` file in the database folder of you project's root directory.

### 5. Run Database Migrations

Run the database migrations to create the necessary tables:

```bash
php artisan migrate
```

`Optional`: You can run seeder to seed some user data using:

```bash
php artisan db:seed --class=CustomUserSeeder
```

### 6. Serve the Application

You can run the Laravel development server using the following command:

```bash
php artisan serve
```

By default, the application will be served at http://localhost:8000

### Usage

Once the application is set up and running, you can access the VAT calculator by visiting the URL where the application is hosted. Enter the required information (amount, VAT calculation operation, and tax percentage) and click the "Calculate" button to see the VAT calculation results.