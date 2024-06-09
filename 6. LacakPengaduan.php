<?php
include "conn/sesion.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="indexstyle.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Lacak Pengaduan - Layanan Pengaduan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom, #760504, #b12b24, #760504);
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .container {
            width: 80%;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            box-sizing: border-box;
            flex: 1;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #b12b24;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #760504;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #760504;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f0f0f0;
        }
    </style>
</head>
<?php include "asset/navbar.php" ?>
<body>
    <svg style="margin-top: -18%; width: 100%;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#760504" fill-opacity="1" d="M0,192L120,208C240,224,480,256,720,256C960,256,1200,224,1320,208L1440,192L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z">
        </path>
    </svg>
    <div class="content-wrapper container">
        <h1>Lacak Pengaduan</h1>
        <form method="POST">
            <label for="nomor_pengaduan">Nomor Pengaduan:</label>
            <input type="text" id="nomor_pengaduan" name="nomor_pengaduan" placeholder="Masukkan nomor pengaduan..." required>
            <input type="submit" name="submit" value="Lacak">
        </form>
        <table>
            <thead>
                <tr>
                    <th>Nomor Pengaduan</th>
                    <th>Judul Pengaduan</th>
                    <th>Tanggal Pengaduan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "conn/db_connect.php"; // Menghubungkan ke file db_connect.php

                if (isset($_POST["submit"])) {
                    $nomor_pengaduan = $_POST["nomor_pengaduan"];

                    // Prepare statement untuk mencari pengaduan berdasarkan nomor_pengaduan
                    $sql = "SELECT pengaduan.id_pengaduan, pengaduan.judul_pengaduan, pengaduan.tanggal, status_pengaduan.status 
                            FROM pengaduan 
                            JOIN status_pengaduan ON pengaduan.id_pengaduan = status_pengaduan.id_pengaduan
                            WHERE pengaduan.id_pengaduan = ?";
                    $stmt = $conn->prepare($sql);

                    if (!$stmt) {
                        echo "<tr><td colspan='4'>Error saat menyiapkan statement: " . $conn->error . "</td></tr>";
                    } else {
                        // Bind parameter ke statement
                        $stmt->bind_param("i", $nomor_pengaduan);

                        // Eksekusi statement
                        if ($stmt->execute()) {
                            // Ambil hasil dari statement
                            $result = $stmt->get_result();

                            if ($result->num_rows > 0) {
                                // Tampilkan data pengaduan dalam tabel
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row['id_pengaduan'] . "</td>";
                                    echo "<td>" . $row['judul_pengaduan'] . "</td>";
                                    echo "<td>" . $row['tanggal'] . "</td>";
                                    echo "<td>" . $row['status'] . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4'>Tidak ada data pengaduan dengan nomor pengaduan tersebut.</td></tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>Error saat menjalankan statement: " . $stmt->error . "</td></tr>";
                        }

                        // Tutup statement
                        $stmt->close();
                    }
                } else {
                    echo "<tr><td colspan='4'>Silakan masukkan nomor pengaduan untuk melihat status.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#fff" fill-opacity="1"
            d="M0,192L120,208C240,224,480,256,720,256C960,256,1200,224,1320,208L1440,192L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z">
        </path>
    </svg>

    <footer>
        <?php include "footer.html"; ?>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-KyZXEAg3QhqLMpG8r+Zmi2KxmeTISw3gxy6R9W7D1bTl5V5ltzQ+Ay4b+8Qk6F9z"
        crossorigin="anonymous"></script>
</body>

</html>
