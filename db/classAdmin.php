<?php
spl_autoload_register(function ($class_name) {
include $class_name . '.php';
});

$onDb = new OnDb('my_site'); // Указываем имя бызы данных, подключаем..
$link = $onDb -> getLink();

//*******Создать новую таблицу**********************
if(!empty($_GET['nameNewCreateTable']))
{
new CreateTable($link, $_GET['nameNewCreateTable']);
}



//*******Получаем данные конкретной таблицы, по умолчанию $nameText=''*****
if(!empty($_GET['nameTable']) and !empty($_GET['showTable']))
{
$nameTable = $_GET['nameTable'];
$getAllDataTable = new GetAllDataTable($link, $nameTable, $nameText);
$arrData = $getAllDataTable -> getData();
new ShowTable($arrData);
}




//*******Изменяем данные конкретной таблицы*****************************************************
if(!empty($_GET['nameTable']) and !empty($_GET['id']) and !empty($_GET['nameText']) and !empty($_GET['textContent'])  and !empty($_GET['textContent']))
{
$nameTable = $_GET['nameTable'];
$id = $_GET['id'];
$nameText = $_GET['nameText'];
$textContent = $_GET['textContent'];
$textTitle = $_GET['textTitle'];
$updateTable = new UpdateTable($link, $id, $nameTable, $nameText, $textContent, $textTitle);
}




//*******Добавляем данные конкретной таблицы*****************************************************
if(!empty($_GET['nameTable']) and !empty($_GET['nameText']) and $_GET['status'] == 'insert')
{
$nameTable = $_GET['nameTable'];
$nameText = $_GET['nameText'];
$textContent = $_GET['textContent'];
$textTitle = $_GET['textTitle'];
$insertTable = new InsertTable($link, $nameTable, $nameText, $textContent, $textTitle);
}




//*******Выводим форму для изменения таблицы*****************************************************
if(!empty($_GET['nameTable']) and !empty($_GET['nameText']) and $_GET['status'] == 'showTable')
{
new GetFormChangeTable($link);
}









?>