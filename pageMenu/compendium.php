<?php
spl_autoload_register(function ($class_name) {
include $_SERVER['DOCUMENT_ROOT'] . '/classSite/'. $class_name . '/' . $class_name . '.php';
});

$onDb = new OnDb('my_site'); // Указываем имя бызы данных, подключаем..
$link = $onDb -> getLink();



//**************Загружаю топ тем******************************
if(!empty($_GET['idParent']))
{
	$getAllDataTable = new GetAllDataTable($link, $nameTable);
	$idParent = $_GET['idParent'];
	$data = $getAllDataTable -> getTopic($link, $idParent);
	foreach($data as $elem)
	{
		echo '<li><a myattribute='.$elem['id'].' class="getPages" href=' . $elem['url_page'].'&id='.$elem['id'].'>' . $elem['name'] . '</a></li>';
	}
}


if(!empty($_GET['idParent']) and !empty($_GET['getLink']))
{
	$idParent = $_GET['idParent'];
	$getAllDataTable = new GetAllDataTable($link, $nameTable);
	$data = $getAllDataTable -> getPages($link, $idParent);
	foreach($data as $elem)
	{
		
		echo '<li><a href="'.$elem['url_page'] .'&id=' . $idParent . '#' .$elem['name_text']. '">' . $elem['name_text'] . '</a></li>'; // названия страниц + сылка родителя + якорь
	}
}

?>
