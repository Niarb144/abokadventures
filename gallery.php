<?php
$host = "localhost";
$user = "abokadve_gallery";     
$pass = "@SerutnevdakobA#";         
$db   = "abokadve_gallery";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$result = $conn->query("SELECT * FROM gallery ORDER BY uploaded_at DESC");

// Fetch all into array for JS navigation
$files = [];
while($row = $result->fetch_assoc()) {
    $files[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Abok Adventures & Safaris</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="icon" href="images/logo/Logo.ico" type="image/png">
	
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Arizonia&display=swap" rel="stylesheet">

	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->

	<link rel="stylesheet" href="css/animate.css">
	
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">

	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="css/jquery.timepicker.css">

	
	<link rel="stylesheet" href="css/flaticon.css">
	<link rel="stylesheet" href="css/style.css">
    <style>
        
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .gallery {
			margin-top: 2rem;
			margin-bottom: 2rem;
			margin-left: 2rem;
			margin-right: 2rem;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            grid-auto-rows: 260px;
            gap: 15px;
        }
        .item { position: relative; overflow: hidden; border-radius: 12px; cursor: pointer; }
        .item img, .item video {
            width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;
        }
        .item:hover img, .item:hover video { transform: scale(1.1); }
        .item h4 {
            position: absolute; bottom: 0; left: 0; right: 0;
            background: rgba(0, 0, 0, 0.6); color: white;
            margin: 0; padding: 5px 10px; font-size: 14px; text-align: center;
        }

        /* Lightbox */
        .lightbox {
            position: fixed; top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0,0,0,0.8);
            display: none; align-items: center; justify-content: center;
            z-index: 1000; flex-direction: column;
        }
        .lightbox-content {
            max-width: 76%; max-height: 70%;
        }
        .lightbox img, .lightbox video {
            width: 100%; height: 100%; border-radius: 10px;
        }
        .close-btn, .nav-btn {
            position: absolute; top: 50%; transform: translateY(-50%);
            font-size: 40px; color: white; cursor: pointer;
            font-weight: bold; user-select: none;
        }
        .close-btn { top: 20px; right: 30px; transform: none; font-size: 30px; }
        .nav-btn.prev { left: 30px; }
        .nav-btn.next { right: 30px; }
        /* Hide Google Translate default UI */
		.goog-te-banner-frame.skiptranslate,
		.goog-te-gadget-icon,
		.goog-te-menu-value,
		.goog-logo-link,
		.goog-te-balloon-frame {
			display: none !important;
		}
	
	
		/* Dropdown Menu Styling */
		.dropdown {
			position: relative;
			display: inline-block;
		}
	
		.dropbtn {
			background-color: #fff;
			color: #333;
			font-weight: bold;
			padding: 8px 12px;
			border: 1px solid #ccc;
			border-radius: 5px;
			cursor: pointer;
			display: flex;
			align-items: center;
			gap: 5px;
		}
	
		.dropdown-content {
			display: none;
			position: absolute;
			background-color: #fff;
			min-width: 160px;
			border: 1px solid #ccc;
			border-radius: 5px;
			z-index: 1;
			box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
		}
	
		.dropdown-content a {
			color: #333;
			padding: 8px 12px;
			text-decoration: none;
			display: flex;
			align-items: center;
			gap: 8px;
			transition: background 0.3s ease;
		}
	
		.dropdown-content a:hover {
			background-color: #f1f1f1;
		}
	
		.dropdown:hover .dropdown-content {
			display: block;
		}
	
		.dropdown img {
			width: 20px;
			border-radius: 3px;
		}
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="index.html"> <img src="/images/logo/logo-landscape.webp" /></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu fa fa-bars fa-2x"></span>
			</button>

			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item"><a href="index.html" class="nav-link">Home</a></li>
					<li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
					<!-- Tours Dropdown -->
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="destination.html" id="toursDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Tours
						</a>
						<div class="dropdown-menu" aria-labelledby="toursDropdown">
						<a class="dropdown-item" href="destination.html">Kenya Safaris</a>
						<a class="dropdown-item" href="destination.html">Kenya-Tanzania Safaris</a>
						</div>
					</li>
					<li class="nav-item"><a href="luxurytours.html" class="nav-link">Luxury Safaris</a></li>
					<li class="nav-item"><a href="hotel.html" class="nav-link">Accommodation</a></li>
                    <li class="nav-item"><a href="gallery.php" class="nav-link">Gallery</a></li>
					<li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
				</ul>

                <!-- Hidden Google Translate widget -->
				<div id="google_translate_element" style="display:none;"></div>
				
				<!-- Dropdown Language Switcher -->
				<div class="dropdown">
					<button class="dropbtn">
						🌐 Language
					</button>
					<div class="dropdown-content">
						<a href="#" onclick="translateLanguage('en')"><img src="https://flagcdn.com/w20/gb.png"> English</a>
						<a href="#" onclick="translateLanguage('fr')"><img src="https://flagcdn.com/w20/fr.png"> Français</a>
						<a href="#" onclick="translateLanguage('es')"><img src="https://flagcdn.com/w20/es.png"> Español</a>
						<a href="#" onclick="translateLanguage('de')"><img src="https://flagcdn.com/w20/de.png"> Deutsch</a>
						<a href="#" onclick="translateLanguage('ru')"><img src="https://flagcdn.com/w20/ru.png"> Русский</a>
						<a href="#" onclick="translateLanguage('ja')"><img src="https://flagcdn.com/w20/jp.png"> 日本語</a>
						<a href="#" onclick="translateLanguage('zh-CN')"><img src="https://flagcdn.com/w20/cn.png"> 中文 (简体)</a>
						<a href="#" onclick="translateLanguage('zh-TW')"><img src="https://flagcdn.com/w20/tw.png"> 中文 (繁體)</a>
						<a href="#" onclick="translateLanguage('sw')"><img src="https://flagcdn.com/w20/tz.png"> Kiswahili</a>
					</div>
				</div>
			</div>
		</div>
	</nav>
 <!-- END nav -->

  <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/webp/img1.webp');">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
      <div class="col-md-9 ftco-animate pb-5 text-center">
       <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span>About us <i class="fa fa-chevron-right"></i></span></p>
       <h1 class="mb-0 bread">Gallery</h1>
     </div>
   </div>
 </div>
</section>

    
    <div class="gallery">
        <?php foreach ($files as $index => $row): ?>
            <div class="item" onclick="openLightbox(<?php echo $index; ?>)">
                <?php if ($row['file_type'] === "image"): ?>
                    <img src="<?php echo $row['file_path']; ?>" alt="">
                <?php else: ?>
                    <video>
                        <source src="<?php echo $row['file_path']; ?>" type="video/mp4">
                    </video>
                <?php endif; ?>
                
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Lightbox -->
    <div id="lightbox" class="lightbox">
        <span class="close-btn" onclick="closeLightbox()">&times;</span>
        <span class="nav-btn prev" onclick="changeSlide(-1)">&#10094;</span>
        <div id="lightbox-content" class="lightbox-content"></div>
        <span class="nav-btn next" onclick="changeSlide(1)">&#10095;</span>
    </div>

    <footer class="ftco-footer bg-bottom ftco-no-pt" style="background-image: url(images/bg_3.jpg);">
			<div class="container">
				<div class="row mb-5">
					<div class="col-md pt-5">
						<div class="ftco-footer-widget pt-md-5 mb-4">
							<h2 class="ftco-heading-2">About</h2>
							<p>Abok Adventures is a premier travel agency specializing in unforgettable African safaris across Kenya and Tanzania. We craft authentic experiences that connect travelers with the breathtaking landscapes, diverse wildlife, and rich cultures of East Africa.</p>
							<ul class="ftco-footer-social list-unstyled float-md-left float-lft">
								<li class="ftco-animate"><a href="https://www.tiktok.com/@abokadventuresandsafaris" target="_blank"><span class="fa-brands fa-tiktok"></span></a></li>
								<li class="ftco-animate"><a href="https://www.facebook.com/profile.php?id=61579892807201" target="_blank"><span class="fa fa-facebook"></span></a></li>
								<li class="ftco-animate"><a href="https://www.instagram.com/abokadventuresandsafaris/" target="_blank"><span class="fa fa-instagram"></span></a></li>
							</ul>
						</div>
					</div>
					<div class="col-md pt-5 border-left">
						<div class="ftco-footer-widget pt-md-5 mb-4 ml-md-5">
							<h2 class="ftco-heading-2">Infromation</h2>
							<ul class="list-unstyled">
								<li><a href="contact.html" class="py-2 d-block">Online Enquiry</a></li>
								<li><a href="termsandconditions.html" class="py-2 d-block">Terms & Conditions</a></li>
								<li><a href="privacy.html" class="py-2 d-block">Privacy</a></li>
								<li><a href="refund.html" class="py-2 d-block">Refund Policy</a></li>
								<li><a href="contact.html" class="py-2 d-block">Call Us</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md pt-5 border-left">
						<div class="ftco-footer-widget pt-md-5 mb-4">
							<h2 class="ftco-heading-2">Experience</h2>
							<ul class="list-unstyled">
								<li><a href="destination.html" class="py-2 d-block">Adventure</a></li>
								<li><a href="hotel.html" class="py-2 d-block">Hotel and Restaurant</a></li>
								<li><a href="destination.html" class="py-2 d-block">Beach</a></li>
								<li><a href="destination.html" class="py-2 d-block">Nature</a></li>
								<li><a href="hotel.html" class="py-2 d-block">Camping</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md pt-5 border-left">
						<div class="ftco-footer-widget pt-md-5 mb-4">
							<h2 class="ftco-heading-2">Have a Questions?</h2>
							<div class="block-23 mb-3">
								<ul>
									<li><span class="icon fa fa-map-marker"></span><span class="text">CBD Nairobi, Kenya</span></li>
									<li><a href="https://wa.me/254759335885" target="_blank"><span class="icon fa fa-phone"></span><span class="text">+2547 59335885</span></a></li>
									<li><a href="contact.html"><span class="icon fa fa-paper-plane"></span><span class="text">info@abokadventures.com</span></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 text-center">

						<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved Abok Adventures & Safaris <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
						</div>
					</div>
				</div>
		</footer>
			
			 <div class="whatsapp-popup">
				<div class="popup-message" id="popupMsg">
				👋 Chat with us on WhatsApp!
				</div>
				<a href="https://wa.me/254759335885" target="_blank" class="whatsapp-btn" id="whatsappBtn">
				<i class="fa-brands fa-whatsapp"></i>
				</a>
  			</div>

			<!-- loader -->
			<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

            <!-- Google Translate -->
			<script type="text/javascript">
				function googleTranslateElementInit() {
				new google.translate.TranslateElement(
					{
					pageLanguage: 'en',
					includedLanguages: 'fr,es,de,it,sw,zh-CN,zh-TW,ru,ja'
					},
					'google_translate_element'
				);
				}
	
				function translateLanguage(lang) {
				var selectField = document.querySelector("select.goog-te-combo");
				if (selectField) {
					selectField.value = lang;
					selectField.dispatchEvent(new Event("change"));
				}
				}
			</script>
			
			<script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

			<script src="https://kit.fontawesome.com/885a9fc41f.js" crossorigin="anonymous"></script>
			<script src="js/jquery.min.js"></script>
			<script src="js/jquery-migrate-3.0.1.min.js"></script>
			<script src="js/popper.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
			<script src="js/jquery.easing.1.3.js"></script>
			<script src="js/jquery.waypoints.min.js"></script>
			<script src="js/jquery.stellar.min.js"></script>
			<script src="js/owl.carousel.min.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>
			<script src="js/jquery.animateNumber.min.js"></script>
			<script src="js/bootstrap-datepicker.js"></script>
			<script src="js/scrollax.min.js"></script>
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
			<script src="js/google-map.js"></script>
			<script src="js/main.js"></script>
			<script src="js/whatsapp.js"></script>

			<script>
				// Highlight active navbar link
				document.addEventListener("DOMContentLoaded", function () {
					const currentPath = window.location.pathname.split("/").pop(); // e.g. "about.html"
					const navLinks = document.querySelectorAll(".navbar-nav .nav-link");

					navLinks.forEach(link => {
					const linkPath = link.getAttribute("href").split("/").pop();
					if (linkPath === currentPath) {
						link.parentElement.classList.add("active"); // adds active class to <li>
					}
					});
				});
			</script>

        <script>
        const files = <?php echo json_encode($files); ?>;
        let currentIndex = 0;

        function openLightbox(index) {
            currentIndex = index;
            showSlide(currentIndex);
            document.getElementById("lightbox").style.display = "flex";
        }

        function showSlide(index) {
            const content = document.getElementById("lightbox-content");
            const file = files[index];
            if (file.file_type === "image") {
                content.innerHTML = `<img src="${file.file_path}" alt="">`;
            } else {
                content.innerHTML = `<video controls autoplay><source src="${file.file_path}" type="video/mp4"></video>`;
            }
        }

        function changeSlide(step) {
            currentIndex += step;
            if (currentIndex < 0) currentIndex = files.length - 1;
            if (currentIndex >= files.length) currentIndex = 0;
            showSlide(currentIndex);
        }

        function closeLightbox() {
            document.getElementById("lightbox").style.display = "none";
            document.getElementById("lightbox-content").innerHTML = "";
        }

        // Close lightbox on click outside
        document.getElementById("lightbox").addEventListener("click", function(e) {
            if (e.target === this) closeLightbox();
        });

        // Keyboard navigation
        document.addEventListener("keydown", function(e) {
            if (document.getElementById("lightbox").style.display === "flex") {
                if (e.key === "ArrowRight") changeSlide(1);
                if (e.key === "ArrowLeft") changeSlide(-1);
                if (e.key === "Escape") closeLightbox();
            }
        });
    </script>
</body>
</html>
