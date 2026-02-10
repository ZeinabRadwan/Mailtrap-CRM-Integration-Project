# Mailtrap CRM Integration Project

A Laravel application for sending transactional and campaign emails with CRM-style contact management. It integrates with [Mailtrap](https://mailtrap.io) (or any SMTP provider) for email delivery and keeps a log of sent emails with optional monthly limits.

## What This Project Does

- **Send emails** to custom recipient lists, to all **Customers**, or to all **Clients (Follow-up)** from the database.
- **Personalize messages** using a `{{ $name }}` placeholder that is replaced with each recipient’s name.
- **Log every send** (recipient, subject, message, status) and view history on the Email Logs page.
- **Enforce a monthly sending limit** (e.g. 5 emails/month) on the subscribe/send flow.
- **Use Mailtrap** (or another SMTP server) for development and testing without sending real email.

## Tech Stack

- **Laravel 12** (PHP 8.2+)
- **SQLite** by default (configurable in `.env`)
- **Laravel Breeze** for authentication
- **Tailwind CSS** and **Vite** for the frontend
- **Laravel Mail** with SMTP (e.g. Mailtrap) or log driver

## Features

| Feature | Route | Description |
|--------|--------|-------------|
| Welcome | `/` | Home page |
| Send test email | `/send-test-email/{email}` | Sends a single test email to the given address |
| Send to multiple | `/send-multiple` | Form to send one subject/message to a list of emails (with names). Logs to Email Logs. |
| Send to customers | `/send-to-customers` | Sends to all records in the **customers** table (personalized by name) |
| Send to clients | `/send-to-clients` | Sends to all records in the **clients_follow_up** table (personalized by name) |
| Subscribe / send | `/subscribe-send-email` | Send with custom From name/email; respects monthly limit and logs to Email Logs |
| Email logs | `/email-logs` | View all sent/failed emails, count for current month, and monthly limit |

## Data Models

- **Customer**: `ar_name`, `en_name`, `email`
- **ClientsFollowUp** (table: `clients_follow_up`): `ar_name`, `email`
- **EmailLog**: `recipient_name`, `recipient_email`, `subject`, `message`, `status` (sent/failed), timestamps

## Setup

### 1. Clone and install

```bash
composer install
cp .env.example .env
php artisan key:generate
```

### 2. Database

Using SQLite (default):

```bash
touch database/database.sqlite
php artisan migrate
```

Optional: seed sample customers and clients:

```bash
php artisan db:seed
```

To use MySQL/PostgreSQL, set `DB_CONNECTION`, `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` in `.env` and run `php artisan migrate`.

### 3. Mail (Mailtrap or SMTP)

For **Mailtrap**, in `.env` set:

```env
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_mailtrap_username
MAIL_PASSWORD=your_mailtrap_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="noreply@yourdomain.com"
MAIL_FROM_NAME="${APP_NAME}"
```

For **local testing without sending real email**, use the log driver:

```env
MAIL_MAILER=log
```

Messages will be written to `storage/logs/laravel.log`.

### 4. Frontend and run

```bash
npm install
npm run dev
```

In another terminal:

```bash
php artisan serve
```

Open `http://localhost:8000` (or your configured `APP_URL`).

## Configuration

- **Monthly limit** for the subscribe/send feature is set in code (e.g. `$monthlyLimit = 5` in `routes/web.php`). Adjust there if needed.
- **Queue**: default is `QUEUE_CONNECTION=database`. For background sending, run `php artisan queue:work` (or use the `dev` script that includes queue and logs).

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
