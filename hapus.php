<?php
require 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM produk WHERE id = ?");
    $stmt->execute([$id]);
    $produk = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($produk) {
        $stmt = $pdo->prepare("DELETE FROM produk WHERE id = ?");
        $stmt->execute([$id]);
    }
}

header("Location: index.php");
exit;
?>