<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset="utf-8">	
		<title><?php echo $title ?></title>
		<link rel="stylesheet" href="/mySite/css/style.css">
		<link href = "https://fonts.googleapis.com/css?family= Gugi " rel = "stylesheet">
		<script src="jQuery/jQuery.js"></script>
	</head>
	<body>	
		<div id="wrapper">
			<div class="center">
				<?php echo $htmlLinkIcon?>
				<header>
						<div id="logo">
							<a href="/mySite">Pixel.ru</a>
						</div>
						<div id="slogan"></div>
							<nav>
								<?php echo $htmlMenu?>
							</nav>
							<script src="JS/ajaxMenu.js"></script>
						<div id="logotip"><img src=""></div>
						<div id="banerFather"><?php echo $banerText ?><div id="baner"></div>
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