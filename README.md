# PHP Task API DDD

This is a PHP & Laravel-based RESTful API that manages tasks using Domain Driven Design (DDD) architecture. The API allows users to create, read, update, and delete tasks.

## Table of Contents

-   Installation
-   Usage
-   Endpoints
-   Contributing
-   License

## Installation

Clone the repository:

```bash
git clone https://github.com/BaseMax/PHPTaskDDD.git
```

Install dependencies using Composer:

```bash
cd PHPTaskDDD
composer install
```

Create .env file:

```bash
cp .env.example .env
```

Configure the database connection in .env file.

Run the database migration:

```bash
php artisan migrate
```

## Usage

Start the artisan(a command-line tool) server:

```bash
php artisan serve
```

Use your preferred HTTP client to make requests to the API endpoints.

## Endpoints

The API has the following endpoints:

-   `GET /tasks`
    Returns a list of all tasks.

-   `GET /tasks/{id}`
    Returns a single task by ID.

-   `POST /tasks`
    Creates a new task.

-   `PUT /tasks/{id}`
    Updates an existing task by ID.

-   `DELETE /tasks/{id}`
    Deletes a task by ID.

## Contributing

Contributions are welcome! To contribute, please follow these steps:

-   Fork the repository.
-   Create a new branch for your feature.
-   Make your changes and commit them with clear commit messages.
-   Push your branch to your fork of the repository.
-   Create a pull request to the main repository.

## License

This project is licensed under the GPL-3.0 license.
