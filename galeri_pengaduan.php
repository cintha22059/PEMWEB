<?php
include "conn/sesion.php";
?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    integrity="sha384-Za2dTLzhCf+j9LtKQOzW+3//yKY3QzGSPJkStNC5w3N1QZCaG52fNk7Aw5gDKXa" crossorigin="anonymous" />
  <link rel="stylesheet" href="path/to/font-awesome/css/all.min.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="indexstyle.css" />
  <title>Galeri Pengaduan</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #fff;
    }

    .title {
      margin-top: 60px;
      background-color: #760504;
      padding: 20px;
      text-align: center;
      color: white;
      font-size: 2em;
      margin-bottom: 20px;
    }

    .complaint {
      border: 2px solid #b12b24;
      border-radius: 5px;
      padding: 20px;
      margin: 20px auto;
      width: 1000px;
      background-color: white;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .complaint h3 {
      margin-top: 0;
      color: #412234;
    }

    .complaint p {
      margin-bottom: 10px;
    }

    .status {
      padding: 5px 10px;
      border-radius: 5px;
      display: inline-block;
      font-size: 12px;
      margin-top: 10px;

    }

    .pending .status {
      background-color: #b12b24;
    }

    .processing .status {
      background-color: #b12b24;
    }

    .completed .status {
      background-color: #b12b24;
    }

    .date {
      font-size: 12px;
      color: #888888;
      margin-bottom: 10px;
      display: flex;
      align-items: center;
    }

    .type {
      font-size: 14px;
      font-weight: bold;
      margin-left: 10px;
    }

    .features {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 20px;
    }

    .feature {
      display: flex;
      align-items: center;
    }

    .feature i {
      font-size: 20px;
      margin-right: 10px;
    }

    .feature span {
      font-size: 12px;
    }

    .evidence {
      display: flex;
      align-items: center;
    }

    .evidence a {
      font-size: 10px;
    }

    .evidence p {
      margin: 0 0 0 120px;
    }

    .evidence img {
      margin-bottom: 10px;
      width: 200px;
      height: 100px;
    }

    .evidence div {
      margin-top: 10px;
    }

    .evidence img.inline {
      display: inline-block;
      width: 200px;
      height: 100px;
      margin-right: 10px;
    }

    .like-image {
      width: 20px;
      height: 20px;
      vertical-align: middle;
    }

    .share-image {
      width: 20px;
      height: 20px;
      vertical-align: middle;
    }

    .komen-image {
      width: 20px;
      height: 20px;
      vertical-align: middle;
    }

    .large-image {
      width: 300px;
      height: 200px;
    }

    .image-container {
      width: 200px;
      height: 200px;
      object-fit: cover;
    }
    .comment-section {
    margin: 20px 0;
}

.comment {
    border: 1px solid #ddd;
    padding: 15px;
    margin-bottom: 10px;
    border-radius: 8px;
    background-color: #f9f9f9;
}

.comment-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
}

.username {
    font-weight: bold;
    color: #333;
}

.comment-time {
    font-size: 0.9em;
    color: #777;
}

.comment-body {
    margin: 0;
    font-size: 1em;
    color: #555;
}
  </style>
</head>
<?php include "asset/navbar.php" ?>
<body style="background: radial-gradient(circle at center, #ff7eb3, #760504);">
  <h2 class="title">Galeri Pengaduan</h2>
  <p style="text-align:center;padding-bottom:20px;color:white;">Di sini, Anda dapat melihat pengaduan-pengaduan
    sebelumnya yang telah diatasi atau masih dalam proses penanganan.</p>
  
  <div class="container">
    <div class="row">
      <?php
      include("conn/db_connect.php");
      $sql = "SELECT pengaduan.*, status_pengaduan.status
              FROM pengaduan
              INNER JOIN status_pengaduan ON pengaduan.id_pengaduan = status_pengaduan.id_pengaduan";
      $hasil = mysqli_query($conn, $sql);

      $jmlArtikel = mysqli_num_rows($hasil);
      if ($jmlArtikel > 0) {
        while ($row = mysqli_fetch_assoc($hasil)) {
          $id_pengaduan = $row["id_pengaduan"];
      ?>
          <div class="complaint pending">
            <p class="date"><span><?= $row["tanggal"]; ?></span> <span class="type"><?= $row["kategori_pengaduan"]; ?></span></p>
            <h3><?= $row["judul_pengaduan"]; ?></h3>
            <p><?= $row["pesan"]; ?> </p>
            <div>
              <img src="data:image/jpeg;base64,<?php echo $row['gambar']; ?>" alt="Uploaded Image" class="image-container">
            </div>
            <div class="status <?= strtolower($row["status"]); ?>" style="color: white;"><?= $row["status"]; ?></div>

            <div class="features">
              <div class="feature">
                <i class="fa fa-comments"></i>
                <button id="komenButton<?= $id_pengaduan; ?>" onclick="toggleComments(<?= $id_pengaduan; ?>)" style="background-color:transparent; border:none;">
                  <img src="img/komen.png" alt="Komen" class="komen-image"><br>
                  Komentar
                </button>
              </div>
              <div class="feature">
                <i class="fa fa-thumbs-o-up"></i>
                <button id="likeButton<?= $id_pengaduan; ?>" onclick="likeComplaint(<?= $id_pengaduan; ?>, this)" style="background-color:transparent; border:none;">
                  <img src="img/like.png" alt="Like" class="like-image"><br>
                  Suka
                </button>
              </div>
              <div class="feature">
                <i class="fa fa-share-alt"></i>
                <button id="shareButton<?= $id_pengaduan; ?>" onclick="shareComplaint(<?= $id_pengaduan; ?>)" style="background-color:transparent; border:none;">
                  <img src="img/share.png" alt="Share" class="share-image"><br>
                  Bagikan
                </button>
              </div>
            </div>

            <!-- Section komentar -->
            <div id="commentSection<?= $id_pengaduan; ?>" class="comment-section">
    <?php
    $commentQuery = "SELECT * FROM komentar WHERE id_pengaduan = '$id_pengaduan'";
    $commentResult = mysqli_query($conn, $commentQuery);
    while ($commentRow = mysqli_fetch_assoc($commentResult)) {
    ?>
        <div class="comment">
            <div class="comment-header">
                <strong class="username"><?= htmlspecialchars($commentRow['username']); ?>:</strong>
                <span class="comment-time"><?= htmlspecialchars($commentRow['waktu_komentar']); ?></span>
            </div>
            <p class="comment-body"><?= nl2br(htmlspecialchars($commentRow['isi_komentar'])); ?></p>
        </div>
    <?php
    }
    ?>
</div>

              <!-- Form untuk menambahkan komentar baru -->
              <form action="add_comment.php" method="post">
                <input type="hidden" name="id_pengaduan" value="<?= $id_pengaduan; ?>">
                <input type="hidden" name="username" value="<?= $_SESSION['username'] ?>">
                <textarea name="isi_komentar" placeholder="Tulis komentar Anda" required></textarea><br>
                <button type="submit">Kirim</button>
              </form>
            </div>
          </div>
      <?php
        }
      }
      ?>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Zmi2KxmeTISw3gxy6R9W7D1bTl5V5ltzQ+Ay4b+8Qk6F9z" crossorigin="anonymous"></script>

  <script>
    function toggleComments(complaintId) {
      var commentSection = document.getElementById('commentSection' + complaintId);
      if (commentSection.style.display === 'none' || commentSection.style.display === '') {
        commentSection.style.display = 'block';
      } else {
        commentSection.style.display = 'none';
      }
    }

    function likeComplaint(complaintId, button) {
      alert("Pengaduan dengan ID " + complaintId + " disukai!");
      var likeImage = button.querySelector('.like-image');
      likeImage.src = 'img/likeaktif (3).png';
    }

    function shareComplaint(complaintId) {
      alert("Pengaduan dengan ID " + complaintId + " dibagikan!");
    }
  </script>
</body>

</html>
