<?php
session_start();
//***************************************************************************************
//Эта часть кода работает с файлом .htaccess
	if($_SERVER['REQUEST_URI'] == '/mySite/') $page = 'home';
		else
		{
			$page = substr($_SERVER['REQUEST_URI'], 8);
			if(!preg_match('#^[A-z0-9]{3,15}$#', $page)) exit('error url');
		}
		
	//$_SESSION['u_login'] == 3;
	//Здесь еще будет добавлено условие - "если пользователь отмечен в сессии"
	$statusPage = true;
	if(file_exists('all/' . $page . '.php')) include 'all/' . $page . '.php';
	else if(file_exists('auth/' . $page . '.php')) include 'auth/' . $page . '.php';
	else if(file_exists('guest/' . $page . '.php')) include 'guest/' . $page . '.php';
	else
	{
		if($page != 'home') 
		{
			$statusPage = false;
		}
	}
	//var_dump($page);
//****************************************************************************************

	if($page == 'home') $title = 'home';
	
	//Создаем переменную с содержимым иконок соц. сетей
	if(file_exists('linkIcon/linkIcon.php'))
	{
		$htmlLinkIcon = file_get_contents('linkIcon/linkIcon.php');
	}
	else
	{
		$htmlLinkIcon = file_get_contents('content/notFind.php');
	}

//Создаем переменную с содержимым меню...
	if(file_exists('menu/menu.php'))
	{
		$htmlMenu = file_get_contents('menu/menu.php');
	}
	else
	{
		$htmlMenu = file_get_contents('content/notFind.php');
	}
		
// Создаем переменную с содержимым контента
	if(file_exists('content/content.php'))
	{
		$htmlContent = file_get_contents('content/content.php');
	}
	else
	{
		$htmlContent = file_get_contents('content/notFind.php');
	}
		
//Создаем переменную с содержимым футера
	if(file_exists('footer/footer.php'))
		{
			$htmlFooter = file_get_contents('footer/footer.php');
		}
	else
	{
		$htmlFooter = file_get_contents('content/notFind.php');
	}


if(file_exists('DOM/DOM.php') and $statusPage)
	{
		include 'DOM/DOM.php';
	}

	else
	{
		include 'content/notFind.php';
	}
	
	
?>