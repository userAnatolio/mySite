<?php
	header( 'Content-Type: text/html; charset=utf-8' );
	$host = 'localhost';
	$user = 'root';
	$password = '';
	$db_name = 'my_site';
	$link = mysqli_connect($host, $user, $password, $db_name);
	mysqli_query($link, "SET NAMES UTF8");
	
	function getHtmlContent($link)
		{
			$nameTable = $_GET['nameTable'];
			$nameText = $_GET['nameText'];
			$query = "SELECT `id`, `name_text`, `text_content` FROM $nameTable HAVING `name_text`='".$nameText."'";
			$getSql = mysqli_query($link, $query) or die(mysqli_error($link));
			for($data=[]; $result = mysqli_fetch_assoc($getSql); $data[]=$result);
			return $data[0]['text_content'];
		}

	
?>