<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Admin Dashboard</title>
		<link rel="shortcut icon" href="//jquery.com/jquery-wp-content/themes/jquery.com/i/favicon.ico">
		<link rel="stylesheet" href="statics/styles/main.css">
		<script type="text/javascript" src="statics/scripts/libs/jquery-1.11.1.min.js"></script>
		<script type="text/javascript" src="statics/scripts/mainLayoutInit.js"></script>
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
						<h1>Welcome To System Dashboard</h1>
						<nav class="header-main-site-nav">
							<ul class="header-main-site-nav-menu">
								<li class="header-main-site-nav-menu-item main-menu-item">
									<a href="/dashboard">Dashboard</a>
								</li>
								<li class="header-main-site-nav-menu-item main-menu-item">
									<a href="/dashboard/users/create">Create new user</a>
								</li>
								<li class="header-main-site-nav-menu-item main-menu-item">
									<a href="/dashboard/carousel/addNewImage">Add New Image To Carousel</a>
								</li>
								<li class="header-main-site-nav-menu-item main-menu-item">
									<a href="/dashboard/gallery/addNewItem">Add New Image To Gallery</a>
								</li>
								<li class="header-main-site-nav-menu-item main-menu-item">
									<a href="dashboard/contactAdmin">Contact Admin</a>
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
					<div class="copyright-like">
						<a href="http://valentin-kostiuk.16mb.com" target="_blank">2014 by vk<sup>&copy;</sup></a>
					</div>
				</div>
			</footer>
		</div>
	</body>
</html>