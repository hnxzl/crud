CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);
-- Membuat Database
CREATE DATABASE crud_db;

-- Menggunakan Database
USE crud_db;

-- Membuat Tabel Berita
CREATE TABLE berita (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(255) NOT NULL,
    konten TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Membuat Tabel Users (Login)
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Menambahkan Data Dummy ke Tabel Berita
INSERT INTO berita (judul, konten) VALUES
('Berita 1', 'Konten berita pertama'),
('Berita 2', 'Konten berita kedua'),
('Berita 3', 'Konten berita ketiga');

-- Menambahkan User Admin untuk Login (Gunakan hash password)
-- Contoh hash password untuk 'password_admin' adalah: $2y$10$V4OMCzg/xyMIye5LT4mPG.K73TT4wPz8OZRbtWq.FZAzHx5zwIoBW
INSERT INTO users (username, password) VALUES
('admin', '$2y$10$V4OMCzg/xyMIye5LT4mPG.K73TT4wPz8OZRbtWq.FZAzHx5zwIoBW');
