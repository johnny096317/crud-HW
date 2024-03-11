CREATE DATABASE IF NOT EXISTS HW;
USE HW;

CREATE TABLE member (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50),
  phone VARCHAR(20)
);

CREATE TABLE orders (
  id INT AUTO_INCREMENT PRIMARY KEY,
  amount DECIMAL(10, 2),
  member_id INT,
  FOREIGN KEY (member_id) REFERENCES member(id) ON DELETE CASCADE
);


INSERT INTO member (name, phone) VALUES ('John Doe', '1234567890');
INSERT INTO member (name, phone) VALUES ('Alice Smith', '9876543210');
INSERT INTO member (name, phone) VALUES ('Bob Johnson', '5551234567');


INSERT INTO orders (amount, member_id) VALUES (100.00, 1);
INSERT INTO orders (amount, member_id) VALUES (150.00, 1);
INSERT INTO orders (amount, member_id) VALUES (200.00, 1);
INSERT INTO orders (amount, member_id) VALUES (80.00, 2);
INSERT INTO orders (amount, member_id) VALUES (120.00, 2);
INSERT INTO orders (amount, member_id) VALUES (180.00, 2);
INSERT INTO orders (amount, member_id) VALUES (50.00, 3);
INSERT INTO orders (amount, member_id) VALUES (70.00, 3);
INSERT INTO orders (amount, member_id) VALUES (90.00, 3);
