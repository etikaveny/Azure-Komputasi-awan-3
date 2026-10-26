<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $stmt = $pdo->prepare("INSERT INTO produk (nama_produk, harga, stok) VALUES (?, ?, ?)");
    $stmt->execute([$nama, $harga, $stok]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        form { background: white; padding: 20px; width: 300px; border: 1px solid #ddd; border-radius: 5px; }
        input { width: 100%; padding: 8px; margin: 8px 0; box-sizing: border-box; }
        button { background: #28a745; color: white; padding: 10px; border: none; width: 100%; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>
    <h2>Tambah Produk Baru</h2>
    <form method="POST">
        <label>Nama Produk:</label>
        <input type="text" name="nama_produk" required>
        
        <label>Harga:</label>
        <input type="number" name="harga" required>
        
        <label>Stok:</label>
        <input type="number" name="stok" required>
        
        <button type="submit">Simpan</button>
    </form>
    <br>
    <a href="index.php">Kembali</a>
</body>
</html>