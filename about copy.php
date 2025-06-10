<?
include 'db.php';

$editSnack = null;
if (isset($_GET['edit_id'])) {
    $edit_id = intval($_GET['edit_id']);
    $stmt = $conn->prepare("SELECT * FROM history WHERE id = ?");
    $stmt->bind_param("i", $edit_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $editSnack = $result->fetch_assoc();
    $stmt->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Check Your Snack</title>
<title>About</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Dr PRO template project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/about.css">
<link rel="stylesheet" type="text/css" href="styles/abouts.css">
<link rel="stylesheet" type="text/css" href="styles/about_responsive.css">
</head>
<body>

<div class="super_container">
	
	<!-- Header -->

	<header class="header trans_400">
		<div class="header_content d-flex flex-row align-items-center jusity-content-start trans_400">

			<!-- Logo -->
			<div class="logo">
				<a href="#">
					<div>Check<span>Your</span>Snack</div>
					<div>Evaluasi Camilan Sehat</div>
				</a>
			</div>

			<!-- Main Navigation -->
			<nav class="main_nav">
				<ul class="d-flex flex-row align-items-center justify-content-start">
					<li><a href="index.php">Beranda</a></li>
					<li class="active"><a href="about.php">Evaluasi Camilan</a></li>
					<li><a href="services.php">Rekomendasi</a></li>
					<li><a href="blog.php">News</a></li>
					<li><a href="contact.php">Tentang Kami</a></li>
				</ul>
			</nav>
			<div class="header_extra d-flex flex-row align-items-center justify-content-end ml-auto">
				
				<!-- Work Hourse -->
				<div class="work_hours">Mo - Sat: 8:00am - 9:00pm</div>

				<!-- Header Phone -->
				<div class="header_phone">+34 586 778 8892</div>

				<!-- Login Button -->
				<div class="button button_1 header_button"><a href="#">Login</a></div>

				<!-- Header Social -->
				<div class="social header_social">
					<ul class="d-flex flex-row align-items-center justify-content-start">
						<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
					</ul>
				</div>

				<!-- Hamburger -->
				<div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
			</div>
		</div>
	</header>

	<!-- Menu -->

					<div class="menu_overlay trans_400"></div>
					<div class="menu trans_400">
						<div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
						<nav class="menu_nav">
							<ul>
								<li><a href="index.php">Beranda</a></li>
								<li><a href="about.php">Evaluasi Camilan</a></li>
								<li><a href="services.php">Rekomendasi</a></li>
								<li><a href="blog.php">Artikel</a></li>
								<li><a href="contact.php">Tentang Kami</a></li>
							</ul>
						</nav>

						<div class="social header_social">
              <ul class="d-flex flex-row align-items-center justify-content-start">
                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
              </ul>
            </div>
					</div>

					<!-- Home -->

					<div class="home d-flex flex-column align-items-start justify-content-end">
						<!-- <div class="background_image" style="background-image:url(images/about.jpg)"></div> -->
						<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/about.jpg" data-speed="0.8"></div>
						<div class="home_overlay"><img src="images/home_overlay.png" alt=""></div>
						<div class="home_container">
							<div class="container">
								<div class="row">
									<div class="col">
										<div class="home_content">
											<div class="home_title">Evaluasi Camilan</div>
											<div class="home_text">Platform interaktif untuk mengecek apakah camilanmu sehat atau perlu dihindari.
				Mulai sekarang dan buat pilihan ngemil yang lebih cerdas!</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Intro -->

<div class="intro">
    <div class="container">
    <h1>Check Your Snack</h1>
    <label for="snackName">Nama Camilan:</label>
    <input type="text" id="snackName" placeholder="Contoh: Keripik Kentang">

    <label for="sugar">Kadar Gula (gram):</label>
    <input type="number" id="sugar" placeholder="Contoh: 15">

    <label for="fat">Lemak Total (gram):</label>
    <input type="number" id="fat" placeholder="Contoh: 10">

    <label for="calories">Kalori (kcal):</label>
    <input type="number" id="calories" placeholder="Contoh: 180">

    <button onclick="evaluateSnack()">Evaluasi Camilan</button>

    <div id="result" class="result"></div>

    <h2>Histori Evaluasi Camilan</h2>
    <table id="snackTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Camilan</th>
                <th>Kadar Gula (gram)</th>
                <th>Lemak Total (gram)</th>
                <th>Kalori (kcal)</th>
                <th>Evaluasi</th>
            </tr>
        </thead>
        <tbody>
            <!-- Rows akan ditambahkan secara dinamis -->
        </tbody>
    </table>
</div>
</div>

<script>
    let snackCounter = 1;

    function evaluateSnack() {
        const name = document.getElementById('snackName').value;
        const sugar = parseFloat(document.getElementById('sugar').value);
        const fat = parseFloat(document.getElementById('fat').value);
        const calories = parseFloat(document.getElementById('calories').value);
        const resultDiv = document.getElementById('result');
        const snackTable = document.getElementById('snackTable').querySelector('tbody');

        // Validasi input
        if (!name || isNaN(sugar) || isNaN(fat) || isNaN(calories)) {
            resultDiv.innerHTML = 'Mohon isi semua kolom dengan data yang valid.';
            resultDiv.className = 'result unhealthy';
            return;
        }

        let score = 0;

        // Evaluasi sederhana
        if (sugar <= 5) score++;
        if (fat <= 5) score++;
        if (calories <= 150) score++;

        const evaluation = score >= 2 ? 'Sehat' : 'Tidak Sehat';

        resultDiv.innerHTML = score >= 2
            ? '✅ Camilan ini tergolong <strong>cukup sehat</strong>!'
            : '⚠️ Camilan ini tergolong <strong>tidak sehat</strong>. Kurangi konsumsi berlebihan.';
        resultDiv.className = score >= 2 ? 'result healthy' : 'result unhealthy';

        // Tambahkan baris baru ke tabel
        const newRow = snackTable.insertRow();
        newRow.innerHTML = `
            <td>${snackCounter++}</td>
            <td>${name}</td>
            <td>${sugar}</td>
            <td>${fat}</td>
            <td>${calories}</td>
            <td>${evaluation}</td>
        `;
    }
</script>






	<!-- Testimonials -->

	<div class="testimonials">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<div class="section_subtitle">This is Check Your Snack</div>
						<div class="section_title"><h2>Users Testimonials</h2></div>
					</div>
				</div>
			</div>
			<div class="row testimonials_row">
				<div class="col">
					<div class="quote d-flex flex-column align-items-center justify-content-center ml-auto mr-auto"><img src="images/quote.png" alt=""></div>

					<!-- Testimonials Slider -->
					<div class="test_slider_container">
						<div class="owl-carousel owl-theme test_slider">
							
							<!-- Slide -->
							<div class="owl-item">
								<div class="test_item text-center">
									<div class="test_text">
										<p>Website ini sangat membantu merekomendasikan camilan sehat dan bergizi.</p>
									</div>
									<div class="test_info d-flex flex-row align-items-center justify-content-center">
										<div class="test_image"><img src="images/test.jpg" alt=""></div>
										<div class="test_text">Lamian Himalayan, <span>Pengguna</span></div>
									</div>
								</div>
							</div>

							<!-- Slide -->
							<div class="owl-item">
								<div class="test_item text-center">
									<div class="test_text">
										<p>Dari website ini saya menjadi tau apakah camilan saya sehat atau tidak.</p>
									</div>
									<div class="test_info d-flex flex-row align-items-center justify-content-center">
										<div class="test_image"><img src="images/test.jpg" alt=""></div>
										<div class="test_text">Pio Kurniawan, <span>Pengguna</span></div>
									</div>
								</div>
							</div>

							<!-- Slide -->
							<div class="owl-item">
								<div class="test_item text-center">
									<div class="test_text">
										<p>Ini merupakan website terobosan baru yang keren.</p>
									</div>
									<div class="test_info d-flex flex-row align-items-center justify-content-center">
										<div class="test_image"><img src="images/test.jpg" alt=""></div>
										<div class="test_text">Al Ghazali, <span>Pengguna</span></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Footer -->

	<footer class="footer">
		<div class="footer_content">
			<div class="container">
				<div class="row">
					<!-- Footer About -->
					<div class="col-lg-3 footer_col">
						<div class="footer_about">
							<div class="footer_logo">
								<a href="#">
									<div>Check<span>Your</span>Snack</div>
									<div>Evaluasi Camilan Sehat</div>
								</a>
							</div>
							<div class="footer_about_text">
								<p>Platform interaktif untuk mengecek apakah camilanmu sehat atau perlu dihindari.
Mulai sekarang dan buat pilihan ngemil yang lebih cerdas!</p>
							</div>
						</div>
					</div>

					<!-- Footer Contact Info -->
					<div class="col-lg-3 footer_col">
						<div class="footer_contact">
							<div class="footer_title">Informasi Kontak</div>
							<ul class="contact_list">
								<li>+62 854 1234 567</li>
								<li>dhilasub123@gmail.com</li>
								<li>seruni0111@gmail.com</li>
							</ul>
						</div>
					</div>

					<!-- Footer Locations -->
					<div class="col-lg-3 footer_col">
						<div class="footer_location">
							<div class="footer_title">Lokasi Kami</div>
							<ul class="locations_list">
								<li>
									<div class="location_title">Bantul</div>
									<div class="location_text">Jalan Kebangsaan Timur</div>
								</li>
								<li>
									<div class="location_title">Yogyakarta</div>
									<div class="location_text">1481 Jalan Kebangsaan No. 931</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer_bar">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="footer_bar_content  d-flex flex-md-row flex-column align-items-md-center justify-content-start">
							<div class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</div>
							<nav class="footer_nav ml-md-auto">
								<ul class="d-flex flex-row align-items-center justify-content-start">
									<li><a href="index.php">Home</a></li>
									<li><a href="about.php">Evaluasi Camilan</a></li>
									<li><a href="services.php">Rekomendasi</a></li>
									<li><a href="blog.php">Artikel</a></li>
									<li><a href="contact.php">Tentang Kami</a></li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>			
		</div>
	</footer>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap-4.1.2/popper.js"></script>
<script src="styles/bootstrap-4.1.2/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/about.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>
</html> 