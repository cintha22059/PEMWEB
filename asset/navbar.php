<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
    <div class="container-fluid">
        <a  href="index.php">
            <img src="img\LOGO LAPOR.PNG" alt="Layanan Aspirasi Masyarakat"  style= "margin-top:-25px; margin-bottom:-25px;  height:100px; witdh:100px;" >
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Layanan</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="7. Pengaduan.php">Pengaduan</a>
                        <a class="dropdown-item" href="3. INFORMASIRUANGBERITA.php">Ruang Berita</a>
                        <a class="dropdown-item" href="6. LacakPengaduan.php">Lacak Pengaduan</a>
                        <a class="dropdown-item" href="4. STATISTIK.php">Statistik & Analisis</a>
                        <a class="dropdown-item" href="galeri_pengaduan.php">Galeri Pengaduan</a>
                        <a class="dropdown-item" href="INTANSINEGARA.php">Intansi Negara</a>
                        <a class="dropdown-item" href="KATEGORIPENGADUAN.php">Kategori Pengaduan</a>
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link" href="About.php">About</a></li>
                <li class="nav-item"><a class="nav-link" href="notification.html">Notifikasi</a></li>
                <li class="nav-item"><a class="nav-link" href="profile_user.php">Profile</a></li>
                <div>
                    <?php
                    if (isset($_SESSION['username'])) { // Periksa apakah session username sudah diset
                    echo '<li><a href="#"> ' . $_SESSION['username'] . '</a></li>'; // Tampilkan username jika sudah login
                } else {
                    echo '<li><a href="login.php">Login</a></li>'; // Tampilkan link login jika belum login
                }
                ?>
                </div>
            </ul>
        </div>
    </div>
</nav>