<!doctype html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Серафима Дидковская</title>
	<link rel="shortcut icon" href="/statics/images/main/ico.jpg">
	<link rel="stylesheet" href="/statics/styles/main.css">
	<link rel="stylesheet" href="/statics/thirdPartyLibs/owl-carousel/owl.carousel.css">
	<link rel="stylesheet" href="/statics/thirdPartyLibs/owl-carousel/owl.theme.css">
	<script type="text/javascript" src="/statics/scripts/libs/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="/statics/thirdPartyLibs/owl-carousel/owl.carousel.min.js"></script>
	<script type="text/javascript" src="/statics/scripts/mainLayoutInit.js"></script>
	@yield('headerTags')
</head>
<body>
<div class="whole-page-wrapper">
	<header class="header-wrapper">
		<div class="header-wrapper-inner">
			<div class="header-container">
				<nav class="header-main-site-nav">
							<span class="header-logo">
								<a href="/">
									<img class="header-logo-image" src="/statics/images/main/logo.png">
								</a>
							</span>
					<ul class="header-main-site-nav-menu">
						<li class="header-main-site-nav-menu-item main-menu-item">
							<a href="/">Главная</a>
						</li>
						<li class="header-main-site-nav-menu-item main-menu-item">
							<a href="/gallery">Галерея</a>
						</li>
						<li class="header-main-site-nav-menu-item main-menu-item">
							<a href="/articles">FAQ</a>
						</li>
						<li class="header-main-site-nav-menu-item main-menu-item">
							<a href="/contacts">Контакты</a>
						</li>
					</ul>
				</nav>
				<div class="header-container-ruler"></div>
			</div>
		</div>
		<div class="header-container-ruler"></div>
	</header>
	<div class="main-content-wrapper">
		<div class="main-content-container">
			@yield('content', 'Hmm, that\'s interesting! I don\'t know what to say...')
		</div>
	</div>
	<footer class="footer-wrapper">
		<div class="footer-container-ruler"></div>
		<div class="footer-inner">
			<nav class="footer-main-site-nav">
				<ul class="footer-main-site-nav-menu">
					<li class="footer-main-site-nav-menu-item main-menu-item">
						<a href="/">Главная</a>
					</li>
					<li class="footer-main-site-nav-menu-item main-menu-item">
						<a href="/gallery">Галерея</a>
					</li>
					<li class="footer-main-site-nav-menu-item main-menu-item">
						<a href="/articles">FAQ</a>
					</li>
					<li class="footer-main-site-nav-menu-item main-menu-item">
						<a href="/contacts">Контакты</a>
					</li>
				</ul>
				<span class="footer-social-networks-container">
					<a href="https://vk.com/simadidkovskaya" target="_blank">
						<i class="footer-social-networks-icon vk-com"></i>
					</a>
					<a href="http://instagram.com/didkovskayasima" target="_blank">
						<i class="footer-social-networks-icon instagram-com"></i>
					</a>
					<a href="https://www.facebook.com/simadidkovskaya" target="_blank">
						<i class="footer-social-networks-icon facebook-com"></i>
					</a>
					<a href="mailto:didkovskayasima@gmail.com" target="_blank">
						<i class="footer-social-networks-icon mail"></i>
					</a>
				</span>
			</nav>
			<div class="copyright-like">
				<a href="https://vk.com/mariia_diachenko" target="_blank">2015 designed by MD<sup>&copy;</sup></a>
			</div>
		</div>
	</footer>
</div>
</body>
</html>