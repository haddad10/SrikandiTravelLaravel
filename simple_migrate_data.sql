-- Srikandi Travel Database Migration
-- Created: 2025-08-04 13:18:19

CREATE DATABASE IF NOT EXISTS srikandi_travel;
USE srikandi_travel;

-- Admin Users
INSERT INTO admin_users (username, email, password, name, role, is_active, created_at, updated_at) VALUES ('srikanditravel', 'srikanditravel@gmail.com', '$2y$12$jH9AOtpHOfwqL8XqYzK8UOqYzK8UOqYzK8UOqYzK8UOqYzK8UOqYzK8UO', 'Srikandi Travel Admin', 'admin', 1, NOW(), NOW());

-- Packages
INSERT INTO packages (name, destination, description, price, duration, mode, category, is_active, created_at, updated_at) VALUES ('umroh 2', 'makkah', 'Paket umroh reguler', 28000000, '3 hari 2 malam', 'umroh', NULL, 1, NOW(), NOW()), ('Paket Travel Singapura', 'Singapore', 'Paket wisata ke Singapura', 5000000, '4 Hari', 'travel', 'internasional', 1, NOW(), NOW()), ('Paket Travel Bali', 'Bali', 'Paket wisata ke Bali', 3000000, '5 Hari', 'travel', 'domestik', 1, NOW(), NOW());

-- Schedules
INSERT INTO schedules (destination, date, description, mode, is_active, created_at, updated_at) VALUES ('Bali', '2024-02-15', 'Keberangkatan ke Bali dengan maskapai Garuda Indonesia', 'travel', 1, NOW(), NOW()), ('Makkah & Madinah', '2024-02-10', 'Keberangkatan umroh reguler dengan maskapai Saudia Airlines', 'umroh', 1, NOW(), NOW()), ('Singapore', '2024-02-25', 'Keberangkatan ke Singapura dengan maskapai Singapore Airlines', 'travel', 1, NOW(), NOW());

-- Galleries
INSERT INTO galleries (caption, image, mode, is_active, created_at, updated_at) VALUES ('Candi Borobudur, Yogyakarta', 'borobudur.jpg', 'travel', 1, NOW(), NOW()), ('Ka''bah, Masjidil Haram', 'kaaba.jpg', 'umroh', 1, NOW(), NOW()), ('Marina Bay Sands, Singapura', 'singapore-marina.jpg', 'travel', 1, NOW(), NOW());

-- Customers
INSERT INTO customers (name, email, phone, address, id_number, passport_number, visa_number, birth_date, gender, status, total_payment, paid_amount, travel_date, notes, package_id, created_at, updated_at) VALUES ('Asaddullah Al Haddad', 'hellosad3@gmail.com', '085159991030', 'Jakarta', '1234567890123456', 'A12345678', 'V123456789', '1990-01-01', 'male', 'confirmed', 28000000, 28000000, '2024-03-01', 'Lunas', 1, NOW(), NOW()), ('Budi Cicilan', 'budi@example.com', '081234567891', 'Bandung', '1234567890123457', 'A12345679', 'V123456790', '1985-05-15', 'male', 'confirmed', 28000000, 15000000, '2024-03-15', 'Dana Masuk', 1, NOW(), NOW()), ('Citra Belum Bayar', 'citra@example.com', '081234567892', 'Surabaya', '1234567890123458', 'A12345680', 'V123456791', '1992-08-20', 'female', 'pending', 28000000, 0, '2024-04-01', 'Belum Bayar', 1, NOW(), NOW());

