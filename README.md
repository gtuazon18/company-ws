# Laravel Vue Company Management

## Requirements

- PHP >= 8.1
- Composer
- Node.js
- NPM or Yarn
- MySQL or any other database supported by Laravel
- Mailtrap or Mailgun account for email notifications

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/your-username/laravel-vue-company-management.git
   ```

2. Navigate to the project folder:

   ```bash
   cd company-ws
   ```

3. Install Composer dependencies:

   ```bash
   composer install
   ```

4. Install NPM dependencies:

Inside the company-app folder

```bash
npm install
```

or with Yarn:

```bash
yarn
```

5. Copy the `.env.example` file to create a `.env` file:

   ```bash
   cp .env.example .env
   ```

6. Generate an application key:

   ```bash
   php artisan key:generate
   ```

7. Configure your database and mail settings in the `.env` file.

8. Run database migrations and seeders:

   ```bash
   php artisan migrate --seed
   ```

   Follow by command

   ```bash
   php artisan storage:link
   ```

9. Build assets:

   ```bash
   npm run dev
   ```

   or for production:

   ```bash
   npm run production
   ```

10. Start the development server:

    ```bash
    php artisan serve
    ```

    Visit [http://localhost:8000] in your browser.

## Contributing

Feel free to contribute to this project by opening issues or creating pull requests.

## License

This project is open-sourced software licensed under the [MIT license](LICENSE).
