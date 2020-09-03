<!DOCTYPE html>
<html lang="en">
	<head>
		
		<!-- Required meta tags -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta charset="utf-8">	
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?php echo $titlePage ?></title>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link href="/style/style.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Audiowide&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Exo+2&display=swap&subset=cyrillic" rel="stylesheet">
		 <link href="https://fonts.googleapis.com/css?family=Russo+One&display=swap&subset=cyrillic" rel="stylesheet">
		<script src="jQuery/jQuery.js"></script>
		<script src="https://api-maps.yandex.ru/2.1/?apikey=04667861-63a6-4e63-bb5b-ad5defc1cb28&lang=ru_RU" type="text/javascript"></script>
	</head>
	
	
	<body>	
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

		<div id="wrapper" class=".container p-3 mb-2">
		<div >
			<div class="row" id="net">
			<div class="col-md-4">
			<?php echo $htmlLinkIcon?>
			</div>
			<div class="col-md-4"><a href="#">Логотип</a></div>
			<div class="col-md-4"><a href="adminMySite/admin.php">admin</a></div>
			</div>
			
			<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-6" id="logo"><a href="/"><h1 class="nameSite">Ushiro.ru</h1></a></div>
			<div class="col-xs-12 col-sm-8 col-md-6" id="slogan"></div>
			<div class="col-xs-12 col-sm-8 col-md-6" id="logotip"><img src=""></div>
			</div>
			
				<header class="row">
							<nav class="col-md-4">
								<?php echo $htmlMenu?>
							</nav>
							
							<div id="baner1" class="col-md-4">
							<?php
							if(!empty($_GET['titlePage']) or !empty($_GET['nameText'])) include 'pageMenu/compendium.php';
							?>
							</div>
							<div class="col-md-4"><ul id="baner2"></ul></div>
							<script src="JS/ajaxMenu.js"></script>
				</header>
				
				<main class="row">
					<div id="content" class="col-xs-4 col-sm-8 col-md-12 ">
					<?php 
					if(!empty($_GET['nameTopic']) and !empty($_GET['titlePage'])) getContent($link);
					else echo $htmlContent;
					?>
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
