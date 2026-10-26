<?php
require 'db.php';

// Ambil semua data produk
$stmt = $pdo->query("SELECT * FROM produk ORDER BY id DESC");
$produks = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Aplikasi CRUD Produk - Azure</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background-color: #f8f9fa; }
        h2 { color: #333; }
        a { text-decoration: none; padding: 8px 12px; background: #007bff; color: white; border-radius: 4px; }
        a.btn-edit { background: #ffc107; color: black; }
        a.btn-hapus { background: #dc3545; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; background: white; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #007bff; color: white; }
    </style>
</head>
<body>
    <h2>Data Produk (CRUD Azure)</h2>
    <p>Mahasiswa: Veny Etika Dzakiyyah (102062400108)</p>
    
    <a href="tambah.php">+ Tambah Produk Baru</a>
    
    <table>
        <tr>
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Harga (Rp)</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
        <?php if (count($produks) > 0): ?>
            <?php foreach ($produks as $p): ?>
            <tr>
                <td><?= $p['id'] ?></td>
                <td><?= htmlspecialchars($p['nama_produk']) ?></td>
                <td><?= number_format($p['harga'], 0, ',', '.') ?></td>
                <td><?= $p['stok'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $p['id'] ?>" class="btn-edit">Edit</a>
                    <a href="hapus.php?id=<?= $p['id'] ?>" class="btn-hapus" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="5" style="text-align: center;">Belum ada data produk.</td></tr>
        <?php endif; ?>
    </table>
</body>
</html>