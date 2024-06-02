<?php
include "conn/sesion.php";
include "conn/db_connect.php";

if (isset($_POST["submit"])) {
    $category = $_POST["category"];
    $wilayah = $_POST["wilayah"];
    $judul_pengaduan = $_POST["judul_pengaduan"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Mengambil konten file gambar dan video
    $image = $_FILES["image"]["tmp_name"];
    $video = $_FILES["video"]["tmp_name"];

    // Mengubah file gambar dan video menjadi base64
    $image_base64 = !empty($image) ? base64_encode(file_get_contents($image)) : null;
    $video_base64 = !empty($video) ? base64_encode(file_get_contents($video)) : null;

    // Insert data ke tabel pengaduan
    $sql_pengaduan = "INSERT INTO pengaduan (kategori_pengaduan, wilayah, judul_pengaduan, nama, email, pesan, gambar, video) VALUES ('$category', '$wilayah', '$judul_pengaduan', '$name', '$email', '$message', '$image_base64', '$video_base64')";

    if ($conn->query($sql_pengaduan)) {
        // Dapatkan ID pengaduan yang baru saja dimasukkan
        $last_id = $conn->insert_id;

        // Insert status pengaduan ke tabel status_pengaduan dengan status awal null
        $sql_status = "INSERT INTO status_pengaduan (id_pengaduan, status) VALUES ('$last_id', null)";

        if ($conn->query($sql_status)) {
            echo "<script>alert('Pengaduan berhasil dikirim! ID Pengaduan: " . $last_id . "');</script>";
        } else {
            echo "<script>alert('Error saat menambahkan status pengaduan: " . $sql_status . "<br>" . $conn->error . "');</script>";
        }
    } else {
        echo "<script>alert('Error saat menambahkan pengaduan: " . $sql_pengaduan . "<br>" . $conn->error . "');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="indexstyle.css" >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Web Layanan Pengaduan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: radial-gradient(circle at center, #ff7eb3, #760504);
            color: #2e4052;
        }

        .main-wrapper {
            display: flex;
            justify-content: space-between;
            max-width: 1200px;
            margin: 60px auto;
        }

        .container {
            max-width: 800px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .user,
        .instansiterhangat {
            background-color: #ffffff;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            width: 400px;
            padding: 20px;
            margin: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .sidebar {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .user-status-container {
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin-left: 25px;
        }

        .user-status {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 10px;
        }


        .user-status span {
            font-weight: bold;
        }


        h1 {
            text-align: center;
            color: #2e4052;
        }

        h3 {
            
            color: #2e4052;
            font-size: 20px;
        }

        .category h2 {
            margin-bottom: 10px;
            font-size: 20px;
            color: #2e4052;
        }

        label {
            display: block;
            font-weight: bold;
            color: #2e4052;
        }

        input[type="text"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #2e4052;
            border-radius: 5px;
            box-sizing: border-box;
            background-color: #F3E8D2;
            color: #2e4052;
        }

        input[type="file"] {
            margin-top: 5px;
        }

        input[type="submit"] {
            background-color: #b12b24;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #760504;
        }

        .instansi-info {
            text-align: left;
            width: 100%;
        }

        .instansi-info ul {
            list-style-type: none;
            padding: 0;
        }

        .instansi-info li {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .instansi-info li img {
            margin-right: 10px;
            margin-left: 30px;
            width: 40px;
            height: 40px;
        }
    </style>
</head>
<?php include "asset/navbar.php" ?>

<body>
    <div class="main-wrapper">
        <div class="container">
            <h1>Layanan Pengaduan</h1>

            <div class="category">
        <h2>Pengaduan</h2>
        <form action="#" method="POST" enctype="multipart/form-data" >
        <?php 
                    $sql_kategori = "SELECT kategori FROM kategori_pengaduan";
                    $result_kategori = $conn->query($sql_kategori);
                    $sql_wilayah = "SELECT kecamatan FROM wilayah";
                    $result_wilayah = $conn->query($sql_wilayah);
                    if ($result_kategori->num_rows > 0) {
                        echo '<div class="form-group">
                                <label for="category">Kategori Pengaduan:</label>
                                <select name="category" required>';
                        while ($row = $result_kategori->fetch_assoc()) {
                            echo '<option value="' . $row["kategori"] . '">' . $row["kategori"] . '</option>';
                        }

                        echo '</select>
                            </div>';
                    } else {
                        echo "Tidak ada data kategori pengaduan.";
                    }

                    if ($result_wilayah->num_rows > 0) {
                        echo '<div class="form-group">
                                <label for="wilayah">Wilayah:</label>
                                <select name="wilayah" required>';
                        while ($row = $result_wilayah->fetch_assoc()) {
                            echo '<option value="' . $row["kecamatan"] . '">' . $row["kecamatan"] . '</option>';
                        }

                        echo '</select>
                            </div>';
                    } else {
                        echo "Tidak ada data wilayah.";
                    }
                    ?>
                    <div class="form-group">
                        <label for="judul_pengaduan">Judul Pegaduan:</label>
                        <input type="text" name="judul_pengaduan" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Nama:</label>
                        <input type="text" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Pesan:</label>
                        <textarea name="message" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Upload Gambar:</label>
                        <input type="file" name="image">
                    </div>
                    <div class="form-group">
                        <label for="video">Upload Video:</label>
                        <input type="file" name="video">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="Kirim Pengaduan">
                    </div>
                </form>
            </div>

            <!-- Tombol Kembali -->
            <button id="kembaliButton">Kembali</button>
        </div>

        <div class="sidebar">
            <div class="user">
                <div class="user-info">
                    <h3>Cintha Hafrida Putri</h3>
                    <p>@usernamekamu</p>
                    <div class="user-status-container">
                        <div class="user-status">
                            <span>Terverifikasi</span> 0
                        </div>
                        <div class="user-status">
                            <span>Diproses</span> 0
                        </div>
                        <div class="user-status">
                            <span>Selesai</span> 0
                        </div>
                    </div>
                </div>
            </div>
            <div class="instansiterhangat">
                <div class="instansi-info">
                    <h1>Instansi Terhangat</h1>
                    <ul class="instansi-terhangat">
                        <li>
                            <img src="img/instansi.png" alt="">
                            <p>Kepolisian Negara Republik Indonesia</p>
                            <img src="img/dokumen.png" alt="">
                            <p>20k</p>
                        </li>
                        <li>
                            <img src="img/instansi.png" alt="">
                            <p>Kementrian Pendidikan, Kebudayaan, Riset dan Teknologi</p>
                            <img src="img/dokumen.png" alt="">
                            <p>10k</p>
                        </li>
                        <li>
                            <img src="img/instansi.png" alt="">
                            <p>Kementrian Sosial</p>
                            <img src="img/dokumen.png" alt="">
                            <p>8k</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <svg style="margin-top: -18%; width: 150%;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#fff" fill-opacity="1"
            d="M0,192L120,208C240,224,480,256,720,256C960,256,1200,224,1320,208L1440,192L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z">
        </path>
    </svg>

    <footer>
        <?php include "footer.html" ?>
    </footer>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-KyZXEAg3QhqLMpG8r+Zmi2KxmeTISw3gxy6R9W7D1bTl5V5ltzQ+Ay4b+8Qk6F9z"
        crossorigin="anonymous"></script>

    <script>
        document.getElementById("kembaliButton").addEventListener("click", function () {
            history.back();
        });
    </script>

</body>

</html>