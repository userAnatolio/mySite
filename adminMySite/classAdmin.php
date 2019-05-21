<?php
spl_autoload_register(function ($class_name) {
include $_SERVER['DOCUMENT_ROOT'] . '/classSite/'. $class_name . '/' . $class_name . '.php';
});

$onDb = new OnDb('my_site'); // Указываем имя бызы данных, подключаем..
$link = $onDb -> getLink();





//*******Создать новую тему**********************
if(!empty($_GET['nameTopic']) and !empty($_GET['idParent']))
{
new CreateTopic($link, $_GET['nameTopic'], $_GET['idParent']);
}






//*******Получаем данные конкретной таблицы, по умолчанию $nameText=''*****

$getAllDataTable = new GetAllDataTable($link, $nameTable);
	
if(!empty($_GET['showTable']) and !empty($_GET['idParent']))
{
	$idParent = $_GET['idParent'];
	$arrData = $getAllDataTable -> getDataTable($link, $idParent);
	new ShowTable($arrData, $idParent);
}

if(!empty($_GET['nameQuery']) and !empty($_GET['idParent']))
{
	$idParent = $_GET['idParent'];
	$data = $getAllDataTable -> getTopic($link, $idParent);
	
	foreach($data as $elem)
		{
			echo '<li class="getPages" href="'.$elem['id'].'">'.$elem['name'].'</li'.'<br>';
		}
}
	





//*******Изменяем данные конкретной таблицы*****************************************************
if(!empty($_POST['nameTable']) and !empty($_POST['idParent']) and !empty($_POST['nameText']) and !empty($_POST['textContent'])  and $_POST['status'] == 'changePage')
{
$nameTable = 'pages_site';
$id = $_POST['id'];
$idParent = $_POST['idParent'];
$nameText = $_POST['nameText'];
$textContent = $_POST['textContent'];
$textTitle = $_POST['textTitle'];
$updateTable = new UpdateTable($link, $id, $idParent, $nameTable, $nameText, $textContent, $textTitle);
}



//*******Добавляем данные конкретной таблицы*****************************************************
if(!empty($_POST['nameTable']) and !empty($_POST['idParent']) and $_POST['status'] == 'insert')
{
$idParent = $_POST['idParent'];
$nameTable = $_POST['nameTable'];
$nameText = $_POST['nameText'];
$textContent = $_POST['textContent'];
$textTitle = $_POST['textTitle'];
$insertTable = new InsertTable($link, $nameTable, $nameText, $textContent, $textTitle, $idParent);
}




//*******Выводим форму для изменения таблицы*****************************************************
if(!empty($_GET['nameTable']) and !empty($_GET['idParent']) and !empty($_GET['status']))
{
new GetFormChangeTable($link, $_GET['idParent']);
}









?>