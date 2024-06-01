<?php
session_start();
include "db_connect.php";

// Ensure the user is logged in and has a session
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];

// Fetch user profile data
$sql = "SELECT * FROM profiles WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $profile = $result->fetch_assoc();
} else {
    // Handle the case where no profile exists
    $profile = [
        'nama_lengkap' => '',
        'nomor_telefon' => '',
        'alamat_rumah' => '',
        'email' => '',
        'nik' => '',
        'tanggal_lahir' => '',
        'jenis_kelamin' => ''
    ];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_lengkap = $conn->real_escape_string($_POST['nama_lengkap']);
    $nomor_telefon = $conn->real_escape_string($_POST['nomor_telefon']);
    $alamat_rumah = $conn->real_escape_string($_POST['alamat_rumah']);
    $email = $conn->real_escape_string($_POST['email']);
    $nik = $conn->real_escape_string($_POST['nik']);
    $tanggal_lahir = $conn->real_escape_string($_POST['tanggal_lahir']);
    $jenis_kelamin = $conn->real_escape_string($_POST['jenis_kelamin']);

    // Check if the record already exists (update) or not (insert)
    $sql = "SELECT id FROM profiles WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Update the record
        $sql = "UPDATE profiles SET nama_lengkap='$nama_lengkap', nomor_telefon='$nomor_telefon', alamat_rumah='$alamat_rumah', email='$email', nik='$nik', tanggal_lahir='$tanggal_lahir', jenis_kelamin='$jenis_kelamin' WHERE username='$username'";
    } else {
        // Insert a new record
        $sql = "INSERT INTO profiles (username, nama_lengkap, nomor_telefon, alamat_rumah, email, nik, tanggal_lahir, jenis_kelamin) VALUES ('$username', '$nama_lengkap', '$nomor_telefon', '$alamat_rumah', '$email', '$nik', '$tanggal_lahir', '$jenis_kelamin')";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Record updated/inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close(); 
?>