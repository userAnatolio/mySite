<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset="utf-8">	
		<title><?php echo $titlePage ?></title>
		<link rel="stylesheet" href="/css/style.css">
		<link href = "https://fonts.googleapis.com/css?family= Gugi " rel = "stylesheet">
		<script src="jQuery/jQuery.js"></script>
		<script src="https://api-maps.yandex.ru/2.1/?apikey=04667861-63a6-4e63-bb5b-ad5defc1cb28&lang=ru_RU" type="text/javascript"></script>
	</head>
	<body>	
		<div id="wrapper">
			<div class="center">
				<?php echo $htmlLinkIcon?>
				<header>
						<div id="logo">
							<a href="/">Pixel.ru</a>
						</div>
						<div id="slogan"></div>
							<nav>
								<?php echo $htmlMenu?>
							</nav>
							<script src="JS/ajaxMenu.js"></script>
						<div id="logotip"><img src=""></div>
						
						<div id="banerFather"><div id="baner">
						<?php
						if(!empty($_GET['titlePage']) or !empty($_GET['nameText'])) include 'pageMenu/compendium.php';
						?>
						</div></div>
						
				</header>
				<main>
					<div id="content">
					<?php echo $htmlContent?>
					</div>
				</main>	
				
				<footer>
					<?php echo $htmlFooter?>
				</footer>
			</div>
		</div>
	</body>
</html>