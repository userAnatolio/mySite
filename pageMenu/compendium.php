<?php
	$host = 'localhost';
	$user = 'root';
	$password = '';
	$db_name = 'my_site';
	$link = mysqli_connect($host, $user, $password, $db_name);
	mysqli_query($link, "SET NAMES UTF8");
	
	function getDataLinkPage($link)
		{
			$nameTable = $_GET['nameTable'];
			$query = "SELECT `id`, `name_text`, `text_content`, `title_text`, `url_page` FROM $nameTable";
			$getSql = mysqli_query($link, $query) or die(mysqli_error($link));
			for($data=[]; $result = mysqli_fetch_assoc($getSql); $data[]=$result);
			return $data;
		}
	$dataLink = getDataLinkPage($link);
	
	function createLinkMenu($dataLink, $class)
	{
		echo '<ul>';
		foreach($dataLink as $elem)
		{
		echo '<li><a href="'.$elem['url_page'].'">'.$elem['name_text'].'</a></li>';
		}
		echo '</ul>';
	}
	createLinkMenu($dataLink, 'test');
 ?>
