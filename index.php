<?php
header( 'Content-Type: text/html; charset=utf-8' );
setcookie('test', $_GET['idParent']);
session_start();
spl_autoload_register(function ($class_name) {
include $_SERVER['DOCUMENT_ROOT'] . '/classSite/'. $class_name . '/' . $class_name . '.php';
});

$onDb = new OnDb('my_site');
$link = $onDb -> getLink();

//***************************************************************************************
//Эта часть кода работает с файлом .htaccess
	if($_SERVER['REQUEST_URI'] == '/') $page = 'home';
		else
		{
			$page = substr($_SERVER['REQUEST_URI'], 1);
			if(!preg_match('#.{3,50}#', $page)) exit('error url');
		}		
	//$_SESSION['u_login'] == 3;
	//Здесь еще будет добавлено условие - "если пользователь отмечен в сессии"
	$statusPage = true;
	// if(file_exists('all/' . $page . '.php')) include 'all/' . $page . '.php';
	// else if(file_exists('auth/' . $page . '.php')) include 'auth/' . $page . '.php';
	// else if(file_exists('guest/' . $page . '.php')) include 'guest/' . $page . '.php';
	// else if(file_exists('content/' . $page . '.php')) include 'content/' . $page . '.php';
	// else
	// {
		// if($page != 'home') 
		// {
			// $statusPage = false;
		// }
	// }
	//var_dump($page);
//****************************************************************************************
	
	

	//Получаю данные таблицы из базы заполняю контент содержание с якорями + текст
	function getContent($link){
	$idParent = $_GET['id'];
	$nameTopic = $_GET['nameTopic'];
	$getAllDataTable = new GetAllDataTable($link, $nameTable);
	$data = $getAllDataTable -> getPages($link, $idParent);
	echo '<h2 class="nameSite">'.$nameTopic.'</h2>';
	echo '<h4>Содеражание страницы</h4>';
	echo '<ol>';
	foreach($data as $elem)
	{
		echo '<li><a href="#'. $elem['name_text'] .'">' . $elem['name_text'] . '</a></li>'; // Содеражание с сылкой на якорь
	}
	echo '</ol>';
	foreach($data as $elem)
	{
		echo '<h4><a id="'.$elem['name_text'].'"></a>'. $elem['name_text'] .'</h4>'; //Якорь
		echo '<p>' . $elem['text_content'] . '</p>';
	}
	
	}
	
	//Грузим тайтл
	if($page == 'home') $titlePage = 'home';
	else $titlePage = $_GET['titlePage'];
	
	require_once 'pageMenu/compendium.php';
	
	
	
	
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
	if(file_exists('content/content.php')) $htmlContent = file_get_contents('content/content.php');
	else $htmlContent = file_get_contents('content/notFind.php');
		
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


