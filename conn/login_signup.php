<?php
session_start();
include "db_connect.php";

// Tangkap data dari formulir register
if (isset($_POST['signup'])) {
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    $role = isset($_POST['role']) ? $conn->real_escape_string($_POST['role']) : 'user'; // Default role is 'user'

    // Check if the username already exists
    $sql_check_username = "SELECT * FROM users WHERE username='$username'";
    $result_check_username = $conn->query($sql_check_username);

    if ($result_check_username->num_rows > 0) {
        echo "Username sudah ada, silakan gunakan username lain.";
    } else {
        // Enkripsi password sebelum disimpan ke database
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert data ke tabel users
        $sql = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$hashed_password', '$role')";
        if ($conn->query($sql) === TRUE) {
            // Ambil id_user yang baru saja diinsert
            $id_user = $conn->insert_id;

            // Insert data ke tabel profiles
            $sql_profiles = "INSERT INTO profiles (id_user, username, email) VALUES ('$id_user', '$username', '$email')";
            if ($conn->query($sql_profiles) === TRUE) {
                echo "Registrasi berhasil!";
            } else {
                echo "Error: " . $sql_profiles . "<br>" . $conn->error;
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Tangkap data dari formulir login
if (isset($_POST['login'])) {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);

    // Cari user berdasarkan email
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role']; // Tambahkan role ke sesi

            if ($row['role'] == 'admin') {
                header("Location: galeri_pengaduan.php"); // Ganti dengan halaman admin yang sesuai
            } else {
                header("Location: index.php");
            }
            exit();
        } else {
            echo "Password salah";
        }
    } else {
        echo "Email tidak ditemukan";
    }
}

$conn->close();
?>
