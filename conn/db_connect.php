<?php
$servername = "localhost"; // Nama server
$username = "root"; // Nama pengguna MySQL
$password = ""; // Kata sandi MySQL
$dbname = "public_web_services"; // Nama database yang telah Anda buat

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

?>
