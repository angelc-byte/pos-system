# The Daily Fit POS Account Management

The Daily Fit POS is a CodeIgniter 4 project for managing customer and staff accounts. It implements the IT0049 TFA4 requirements for sessions and authentication while preserving the existing database-backed records from TFA3.

## Features

- Secure staff login using `password_verify()`
- Password hashing using `password_hash()`
- Session regeneration after successful login
- Authentication filter for all customer and user account routes
- Session-destroying logout workflow
- Customer and staff create, edit, search, and delete interfaces
- Optional customer and staff profile pictures with safe image validation
- A personal profile screen for updating the signed-in account and avatar
- Responsive dashboard and mobile navigation
- CSRF protection on all submitted forms
- Migration and optional demo seeder

## Requirements

- PHP 8.2 or newer
- MySQL or MariaDB
- PHP extensions: `intl`, `mbstring`, and `mysqli`
- Apache with `mod_rewrite`, or the CodeIgniter development server

## Setup with XAMPP

1. Copy the project to `C:\xampp\htdocs\pos-system`.
2. Create a MySQL database named `pos_system`.
3. Copy `env` to `.env` if `.env` is not already present.
4. In `.env`, configure the base URL and database connection:

   ```ini
   CI_ENVIRONMENT = development
   app.baseURL = 'http://localhost/pos-system/public/'
   database.default.hostname = localhost
   database.default.database = pos_system
   database.default.username = root
   database.default.password =
   database.default.DBDriver = MySQLi
   database.default.port = 3306
   ```

5. Open a terminal in the project folder and run:

   ```bash
   php spark migrate
   ```

6. If the database has no users yet, load the optional demo records:

   ```bash
   php spark db:seed PosDemoSeeder
   ```

7. Open `http://localhost/pos-system/public/`.

## Demo account

The optional seeder creates this account:

- Username: `admin`
- Password: `ChangeMe123!`

Change the seeded password after the first login. Existing user accounts and passwords are not overwritten by the seeder.

## Security flow

1. A logged-out visitor who requests a protected route is redirected to `/login`.
2. The login controller retrieves the user by username and verifies the stored password hash.
3. On success, the application regenerates the session ID and stores only the required account identifiers in the session.
4. Customer and staff routes run through `AuthFilter` before the controller is reached.
5. Logout destroys the active session and returns the visitor to the login page.

## Main routes

| Method | Route | Purpose |
| --- | --- | --- |
| GET / POST | `/login` | Show and process the staff login |
| POST | `/logout` | Destroy the current session |
| GET | `/` | Protected dashboard |
| GET / POST | `/customers/...` | Protected customer account management |
| GET / POST | `/users/...` | Protected staff account management |

## Submission notes

Do not commit a real `.env` file, database passwords, or private credentials. Submit the source repository together with either the migration and seeder files or a sanitized database export.
