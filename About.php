<?php
include "conn/sesion.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>About - Layanan Pengaduan Online Masyarakat Tuban</title>
    <link rel="stylesheet" href="indexstyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background: linear-gradient(to bottom, #760504, #b12b24, #760504);
}

.container {
    max-width: 900px;
    max-height: 1000px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

h1 {
    color: #333;
    text-align: center;
    font-weight: bold;
    font-family: "Poppins";
}

p {
    color: #666;
    line-height: 1.6;
    text-align: justify;
    text-indent: 2.5em;
    font-family: 
}
.container{
    margin-top: 55px
}

/* Profile Card Styles */
.profile-card {
    width: 250px;
    height: 350px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s ease-in-out;
}

.profile-card:hover {
    transform: translateY(-10px);
}

.profile-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.profile-content {
    padding: 15px;
    text-align: center;
}

.profile-name {
    font-size: 1.2em;
    font-weight: bold;
    color: #333;
    margin-bottom: 5px;
}

.profile-role {
    font-size: 0.9em;
    color: #666;
    margin-bottom: 10px;
}

.profile-social-links {
    display: flex;
    justify-content: center;
}

.profile-social-link {
    width: 36px;
    height: 36px;
    background-color: #f2f2f2;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 5px;
    transition: transform 0.3s ease-in-out;
}

.profile-social-link:hover {
    transform: translateY(-3px);
    background-color: #e6e6e6;
}

.profile-social-link i {
    font-size: 1.2em;
    color: #333;
}
</style></head>
<body>
    <?php include "asset/navbar.php" ?>
    
    <header>
        <div class="container">
            <h1>Layanan Pengaduan Online Masyarakat Tuban</h1>
            <p>Layanan Pengaduan Online Masyarakat Tuban adalah platform yang dirancang untuk memudahkan masyarakat Tuban dalam menyampaikan pengaduan secara online. 
                Kami berkomitmen untuk memberikan pelayanan yang efisien dan transparan dalam menangani setiap pengaduan yang diterima. 
                Tim kami terdiri dari para profesional yang siap membantu menyelesaikan masalah yang dihadapi oleh masyarakat Tuban.
            </p>
        </div>
    </header>
    <button type="button" class="btn btn-light" onclick="history.back()">
            <a href="index.php">
                <img src="https://tse3.mm.bing.net/th?id=OIP.VJ1cfFaYuE91j19X1Xb7ggHaHa&pid=Api&P=0&h=220"
                    width="20px"></a>
        </button>
        <section class="team">
        <div class="container">
            <h2>Tim Kami</h2>
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="profile-card">
                        <img src="img\fotobalgis.jpg" alt="Profile Picture">
                        <div class="profile-content">
                            <div class="profile-name">Balgis</div>
                            <div class="profile-role">22051214052</div>
                            <div class="profile-social-links">
                                <a href="#" class="profile-social-link"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="profile-social-link"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="profile-social-link"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#" class="profile-social-link"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="profile-card">
                        <img src="img\fotofirda.jpg" alt="Profile Picture">
                        <div class="profile-content">
                            <div class="profile-name">Firda</div>
                            <div class="profile-role">22051214053</div>
                            <div class="profile-social-links">
                                <a href="#" class="profile-social-link"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="profile-social-link"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="profile-social-link"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#" class="profile-social-link"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="profile-card">
                        <img src="img\fototino.jpg" alt="Profile Picture">
                        <div class="profile-content">
                            <div class="profile-name">Valentino</div>
                            <div class="profile-role">22051214054</div>
                            <div class="profile-social-links">
                                <a href="#" class="profile-social-link"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="profile-social-link"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="profile-social-link"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#" class="profile-social-link"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="profile-card">
                        <img src="img\fotocintha.jpg" alt="Profile Picture">
                        <div class="profile-content">
                            <div class="profile-name">Cintha</div>
                            <div class="profile-role">22051214059</div>
                            <div class="profile-social-links">
                                <a href="#" class="profile-social-link"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="profile-social-link"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="profile-social-link"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#" class="profile-social-link"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="profile-card">
                        <img src="img\fotodaffa.png" alt="Profile Picture">
                        <div class="profile-content">
                            <div class="profile-name">Raihan</div>
                            <div class="profile-role">22051214069</div>
                            <div class="profile-social-links">
                                <a href="#" class="profile-social-link"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="profile-social-link"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="profile-social-link"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#" class="profile-social-link"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="services">
        <div class="container">
            <h2>Layanan Kami</h2>
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <div class="service-name">Pengaduan Fasilitas Umum</div>
                        <div class="service-description">
                            Layanan ini bertujuan untuk memudahkan masyarakat dalam melaporkan kerusakan ataupun keluhan terkait fasilitas umum di daerah Tuban.
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="service-name">Pengaduan Kepolisian</div>
                        <div class="service-description">
                            Layanan ini bertujuan untuk memudahkan masyarakat dalam melaporkan pelanggaran hukum ataupun penipuan yang terjadi di daerah Tuban.
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div class="service-name">Pengaduan Kesehatan</div>
                        <div class="service-description">
                            Layanan ini bertujuan untuk memudahkan masyarakat dalam melaporkan keluhan ataupun masalah terkait kesehatan di daerah Tuban.
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-building"></i>
                        </div>
                        <div class="service-name">Pengaduan Perumahan</div>
                        <div class="service-description">
                            Layanan ini bertujuan untuk memudahkan masyarakat dalam melaporkan masalah ataupun kerusakan terkait perumahan di daerah Tuban.
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-road"></i>
                        </div>
                        <div class="service-name">Pengaduan Jalan dan Transportasi</div>
                        <div class="service-description">
                            Layanan ini bertujuan untuk memudahkan masyarakat dalam melaporkan masalah ataupun kerusakan terkait jalan dan transportasi di daerah Tuban.
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-comments"></i>
                        </div>
                        <div class="service-name">Pengaduan Lainnya</div>
                        <div class="service-description">
                            Layanan ini bertujuan untuk memudahkan masyarakat dalam melaporkan masalah ataupun kerusakan yang tidak tercakup oleh layanan lainnya.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <svg style="margin-top: -18%; width: 100%;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#b12b24" fill-opacity="1" d="M0,192L120,208C240,224,480,256,720,256C960,256,1200,224,1320,208L1440,192L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z">
        </path>
    </svg>
    
    <footer>
        <?php include "footer.html" ?>
    </footer>
</body>
</html>