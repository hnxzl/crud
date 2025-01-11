-- Menggunakan Database
CREATE DATABASE IF NOT EXISTS crud_db;
USE crud_db;

-- Membuat Tabel untuk Login (Users)
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(50) NOT NULL, -- Teks biasa, tidak terenkripsi
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Membuat Tabel untuk Berita
CREATE TABLE IF NOT EXISTS berita (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(255) NOT NULL,
    konten TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Menambahkan Admin Awal (Username: admin, Password: admin123)
INSERT INTO users (username, password) VALUES ('admin', 'admin123');
