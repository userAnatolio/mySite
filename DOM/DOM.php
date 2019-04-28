<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset=utf-8">	
		<title>Главная</title>	
		<link rel="stylesheet" href="/mySite/css/style.css">
		<script src="jQuery/jQuery.js"></script>
		<script src="JS/ajaxMenu.js"></script>
	</head>
	<body>
		<div id="wrapper">
			<menu>
				<?php
					if(file_exists('menu/menu.php'))
					{
					include 'menu/menu.php';
					}
					
					else echo 'Файл не существует';
				?>
			</menu>
			<main>
				<div id="content">
				</div>
			</main>
			<footer>
			</footer>
		</div>
	</body>
</html>