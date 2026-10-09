
# The Daily Fit POS System

The Daily Fit POS is a CodeIgniter 4 application for managing customers, staff accounts, products, and sales.

## Features

- Staff authentication and session management
- Customer and staff account management
- Product catalog and product management
- Sales recording and sales history
- Responsive interface and navigation
- Customer profile pictures and application logo
- Database-backed records using MySQL or MariaDB

## Requirements

- PHP 8.2 or newer
- MySQL or MariaDB
- PHP extensions: `intl`, `mbstring`, and `mysqli`
- XAMPP or another compatible PHP development environment

## Setup with XAMPP

1. Place the project in `C:\xampp\htdocs\the-daily-fit`.
2. Create a MySQL database for the application.
3. Copy `env` to `.env` if needed.
4. Configure your database connection and application base URL in `.env`.
5. Open a terminal in the project directory and run:

   ```bash
   php spark migrate
   ```

6. Start Apache and MySQL through XAMPP.
7. Open the application using your configured local URL.

## Main Routes

| Route | Purpose |
|---|---|
| `/login` | User login |
| `/logout` | Log out |
| `/` | Dashboard |
| `/customers` | Customer management |
| `/users` | Staff account management |
| `/products` | Product catalog |
| `/products/new` | Add a product |
| `/sales` | Record sales |
| `/sales/history` | View sales history |

## Security Notes

- Keep `.env` and database credentials out of version control.
- Use secure password hashing and session management.
- Validate submitted data and uploaded files.
- Configure production settings before deployment.
