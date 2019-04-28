<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset=utf-8">	
		<title>Главная</title>	
		<link rel="stylesheet" href="/mySite/css/style.css">
		<script src="jQuery/jQuery.js"></script>
	</head>
	<body>	
	
		<div id="net">
			<div class="center">
				<a href="https://vk.com/public161733877" target="_blank"><img src="img/vk2.png" width="25px"></a>
				<a href="http://whatsap.me/pixel" target="_blank"><img src="img/whatsapp2.png" width="25px"></a>
				<a href="https://www.instagram.com/toly87/" target="_blank"><img src="img/instagram2.png" width="25px"></a>
				<a href="https://www.facebook.com/anatol.anatolio" target="_blank"><img src="img/facebook2.png" width="27px"></a>
				<a href="https://github.com/Anatolio87" target="_blank"><img src="img/github2.png" width="25px"></a>
				<a href="https://habrahabr.ru/users/tolik-programist/" target="_blank"><img src="img/habrahabr2.png" width="25px"></a>
			</div>
		</div>
	
		<div id="wrapper">
			<header>
				<div class="center">
					<div id="logo">
						<a href="/mySite/inner.php">Pixel.ru</a>
					</div>
					<div id="slogan"></div>
						<nav>
							<?php
								if(file_exists('menu/menu.php'))
								{
									include 'menu/menu.php';
								}
								else echo 'Файл не существует';
							?>
						</nav>
					<div id="logotip"><img src=""></div>
				</div>
			</header>
			
			<script src="JS/ajaxMenu.js"></script>
			<main>
				<div class="center">
					<div id="content">
						<?php // Альтернатива AJAX использовать include для загрузки содержимого подключаемыми страницами.
							if($_GET['page'] = 'start')
								{
									if(file_exists('content/content.php'))
									{
										include 'content/content.php';
									}
									else echo 'Файл не существует';
								}
							else 
								{
									if(file_exists('content/' . $_GET['page']))
									{
										include 'content/'. $_GET['page'];
									}
									else echo 'Файл не существует';
								}
								
						?>
					</div>
				</div>
			</main>
			<footer>
				<?php
					if(file_exists('footer/footer.php'))
					{
						include 'footer/footer.php';
					}
					else echo 'Файл не существует';
				?>
			</footer>
		</div>
	</body>
</html>