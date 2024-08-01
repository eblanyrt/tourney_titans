<?php
// Menghubungkan ke database
include '../db.php';

// Mengambil ID dari URL
$id = $_GET['id'];
$nama_tabel = $_GET['nama_tabel'];
$nama_halaman = $_GET['nama_halaman'];

// Menghapus data dari database
$query = mysqli_query($conn, "DELETE FROM $nama_tabel WHERE id='$id'");

// Mengarahkan kembali ke halaman dengan nilai dari variabel nama_halaman
header("Location: $nama_halaman.php");
?>
