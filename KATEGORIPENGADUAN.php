<?php
include "conn/sesion.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<link rel="stylesheet" href="indexstyle.css" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<title>Kategori Pengaduan - Layanan Pengaduan</title>
	<style>
		body {
			font-family: 'Roboto', sans-serif;
			background-color: #f5f5f5;
		}

		h1 {
			font-size: 2.5rem;
		}

		h2 {
			font-size: 1.75rem;
			margin-bottom: 2rem;
			border-bottom: 5px solid #760504;
			padding-bottom: 0.5rem;
		}

		.header {
			background-color: #760504;
			color: #fff;
			padding: 1rem;
			text-align: center;
		}

		.ag-format-container {
			width: 1142px;
			margin: 0 auto;
		}


		body {
			background-color: #ffff;
		}

		.ag-courses_box {
			display: -webkit-box;
			display: -ms-flexbox;
			display: flex;
			-webkit-box-align: start;
			-ms-flex-align: start;
			align-items: flex-start;
			-ms-flex-wrap: wrap;
			flex-wrap: wrap;

			padding: 50px 0;
		}

		.ag-courses_item {
			-ms-flex-preferred-size: calc(33.33333% - 30px);
			flex-basis: calc(33.33333% - 30px);

			margin: 0 15px 30px;

			overflow: hidden;

			border-radius: 28px;
		}

		.ag-courses-item_link {
			display: block;
			padding: 30px 20px;
			background-color: #dfe1e7;

			overflow: hidden;

			position: relative;
		}

		.ag-courses-item_link:hover,
		.ag-courses-item_link:hover .ag-courses-item_date {
			text-decoration: none;
			color: #fff;
		}

		.ag-courses-item_link:hover .ag-courses-item_bg {
			-webkit-transform: scale(10);
			-ms-transform: scale(10);
			transform: scale(10);
		}

		.ag-courses-item_title {
			min-height: 87px;
			margin: 0 0 25px;

			overflow: hidden;

			font-weight: bold;
			font-size: 30px;
			color: #000;

			z-index: 2;
			position: relative;
		}

		.ag-courses-item_link:hover,
		.ag-courses-item_link:hover .ag-courses-item_title {
			text-decoration: none;
			color: #fff;
		}

		.ag-courses-item_link:hover .ag-courses-item_bg {
			-webkit-transform: scale(10);
			-ms-transform: scale(10);
			transform: scale(10);
		}

		.ag-courses-item_date-box {
			font-size: 18px;
			color: #000;

			z-index: 2;
			position: relative;
		}

		.ag-courses-item_link:hover,
		.ag-courses-item_link:hover .ag-courses-item_date-box {
			text-decoration: none;
			color: #fff;
		}

		.ag-courses-item_link:hover .ag-courses-item_bg {
			-webkit-transform: scale(10);
			-ms-transform: scale(10);
			transform: scale(10);
		}

		.ag-courses-item_date {
			font-weight: bold;
			color: #760504;

			-webkit-transition: color .5s ease;
			-o-transition: color .5s ease;
			transition: color .5s ease
		}

		.ag-courses-item_bg {
			height: 128px;
			width: 128px;
			background-color: #760504;

			z-index: 1;
			position: absolute;
			top: -75px;
			right: -75px;

			border-radius: 50%;

			-webkit-transition: all .5s ease;
			-o-transition: all .5s ease;
			transition: all .5s ease;
		}

		.ag-courses_item:nth-child(2n) .ag-courses-item_bg {
			background-color: #760504;
		}

		.ag-courses_item:nth-child(3n) .ag-courses-item_bg {
			background-color: #760504;
		}

		.ag-courses_item:nth-child(4n) .ag-courses-item_bg {
			background-color: #760504;
		}

		.ag-courses_item:nth-child(5n) .ag-courses-item_bg {
			background-color: #760504;
		}

		.ag-courses_item:nth-child(6n) .ag-courses-item_bg {
			background-color: #760504;
		}



		@media only screen and (max-width: 979px) {
			.ag-courses_item {
				-ms-flex-preferred-size: calc(50% - 30px);
				flex-basis: calc(50% - 30px);
			}

			.ag-courses-item_title {
				font-size: 24px;
			}
		}

		@media only screen and (max-width: 767px) {
			.ag-format-container {
				width: 96%;
			}

		}

		@media only screen and (max-width: 639px) {
			.ag-courses_item {
				-ms-flex-preferred-size: 100%;
				flex-basis: 100%;
			}

			.ag-courses-item_title {
				min-height: 72px;
				line-height: 1;

				font-size: 24px;
			}

			.ag-courses-item_link {
				padding: 22px 40px;
			}

			.ag-courses-item_date-box {
				font-size: 16px;
			}
		}
	</style>
</head>
<?php include "asset/navbar.php" ?>
<body>
	<div class="header">
		<h1>Kategori Pengaduan</h1>
	</div>
	<div class="ag-format-container">
		<div class="ag-courses_box">
			<div class="ag-courses_item">
				<a href="Tampilan Kategori\K_PENDIDIKAN.html" class="ag-courses-item_link">
					<div class="ag-courses-item_bg"></div>

					<div class="ag-courses-item_title">
						Pendidikan dan Pengajaran
					</div>

					<div class="ag-courses-item_date-box">
						Jumlah Pengaduan :
						<span class="ag-courses-item_date">
							5
						</span>
					</div>
				</a>
			</div>

			<div class="ag-courses_item">
				<a href="Tampilan Kategori\K_LINGKUNGAN HIDUP.html" class="ag-courses-item_link">
					<div class="ag-courses-item_bg"></div>

					<div class="ag-courses-item_title">
						Lingkungan Hidup
					</div>

					<div class="ag-courses-item_date-box">
						Jumlah Pengaduan :
						<span class="ag-courses-item_date">
							5
						</span>
					</div>
				</a>
			</div>

			<div class="ag-courses_item">
				<a href="Tampilan Kategori\K_P_BENCANA.html" class="ag-courses-item_link">
					<div class="ag-courses-item_bg"></div>

					<div class="ag-courses-item_title">
						Penanggulan Bencana
					</div>

					<div class="ag-courses-item_date-box">
						Jumlah Pengaduan :
						<span class="ag-courses-item_date">
							5
						</span>
					</div>
				</a>
			</div>

			<div class="ag-courses_item">
				<a href="Tampilan Kategori\K_KETENAGA KERJAAN.html" class="ag-courses-item_link">
					<div class="ag-courses-item_bg"></div>

					<div class="ag-courses-item_title">
						Ketenagakerjaan dan Usaha
					</div>

					<div class="ag-courses-item_date-box">
						Jumlah Pengaduan :
						<span class="ag-courses-item_date">
							5
						</span>
					</div>
				</a>
			</div>

			<div class="ag-courses_item">
				<a href="Tampilan Kategori\K_JAMINAN SOSIAL.html" class="ag-courses-item_link">
					<div class="ag-courses-item_bg"></div>

					<div class="ag-courses-item_title">
						Jaminan Sosial
					</div>

					<div class="ag-courses-item_date-box">
						Jumlah Pengaduan :
						<span class="ag-courses-item_date">
							5
						</span>
					</div>
				</a>
			</div>

			<div class="ag-courses_item">
				<a href="Tampilan Kategori\K_INFRASTRUKTUR.html" class="ag-courses-item_link">
					<div class="ag-courses-item_bg"></div>

					<div class="ag-courses-item_title">
						Infrastruktur
					</div>

					<div class="ag-courses-item_date-box">
						Jumlah Pengaduan :
						<span class="ag-courses-item_date">
							5
						</span>
					</div>
				</a>
			</div>

			<div class="ag-courses_item">
				<a href="Tampilan Kategori\K_PARIWISATA.html" class="ag-courses-item_link">
					<div class="ag-courses-item_bg">
					</div>
					<div class="ag-courses-item_title">
						Pariwisata
					</div>

					<div class="ag-courses-item_date-box">
						Jumlah Pengaduan :
						<span class="ag-courses-item_date">
							5
						</span>
					</div>
				</a>
			</div>

			<div class="ag-courses_item">
				<a href="Tampilan Kategori\K_HUKUM.html" class="ag-courses-item_link">
					<div class="ag-courses-item_bg"></div>

					<div class="ag-courses-item_title">
						Hukum dan Keamanan
					</div>

					<div class="ag-courses-item_date-box">
						Jumlah Pengaduan :
						<span class="ag-courses-item_date">
							5
						</span>
					</div>
				</a>
			</div>

			<div class="ag-courses_item">
				<a href="Tampilan Kategori\K_SDA.html" class="ag-courses-item_link">
					<div class="ag-courses-item_bg"></div>

					<div class="ag-courses-item_title">
						Sumber Daya Alam
					</div>

					<div class="ag-courses-item_date-box">
						Jumlah Pengaduan :
						<span class="ag-courses-item_date">
							5
						</span>
					</div>
				</a>
			</div>

			<div class="ag-courses_item">
				<a href="Tampilan Kategori\K_AREA STRATEGIS.html" class="ag-courses-item_link">
					<div class="ag-courses-item_bg"></div>

					<div class="ag-courses-item_title">
						Area Strategis Lainnya
					</div>

					<div class="ag-courses-item_date-box">
						Jumlah Pengaduan :
						<span class="ag-courses-item_date">
							5
						</span>
					</div>
				</a>
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
	<script src="chart.js"></script>
	<script>
		document.addEventListener('DOMContentLoaded', function () {
			drawChartWaktu();
		});
	</script>
	<script>
		document.addEventListener('DOMContentLoaded', function () {
			drawWilayahChart();
		});
	</script>
	
</body>

</html>
