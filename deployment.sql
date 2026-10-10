SET NAMES utf8mb4;
SET time_zone = '+08:00';

CREATE TABLE IF NOT EXISTS users (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  username VARCHAR(80) NOT NULL,
  password VARCHAR(255) NOT NULL,
  email VARCHAR(150) NOT NULL,
  full_name VARCHAR(120) NOT NULL,
  avatar VARCHAR(255) NULL,
  created_at DATETIME NULL,
  PRIMARY KEY (id),
  UNIQUE KEY users_username_unique (username),
  UNIQUE KEY users_email_unique (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS customers (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  full_name VARCHAR(120) NOT NULL,
  email VARCHAR(150) NOT NULL,
  phone VARCHAR(30) NULL,
  avatar VARCHAR(255) NULL,
  created_at DATETIME NULL,
  PRIMARY KEY (id),
  UNIQUE KEY customers_email_unique (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS products (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  category VARCHAR(100) NOT NULL,
  price DECIMAL(10,2) NOT NULL DEFAULT 0.00,
  stock_quantity INT UNSIGNED NOT NULL DEFAULT 0,
  image VARCHAR(2048) NULL,
  created_at DATETIME NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS sales (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  product_id INT UNSIGNED NOT NULL,
  customer_id INT UNSIGNED NULL,
  sold_by INT UNSIGNED NOT NULL,
  quantity INT UNSIGNED NOT NULL,
  total_price DECIMAL(12,2) NOT NULL,
  created_at DATETIME NOT NULL,
  PRIMARY KEY (id),
  KEY sales_product_id_index (product_id),
  KEY sales_customer_id_index (customer_id),
  KEY sales_sold_by_index (sold_by),
  CONSTRAINT sales_product_fk FOREIGN KEY (product_id) REFERENCES products (id),
  CONSTRAINT sales_customer_fk FOREIGN KEY (customer_id) REFERENCES customers (id) ON DELETE SET NULL,
  CONSTRAINT sales_user_fk FOREIGN KEY (sold_by) REFERENCES users (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS ci_sessions (
  id VARCHAR(128) NOT NULL,
  ip_address VARCHAR(45) NOT NULL,
  timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
  data BLOB NOT NULL,
  PRIMARY KEY (id),
  KEY ci_sessions_timestamp (timestamp)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO users (username, password, email, full_name, created_at)
SELECT 'admin', '$2y$10$ni4.Ac/mL1qm0FF8NfG77u5s/mj0PjmXwdwXsU7mzt6i6kzFGbN.e', 'admin@example.com', 'POS Administrator', NOW()
WHERE NOT EXISTS (SELECT 1 FROM users WHERE username = 'admin');

INSERT INTO customers (full_name, email, phone, created_at)
SELECT 'Jordan Reyes', 'jordan@example.com', '0917 555 0142', NOW()
WHERE NOT EXISTS (SELECT 1 FROM customers WHERE email = 'jordan@example.com');

INSERT INTO customers (full_name, email, phone, created_at)
SELECT 'Mika Santos', 'mika@example.com', '0918 555 0198', NOW()
WHERE NOT EXISTS (SELECT 1 FROM customers WHERE email = 'mika@example.com');

INSERT INTO products (name, category, price, stock_quantity, image, created_at)
SELECT 'Classic White Tee', 'Tops', 499.00, 25, NULL, NOW()
WHERE NOT EXISTS (SELECT 1 FROM products WHERE name = 'Classic White Tee');

INSERT INTO products (name, category, price, stock_quantity, image, created_at)
SELECT 'Everyday Denim', 'Bottoms', 1299.00, 15, NULL, NOW()
WHERE NOT EXISTS (SELECT 1 FROM products WHERE name = 'Everyday Denim');
