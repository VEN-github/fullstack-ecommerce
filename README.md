# Fullstack E-Commerce

## Recommended IDE Setup

- [VS Code](https://code.visualstudio.com/) + [ESLint](https://marketplace.visualstudio.com/items?itemName=dbaeumer.vscode-eslint) + [Prettier](https://marketplace.visualstudio.com/items?itemName=esbenp.prettier-vscode)

## Tech Stack

**Client:** TypeScript, TailwindCSS

**Server:** PHP, MySql

## Installation

### Prerequisite

- [Node.js](https://nodejs.org/en) - _at least version 18.20.3_
- [PHP](https://www.php.net/) - _at least version 8.2_

### Clone the project

```bash
git clone https://github.com/VEN-github/fullstack-ecommerce.git
```

### Go to the project directory

```bash
cd fullstack-ecommerce
```

### Copy the `.env.example` and named it `.env`

> This contains the environment variables such as **application environment**, **database connection**, and **url**.

```bash
cp .env.example .env
```

### Create database

> You may create the database by any method that you prefer.
> You can use `http://localhost/phpmyadmin` to create your database.

### Install composer packages

```bash
composer install
```

### Install dependencies

```bash
npm install
```

### Migrate files

```bash
php app/migrate.php
```

### Seed files

```bash
php app/seed.php
```

### Start the server

```bash
php -S localhost:8000 -t public
```

### Start the client server

```bash
npm run dev
```

### Type-Check, Compile and Minify for Production

```bash
npm run build
```

### Format with [Prettier](https://prettier.io/)

```bash
npm run format
```

### Lint with [ESLint](https://eslint.org/)

```bash
npm run lint:fix
```

### Routes

To access the admin panel, you must go to the admin subdomain `localhost:8000/admin`. This will redirect to login page if you have not started any session yet. Here is the admin credentials provided by the seeder:

**Email:** admin@invi.com\
**Password:** password
