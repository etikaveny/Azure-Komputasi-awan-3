<?php
// Menggunakan SQLite agar langsung berjalan otomatis tanpa setup server database terpisah
$db_file = __DIR__ . '/database.sqlite';
$pdo = new PDO('sqlite:' . $db_file);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Buat tabel 'produk' jika belum ada
$pdo->exec("CREATE TABLE IF NOT EXISTS produk (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nama_produk TEXT NOT NULL,
    harga REAL NOT NULL,
    stok INTEGER NOT NULL
)");
?>