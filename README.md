# LaporCak! 📢

LaporCak! is a web application for reporting and tracking issues or incidents. It allows users to submit reports, track the status of their reports, and view the history of each report.

## Table of Contents

- [LaporCak! 📢](#laporcak-)
  - [Table of Contents](#table-of-contents)
  - [Features](#features)
  - [Technologies Used](#technologies-used)
  - [Getting Started](#getting-started)
  - [Contributing](#contributing)
  - [License](#license)

## Features

- **User Registration and Authentication:** Operators can create accounts and log in to access the verification and logging features.
- **Report Submission:** Users can submit new reports by providing details such as the issue's title, description, category, and any accompanying images.
- **Report Tracking:** Users can track the status of their submitted reports using a unique ticket ID.
- **Report Verification:** Operators can verify and manage incoming reports.
- **Activity Logging:** All actions related to reports and user interactions are logged for auditing purposes.

## Technologies Used

- [**Laravel 8.1:**](https://laravel.com/docs/10.x) A PHP web application framework for building robust web applications.
- [**Bootstrap 5.2.3:**](https://getbootstrap.com/docs/5.2) A popular CSS framework for responsive web design.
- [**Vite 4.0.0:**](https://vitejs.dev/guide/) A build tool for modern web development.
- [**Spatie Media Library 10.11:**](https://spatie.be/docs/laravel-medialibrary/v10/introduction) A package for managing file uploads and media.
- [**Spatie Activitylog 4.7:**](https://spatie.be/docs/laravel-activitylog/v4/introduction) A package for activity logging and auditing.
- [**realrashid/sweet-alert 7.1:**](https://realrashid.github.io/sweet-alert/) A JavaScript library for displaying beautiful and customizable alerts.
- [**Yajra Laravel Datatables 10.1:**](https://yajrabox.com/docs/laravel-datatables/10.0/) A package for creating and managing datatables in Laravel.
- [**Laravel Sanctum 3.2:**](https://laravel.com/docs/8.x/sanctum) A package for API authentication and CORS support in Laravel.
- [**laravel/ui 4.2:**](https://github.com/laravel/ui) Laravel's frontend scaffolding package for UI presets.

## Getting Started

1. Clone this repository:

   ```bash
   git clone https://github.com/amrimuf/lapor-cak.git
   cd lapor-cak
   ```
2. Install PHP dependencies: `composer install`
3. Install JavaScript dependencies: `npm install`
4. Create a new .env file: `cp .env.example .env` 
5. Generate an application key: `php artisan key:generate`
6. Set up your database connection in the `.env` file
7. Run database migrations and seeders: `php artisan migrate --seed`
8. Create a symbolic link: `php artisan storage:link`
9. Compile your assets: `npm run dev`
10. Start the development server: `php artisan serve`

## Contributing

Contributions are welcome! Please open an issue or submit a pull request for any improvements or bug fixes.

## License

This project is open-source and available under the [MIT License](LICENSE).
