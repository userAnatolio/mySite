<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="utf-8">	
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?php echo $titlePage ?></title>
		<link href="/style/bootstrap.min.css" rel="stylesheet">
		<link href="/style/style.css" rel="stylesheet">
		<link href = "https://fonts.googleapis.com/css?family= Gugi " rel = "stylesheet">
		<script src="jQuery/jQuery.js"></script>
		<script src="https://api-maps.yandex.ru/2.1/?apikey=04667861-63a6-4e63-bb5b-ad5defc1cb28&lang=ru_RU" type="text/javascript"></script>
	</head>
	<body>	

		<div id="wrapper" class="container-fluid">
		<div >
			<div class="row" id="net">
			<div class="col-xs-12 col-sm-8 col-md-6">
			<?php echo $htmlLinkIcon?>
			</div>
			</div>
			
			<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-6" id="logo"><a href="/">Pixel.ru</a></div>
			<div class="col-xs-12 col-sm-8 col-md-6" id="slogan"><a href="db/admin.php">admin</a></div>
			<div class="col-xs-12 col-sm-8 col-md-6" id="logotip"><img src=""></div>
			</div>
			
				<header class="row">
							<nav class="col-xs-12 col-sm-8 col-md-6">
								<?php echo $htmlMenu?>
							</nav>
							<script src="JS/ajaxMenu.js"></script>
							<div id="baner" class="col-xs-12 col-sm-8 col-md-6">
							<?php
							if(!empty($_GET['titlePage']) or !empty($_GET['nameText'])) include 'pageMenu/compendium.php';
							?>
							</div>
							<div class="col-xs-12 col-sm-8 col-md-6"></div>
				</header>
				
				<main class="row">
					<div id="content" class="col-xs-4 col-sm-8 col-md-12">
					<?php echo $htmlContent?>
					</div>
					<div></div>
				</main>	
				
				<footer id="footer" class="row">
					<?php echo $htmlFooter?>
				</footer>
		</div>		
		</div>
	</body>
</html>