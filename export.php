<?php
include "koneksi.php";
if (!isset($_SESSION['login'])) { exit; }

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=Rekap_GlowFlora_' . date('Y-m-d') . '.csv');

$output = fopen('php://output', 'w');
fputcsv($output, array('ID', 'Nama Produk', 'Harga', 'Stok', 'Deskripsi'));

$query = mysqli_query($conn, "SELECT id, nama, harga, stok, deskripsi FROM produk ORDER BY id DESC");
while ($row = mysqli_fetch_assoc($query)) {
    fputcsv($output, $row);
}

fclose($output);
exit;
?>