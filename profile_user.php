<?php
include "conn/profile.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans:wght@400;500;600;700&display=swap"
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <title>Profile</title>
  <style>
    body {
      background: #750504;
    }

    .form-control:focus {
      box-shadow: none;
      border-color: #BA68C8;
    }

    .profile-button {
      background: #b12b24;
      box-shadow: none;
      border: none;
    }

    .container {
      width: 800px;
      max-width: 100%;
    }

    .profile-button:hover {
      background: #750504;
    }

    .profile-button:focus {
      background: #750504;
      box-shadow: none;
    }

    .profile-button:active {
      background: #b12b24;
      box-shadow: none;
    }

    .back:hover {
      color: #b12b24;
      cursor: pointer;
    }

    .labels {
      font-size: 11px;
    }
  </style>
</head>

<body>
  <section>
    <div class="container rounded bg-white mt-4 mb-4">
      <div class="row">
        <div class="col-md-5 ">
          <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
              width="100px"
              src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span
              class="font-weight-bold"><?php echo htmlspecialchars($username); ?></span><span class="text-black-50"><?php echo htmlspecialchars($profile['email']); ?></span><span>
            </span></div>
        </div>
        <div class="col-md-5 ">
          <div class="p-3 py-5">
            <form action="conn/profile.php" method="POST">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="text-right">Pengaturan Profil</h4>
              </div>
              <div class="row mt-3">
                <div class="col-md-12"><label class="labels">Nama Lengkap</label><input type="text" class="form-control"
                    name="nama_lengkap" placeholder="Masukkan Nama Lengkap" value="<?php echo htmlspecialchars($profile['nama_lengkap']); ?>"></div>
                <div class="col-md-12"><label class="labels">Nomor Telefon</label><input type="text" class="form-control"
                    name="nomor_telefon" placeholder="Masukkan Nomor Telefon" value="<?php echo htmlspecialchars($profile['nomor_telefon']); ?>"></div>
                <div class="col-md-12"><label class="labels">Alamat Rumah</label><input type="text" class="form-control"
                    name="alamat_rumah" placeholder="Masukkan Alamat Rumah" value="<?php echo htmlspecialchars($profile['alamat_rumah']); ?>"></div>
                <div class="col-md-12"><label class="labels">Email</label><input type="email" class="form-control" name="email"
                    placeholder="Masukkan Email" value="<?php echo htmlspecialchars($profile['email']); ?>" readonly></div>
                <div class="col-md-12"><label class="labels">NIK</label><input type="text" class="form-control"
                    name="nik" placeholder="Masukkan NIK" value="<?php echo htmlspecialchars($profile['nik']); ?>"></div>
                <div class="col-md-12"><label class="labels">Tanggal Lahir</label><input type="date" class="form-control"
                    name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir" value="<?php echo htmlspecialchars($profile['tanggal_lahir']); ?>"></div>
                <div class="col-md-12"><label class="labels">Jenis Kelamin</label><input type="text" class="form-control"
                    name="jenis_kelamin" placeholder="Masukkan Jenis Kelamin" value="<?php echo htmlspecialchars($profile['jenis_kelamin']); ?>"></div>
              </div>
              <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Simpan
                  Profile</button></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>
