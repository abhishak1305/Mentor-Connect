# How to Run the Project Locally

Follow these steps to set up and run the project on your local machine.

### 1. Install Dependencies

First, install the PHP and JavaScript dependencies:

```powershell
# Install PHP dependencies
composer install

# Install JavaScript dependencies
npm install
```

### 2. Environment Setup

Create your `.env` file from the example:

```powershell
cp .env.example .env
```

*Note: Make sure to update the `.env` file with your database (MongoDB) and mail credentials.*

### 3. Generate Application Key

```powershell
php artisan key:generate
```

### 4. Run Migrations & Seeders

```powershell
# Run database migrations
php artisan migrate

# Seed the database (optional, for test data)
php artisan db:seed
```

### 5. Start the Development Servers

You need to run both the Laravel server and the Vite server:

**Terminal 1 (Laravel Server):**
```powershell
php artisan serve
```

**Terminal 2 (Vite/Frontend):**
```powershell
npm run dev
```

The application will be accessible at `http://localhost:8000`.
