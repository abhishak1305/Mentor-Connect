# Mentor Connect

Mentor Connect is a Laravel-based web application designed to connect startups with experienced mentors. 

## Getting Started

Follow these instructions to get the project up and running on your local machine.

### Prerequisites

*   PHP 8.2 or higher
*   Composer
*   Node.js & npm
*   MongoDB instance

### Installation & Setup

1.  **Clone the repository:**
    ```bash
    git clone https://github.com/abhishak1305/Mentor-Connect.git
    cd Mentor-Connect
    ```

2.  **Install PHP dependencies:**
    ```bash
    composer install
    ```

3.  **Install front-end dependencies:**
    ```bash
    npm install
    npm run build
    ```

4.  **Environment Configuration (CRITICAL):**
    Copy the example environment file to create your own configuration.
    ```bash
    cp .env.example .env
    ```

    **⚠️ MANUAL CONFIGURATION REQUIRED:**
    You must manually edit the newly created `.env` file and provide the following sensitive information for the application to function correctly. This information is excluded from version control for security.
    
    *   **Application Key:** Generate a new key by running:
        ```bash
        php artisan key:generate
        ```
    *   **MongoDB Database Credentials:**
        Update the `DB_URI` variable with your MongoDB connection string (including username and password):
        ```env
        DB_CONNECTION=mongodb
        DB_URI="mongodb+srv://<your_username>:<your_password>@<your_cluster_url>/?appName=Laravel"
        DB_DATABASE=laravel
        ```
    *   **Email Configuration (SMTP):**
        Update the mail credentials to enable the application to send emails (e.g., via Gmail). If using Gmail, you will need to generate an "App Password".
        ```env
        MAIL_MAILER=smtp
        MAIL_HOST=smtp.gmail.com
        MAIL_PORT=465
        MAIL_USERNAME="your-email@gmail.com"
        MAIL_PASSWORD="your-app-password"
        MAIL_ENCRYPTION=ssl
        MAIL_FROM_ADDRESS="your-email@gmail.com"
        MAIL_FROM_NAME="${APP_NAME}"
        ```

5.  **Run Migrations & Seed the Database:**
    ```bash
    php artisan migrate
    php artisan db:seed
    ```

6.  **Start the Local Server:**
    ```bash
    php artisan serve
    ```
    The application will be accessible at `http://localhost:8000`.

## Security

Please ensure that you **never commit your `.env` file** to version control. The repository is configured to ignore this file by default.
