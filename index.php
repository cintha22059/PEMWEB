<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan Aspirasi Pengaduan Online Tuban</title>
    <link rel="stylesheet" href="indexstyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" >
</head>
<body> 
        <?php include "navbar.html" ?> 
    <header>
        <div id="carouselExampleCaptions" class="carousel slide custom-carouswl">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img\slider1.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img\slider2.jpeg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img\slider3.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        
    </header>

    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <p>Freight Company With a Difference.</p>
                <ul class="hero-features">
                    <li>Innovation</li>
                    <li>Unmatched Services</li>
                    <li>Unmatched Excellence</li>
                </ul>
                <a href="#" class="btn">Get a Quote</a>
            </div>
        </div>
    </section>

    <section class="why-choose-us">
        <div class="container">
            <h2>Kategori Layanan</h2>
            <p>Kami memberikan wadah bagi masyarakat Tuban untuk menyampaikan atau pengaduan kepada pemerintah dalam hal yang berhubungan dengan kemajuan daerah Tuban.
                Sampaikan kepada kami melalui beberapa layanan pengaduan dibawah ini untuk Tuban lebih maju
            </p>

            <div class="why-choose-us-items">
                <div class="item">
                    <img src="img/icon-innovation.svg" alt="Innovation">
                    <h3>Innovation</h3>
                    <p>We're constantly investing in new technologies to improve our services and make shipping more efficient.</p>
                </div>
                <div class="item">
                    <img src="img/icon-services.svg" alt="Unmatched Services">
                    <h3>Unmatched Services</h3>
                    <p>We offer a wide range of services to meet your specific needs, including air freight, ground shipping, and international shipping.</p>
                </div>
                <div class="item">
                    <img src="img/icon-excellence.svg" alt="Unmatched Excellence">
                    <h3>Unmatched Excellence</h3>
                    <p>We're committed to providing our customers with the highest level of service, from pickup to delivery.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="our-services">
        <div class="container">
            <h2>Our Services</h2>
            <div class="our-services-items">
                <div class="item">
                    <img src="img/icon-air-freight.svg" alt="Air Freight">
                    <h3>Air Freight</h3>
                    <p>The fastest way to ship your goods, ideal for time-sensitive shipments.</p>
                </div>
                <div class="item">
                    <img src="img/icon-ground-shipping.svg" alt="Ground Shipping">
                    <h3>Ground Shipping</h3>
                    <p>A cost-effective option for shipping that doesn't require the speed of air freight.</p>
                </div>
                <div class="item">
                    <img src="img/icon-international-shipping.svg" alt="International Shipping">
                    <h3>International Shipping</h3>
                    <p>We ship to over 220 countries and territories around the world.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="get-a-quote">
        <div class="container">
            <h2>Get a Quote</h2>
            <p>Get a free quote today and see how UPS can help you save money and time on your next shipment.</p>
            <a href="#" class="btn">Get a Quote</a>
        </div>
    </section>
        <footer>
        <?php include "footer.html" ?> 
        </footer>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Zmi2KxmeTISw3gxy6R9W7D1bTl5V5ltzQ+Ay4b+8Qk6F9z" crossorigin="anonymous"></script>
<script>
    var myCarousel = document.querySelector('#carouselExampleCaptions')
var carousel = new bootstrap.Carousel(myCarousel, {
    interval: 2000, 
    wrap: true 
})

    document.addEventListener("DOMContentLoaded", function() {
    const dropdownItems = document.querySelectorAll('.dropdown-item');

    dropdownItems.forEach(item => {
        item.addEventListener('mouseover', function() {
            this.classList.add('bg-info');
            this.classList.add('text-white');
        });

        item.addEventListener('mouseleave', function() {
            this.classList.remove('bg-info');
            this.classList.remove('text-white');
        });
    });
});
    document.addEventListener("DOMContentLoaded", function() {
        const infoBoxes = document.querySelectorAll('.card');
        
        infoBoxes.forEach(box => {
            box.addEventListener('mouseover', function() {
                this.classList.add('bg-info');
                this.classList.add('text-white');
            });

            box.addEventListener('mouseleave', function() {
                this.classList.remove('bg-info');
                this.classList.remove('text-white');
            });
        });
    });
</script>
</body>
</html>
