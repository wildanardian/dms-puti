# DMS PUTI

This is a guide for installing and setting up the DMS PUTI project on your local machine.

## Prerequisites

Before you begin, make sure you have the following installed on your system:

- PHP (version 8.0 or higher)
- Composer (version 2.0 or higher)
- MySQL (version 5.7 or higher)
- Node.js (version 14 or higher)
- npm (version 6 or higher)

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/wildanardian/dms-puti.git
    ```

2. Navigate to the project directory:

    ```bash
    cd dms-puti
    ```

3. Install PHP dependencies:

    ```bash
    composer install
    ```

4. Create a copy of the `.env.example` file and rename it to `.env`:

    ```bash
    cp .env.example .env
    ```

5. Generate an application key:

    ```bash
    php artisan key:generate
    ```

6. Configure the database connection in the `.env` file:

    ```dotenv
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_username
    DB_PASSWORD=your_password
    ```

7. Run the database migrations:

    ```bash
    php artisan migrate
    ```

8. Install JavaScript dependencies:

    ```bash
    npm install
    ```

9. Build the assets:

    ```bash
    npm run dev
    ```

10. Start the development server:

     ```bash
     php artisan serve
     ```

11. Open your web browser and visit `http://localhost:8000` to see the application.

## Usage

...

## Contributing

...

## License

This project is licensed under the [MIT License](https://opensource.org/licenses/MIT).
