<?php

	$_GET['page'] = 'start';

	if(file_exists('menu/menu.php'))
		{
			include 'DOM/DOM.php';
		}
	else echo 'Файл не существует';

?>

