<!doctype html>
<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<title>Серафима Дидковская</title>
		<link rel="shortcut icon" href="/statics/images/main/ico.jpg">
		<link rel="stylesheet" href="/statics/styles/main.css">
		<link rel="stylesheet" href="/statics/styles/gallery.css">
		<link rel="stylesheet" href="/statics/thirdPartyLibs/owl-carousel/owl.carousel.css">
		<link rel="stylesheet" href="/statics/thirdPartyLibs/owl-carousel/owl.theme.css">
		<script type="text/javascript" src="/statics/scripts/libs/jquery-1.11.1.min.js"></script>
		<script type="text/javascript" src="/statics/thirdPartyLibs/owl-carousel/owl.carousel.min.js"></script>
		<script type="text/javascript" src="/statics/scripts/mainLayoutInit.js"></script>
	</head>
	<body>
		<div class="window-border top"></div>
		<div class="window-border bottom"></div>
		<div class="window-border right"></div>
		<div class="window-border left"></div>
		<div class="whole-page-wrapper">
			<header class="header-wrapper">
				<div class="header-wrapper-inner">
					<div class="header-container">
						<div class="header-logo">
							<a href="/">
							<img class="header-logo-image" src="/statics/images/main/logo.jpg">
							</a>
						</div>
						<nav class="header-main-site-nav">
							<ul class="header-main-site-nav-menu">
								<li class="header-main-site-nav-menu-item main-menu-item">
									<a href="/">Главная</a>
								</li>
								<li class="header-main-site-nav-menu-item main-menu-item">
									<a href="/about">Обо мне</a>
								</li>
								<li class="header-main-site-nav-menu-item main-menu-item">
									<a href="/gallery" onclick="return false;">Галерея</a>
									<div class="header-main-site-sub-nav">
										<ul class="header-main-site-sub-nav-menu">
											<li class="header-main-site-sub-nav-menu-item main-menu-item">
												<a href="/gallery">Все товары</a>
											</li>
											<li class="header-main-site-sub-nav-menu-item main-menu-item">
												<a href="/gallery/men">Для мужчин</a>
											</li>
											<li class="header-main-site-sub-nav-menu-item main-menu-item">
												<a href="/gallery/women">Для дам</a>
											</li>
											<li class="header-main-site-sub-nav-menu-item main-menu-item">
												<a href="/gallery/kids">Для Маленьких</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="header-main-site-nav-menu-item main-menu-item">
									<a href="/faq">FAQ</a>
								</li>
								<li class="header-main-site-nav-menu-item main-menu-item">
									<a href="/contacts">Контакты</a>
								</li>
							</ul>
						</nav>
						<div class="header-container-ruler"></div>
					</div>
				</div>
			</header>
			<div class="main-content-wrapper">
				<div class="main-content-container">
					@yield('content', 'Hmm, that\'s interesting! I don\'t know what to say...')
				</div>
			</div>
			<footer class="footer-wrapper">
				<div class="footer-inner">
					<div class="footer-container-ruler"></div>
					<div class="footer-social-networks-container">
						<a href="https://twitter.com/DidkovskaSima" target="_blank"><i class="footer-social-networks-icon twitter-com"></i></a>
						<a href="https://vk.com/simadidkovskaya" target="_blank"><i class="footer-social-networks-icon vk-com"></i></a>
						<a href="http://instagram.com/didkovskayasima" target="_blank"><i class="footer-social-networks-icon instagram-com"></i></a>
						<a href="https://www.facebook.com/simadidkovskaya" target="_blank"><i class="footer-social-networks-icon facebook-com"></i></a>
						<a href="mailto:didkovskayasima@gmail.com" target="_blank"><i class="footer-social-networks-icon mail"></i></a>
					</div>
					<div class="copyright-like">
						<a href="http://valentin-kostiuk.16mb.com" target="_blank">2014 by vk<sup>&copy;</sup></a>
					</div>
				</div>
			</footer>
		</div>
	</body>
</html>