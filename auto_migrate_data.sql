-- Srikandi Travel Database Migration
-- Created: 2025-08-04 11:15:28

CREATE DATABASE IF NOT EXISTS srikandi_travel;
USE srikandi_travel;

-- Admin Users
INSERT INTO admin_users (username, email, password, name, role, is_active, created_at, updated_at) VALUES ('srikanditravel', 'srikanditravel@gmail.com', '$2y$12$jH9AOtpHOfwqLLIqBnKQaOQ1Kcdq7NUJ3PTaW9ZAqj0OkbCoBvJze', 'Srikandi Travel Admin', 'admin', 1, '2025-08-04 08:47:16', '2025-08-04 10:38:57');

-- Packages
INSERT INTO packages (name, destination, description, price, duration, mode, category, is_active, created_at, updated_at) VALUES ('umroh 2', 'makkah', 'ibadah', 28000000, '3 hari 2 malam', 'umroh', '', 1, '2025-08-04 09:37:43', '2025-08-04 09:37:43');
INSERT INTO packages (name, destination, description, price, duration, mode, category, is_active, created_at, updated_at) VALUES ('Paket Travel Singapura', 'Singapore', 'Paket travel ke Singapura dengan akomodasi bintang 3, termasuk tiket pesawat dan hotel.', 5000000, '4 Hari', 'travel', 'internasional', 1, '2025-08-04 09:43:52', '2025-08-04 09:48:54');
INSERT INTO packages (name, destination, description, price, duration, mode, category, is_active, created_at, updated_at) VALUES ('Paket Travel Bali', 'Bali', 'Paket travel domestik ke Bali dengan akomodasi bintang 4, termasuk tiket pesawat dan hotel.', 3000000, '5 Hari', 'travel', 'domestik', 1, '2025-08-04 09:43:52', '2025-08-04 09:49:06');

-- Schedules
INSERT INTO schedules (destination, date, description, mode, is_active, created_at, updated_at) VALUES ('Bali', '2024-02-15 00:00:00', 'Keberangkatan ke Bali dengan maskapai Garuda Indonesia', 'travel', 1, '2025-08-04 08:47:16', '2025-08-04 08:47:16');
INSERT INTO schedules (destination, date, description, mode, is_active, created_at, updated_at) VALUES ('Yogyakarta', '2024-02-20 00:00:00', 'Keberangkatan ke Yogyakarta dengan kereta api Argo Bromo Anggrek', 'travel', 1, '2025-08-04 08:47:16', '2025-08-04 08:47:16');
INSERT INTO schedules (destination, date, description, mode, is_active, created_at, updated_at) VALUES ('Singapura', '2024-02-25 00:00:00', 'Keberangkatan ke Singapura dengan maskapai Singapore Airlines', 'travel', 1, '2025-08-04 08:47:16', '2025-08-04 08:47:16');
INSERT INTO schedules (destination, date, description, mode, is_active, created_at, updated_at) VALUES ('Thailand', '2024-03-01 00:00:00', 'Keberangkatan ke Thailand dengan maskapai Thai Airways', 'travel', 1, '2025-08-04 08:47:16', '2025-08-04 08:47:16');
INSERT INTO schedules (destination, date, description, mode, is_active, created_at, updated_at) VALUES ('Makkah & Madinah', '2024-02-10 00:00:00', 'Keberangkatan umroh reguler dengan maskapai Saudia Airlines', 'umroh', 1, '2025-08-04 08:47:16', '2025-08-04 08:47:16');
INSERT INTO schedules (destination, date, description, mode, is_active, created_at, updated_at) VALUES ('Makkah, Madinah & Yerusalem', '2024-02-15 00:00:00', 'Keberangkatan umroh plus Aqso dengan maskapai Royal Jordanian', 'umroh', 1, '2025-08-04 08:47:16', '2025-08-04 08:47:16');
INSERT INTO schedules (destination, date, description, mode, is_active, created_at, updated_at) VALUES ('Makkah & Madinah', '2024-03-01 00:00:00', 'Keberangkatan umroh VIP dengan maskapai Emirates', 'umroh', 1, '2025-08-04 08:47:16', '2025-08-04 08:47:16');
INSERT INTO schedules (destination, date, description, mode, is_active, created_at, updated_at) VALUES ('Tokyo, Osaka, Kyoto', '2024-06-15 00:00:00', 'Paket wisata ke Jepang dengan akomodasi bintang 4', 'travel', 1, '2025-08-04 09:56:29', '2025-08-04 09:56:29');
INSERT INTO schedules (destination, date, description, mode, is_active, created_at, updated_at) VALUES ('Singapore', '2024-06-20 00:00:00', 'Paket wisata ke Singapura dengan Universal Studios', 'travel', 1, '2025-08-04 09:56:29', '2025-08-04 09:56:29');
INSERT INTO schedules (destination, date, description, mode, is_active, created_at, updated_at) VALUES ('Bali', '2024-06-25 00:00:00', 'Paket wisata domestik ke Bali dengan akomodasi resort', 'travel', 1, '2025-08-04 09:56:29', '2025-08-04 09:56:29');
INSERT INTO schedules (destination, date, description, mode, is_active, created_at, updated_at) VALUES ('Makkah & Madinah', '2024-07-01 00:00:00', 'Paket umroh reguler dengan akomodasi bintang 3', 'umroh', 1, '2025-08-04 09:56:29', '2025-08-04 09:56:29');
INSERT INTO schedules (destination, date, description, mode, is_active, created_at, updated_at) VALUES ('Makkah & Madinah', '2024-07-10 00:00:00', 'Paket umroh plus dengan akomodasi bintang 4', 'umroh', 1, '2025-08-04 09:56:29', '2025-08-04 09:56:29');

-- Galleries
INSERT INTO galleries (caption, image, mode, is_active, created_at, updated_at) VALUES ('Candi Borobudur, Yogyakarta', 'galleries/DWyI8NEJphdkHhBFZXcRNmZqu8fcsp187JNEwl6U.jpg', 'travel', 1, '2025-08-04 08:47:16', '2025-08-04 09:49:48');
INSERT INTO galleries (caption, image, mode, is_active, created_at, updated_at) VALUES ('Marina Bay Sands, Singapura', 'singapore-marina.jpg', 'travel', 1, '2025-08-04 08:47:16', '2025-08-04 08:47:16');
INSERT INTO galleries (caption, image, mode, is_active, created_at, updated_at) VALUES ('Wat Phra Kaew, Bangkok', 'thailand-temple.jpg', 'travel', 1, '2025-08-04 08:47:16', '2025-08-04 08:47:16');
INSERT INTO galleries (caption, image, mode, is_active, created_at, updated_at) VALUES ('Ka\'bah, Masjidil Haram', 'kaaba.jpg', 'umroh', 1, '2025-08-04 08:47:16', '2025-08-04 08:47:16');
INSERT INTO galleries (caption, image, mode, is_active, created_at, updated_at) VALUES ('Masjid Nabawi, Madinah', 'galleries/pT9JCYnau8rqiB4A6ViFOtyCi2QSsKIOLKOIp03R.png', 'umroh', 1, '2025-08-04 08:47:16', '2025-08-04 09:50:00');
INSERT INTO galleries (caption, image, mode, is_active, created_at, updated_at) VALUES ('Masjid Al-Aqsa, Yerusalem', 'masjid-aqsa.jpg', 'umroh', 1, '2025-08-04 08:47:16', '2025-08-04 08:47:16');
INSERT INTO galleries (caption, image, mode, is_active, created_at, updated_at) VALUES ('Blue Mosque, Istanbul', 'istanbul-mosque.jpg', 'umroh', 1, '2025-08-04 08:47:16', '2025-08-04 08:47:16');
INSERT INTO galleries (caption, image, mode, is_active, created_at, updated_at) VALUES ('Tokyo Tower at Night', '', 'travel', 1, '2025-08-04 09:56:29', '2025-08-04 09:56:29');
INSERT INTO galleries (caption, image, mode, is_active, created_at, updated_at) VALUES ('Universal Studios Singapore', '', 'travel', 1, '2025-08-04 09:56:29', '2025-08-04 09:56:29');
INSERT INTO galleries (caption, image, mode, is_active, created_at, updated_at) VALUES ('Bali Beach Sunset', '', 'travel', 1, '2025-08-04 09:56:29', '2025-08-04 09:56:29');
INSERT INTO galleries (caption, image, mode, is_active, created_at, updated_at) VALUES ('Kaaba in Makkah', '', 'umroh', 1, '2025-08-04 09:56:29', '2025-08-04 09:56:29');
INSERT INTO galleries (caption, image, mode, is_active, created_at, updated_at) VALUES ('Prophet Mosque in Madinah', '', 'umroh', 1, '2025-08-04 09:56:29', '2025-08-04 09:56:29');

-- Customers
INSERT INTO customers (name, email, phone, address, id_number, passport_number, visa_number, birth_date, gender, status, total_payment, paid_amount, travel_date, notes, package_id, created_at, updated_at) VALUES ('Asaddullah Al Haddad', 'hellosad3@gmail.com', '085159991030', 'Jalan Raya Cikampak
Desa Bojongrangkas', '000', '0000', '000', '2025-08-01 00:00:00', 'male', 'pending', 28000000.00, 5000000.00, '2025-08-13 00:00:00', '', 4, '2025-08-04 10:08:35', '2025-08-04 10:08:35');
INSERT INTO customers (name, email, phone, address, id_number, passport_number, visa_number, birth_date, gender, status, total_payment, paid_amount, travel_date, notes, package_id, created_at, updated_at) VALUES ('Ahmad Lunas', 'ahmad@example.com', '081234567890', 'Jl. Sudirman No. 123', '1234567890123456', 'A12345678', 'V123456', '1990-01-01 00:00:00', 'male', 'confirmed', 28000000.00, 28000000.00, '2024-06-15 00:00:00', 'Customer lunas', 4, '2025-08-04 10:10:24', '2025-08-04 10:10:24');
INSERT INTO customers (name, email, phone, address, id_number, passport_number, visa_number, birth_date, gender, status, total_payment, paid_amount, travel_date, notes, package_id, created_at, updated_at) VALUES ('Budi Cicilan', 'budi@example.com', '081234567891', 'Jl. Thamrin No. 456', '1234567890123457', 'B12345678', 'V123457', '1985-05-15 00:00:00', 'male', 'confirmed', 28000000.00, 15000000.00, '2024-06-20 00:00:00', 'Customer cicilan', 4, '2025-08-04 10:10:24', '2025-08-04 10:10:24');
INSERT INTO customers (name, email, phone, address, id_number, passport_number, visa_number, birth_date, gender, status, total_payment, paid_amount, travel_date, notes, package_id, created_at, updated_at) VALUES ('Citra Belum Bayar', 'citra@example.com', '081234567892', 'Jl. Gatot Subroto No. 789', '1234567890123458', 'C12345678', 'V123458', '1992-12-25 00:00:00', 'female', 'pending', 28000000.00, 0.00, '2024-07-01 00:00:00', 'Customer belum bayar', 4, '2025-08-04 10:10:24', '2025-08-04 10:10:24');
INSERT INTO customers (name, email, phone, address, id_number, passport_number, visa_number, birth_date, gender, status, total_payment, paid_amount, travel_date, notes, package_id, created_at, updated_at) VALUES ('Dewi Overpaid', 'dewi@example.com', '081234567893', 'Jl. Sudirman No. 999', '1234567890123459', 'D12345678', 'V123459', '1988-08-08 00:00:00', 'female', 'confirmed', 28000000.00, 30000000.00, '2024-07-10 00:00:00', 'Customer overpaid', 4, '2025-08-04 10:10:24', '2025-08-04 10:10:24');
