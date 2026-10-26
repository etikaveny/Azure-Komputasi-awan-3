<?php
require 'db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM produk WHERE id = ?");
$stmt->execute([$id]);
$produk = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $stmt = $pdo->prepare("UPDATE produk SET nama_produk = ?, harga = ?, stok = ? WHERE id = ?");
    $stmt->execute([$nama, $harga, $stok, $id]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Produk</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        form { background: white; padding: 20px; width: 300px; border: 1px solid #ddd; border-radius: 5px; }
        input { width: 100%; padding: 8px; margin: 8px 0; box-sizing: border-box; }
        button { background: #ffc107; color: black; padding: 10px; border: none; width: 100%; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>
    <h2>Edit Produk</h2>
    <form method="POST">
        <label>Nama Produk:</label>
        <input type="text" name="nama_produk" value="<?= htmlspecialchars($produk['nama_produk']) ?>" required>
        
        <label>Harga:</label>
        <input type="number" name="harga" value="<?= $produk['harga'] ?>" required>
        
        <label>Stok:</label>
        <input type="number" name="stok" value="<?= $produk['stok'] ?>" required>
        
        <button type="submit">Update</button>
    </form>
    <br>
    <a href="index.php">Kembali</a>
</body>
</html>