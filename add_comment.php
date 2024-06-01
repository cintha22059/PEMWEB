<?php
include "conn/db_connect.php";

// Ambil data yang dikirimkan dari form komentar
$id_pengaduan = $_POST['id_pengaduan'];
$username = $_POST['username'];
$isi_komentar = $_POST['isi_komentar'];

// Query untuk menyimpan komentar ke dalam database
$query = "INSERT INTO komentar (id_pengaduan, isi_komentar, username) VALUES ('$id_pengaduan', '$isi_komentar', '$username')";

// Eksekusi query
if (mysqli_query($conn, $query)) {
  echo "Komentar berhasil ditambahkan";
} else {
  echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

// Redirect kembali ke halaman index.php
header("Location: galeri_pengaduan.php");

// Tutup koneksi
mysqli_close($conn);
?>
