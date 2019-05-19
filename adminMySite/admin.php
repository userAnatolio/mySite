<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta charset="utf-8">	
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<title>Шаблон</title>
<style>
body {
background: #5d5d5d;
color: white;
}
td {
    border: 1px solid;
    width: 100px;
    height: 50px;
}

.red {
	text-align: center;
	height: 50px;
}

a {color: while; text-decoration: none; font-size: 20px;}
.testDiv { padding: 5px; margin: 20px 0
</style>

</head>
<body>
<div class="container">
<div class="row">
<?php
//**************Автозагрузка классов*******************
spl_autoload_register(function ($class_name) {
include $_SERVER['DOCUMENT_ROOT'] . '/classSite/'. $class_name . '/' . $class_name . '.php';
});


$onDb = new OnDb("my_site"); // Указываем имя бызы данных, подключаем..
$link = $onDb -> getLink();


//**************Меню админки*********
echo '<div class="col">';
$getAllDataTable = new GetAllDataTable($link, 'table_site');
$tableSite = $getAllDataTable -> getData();
foreach($tableSite as $elem)
{
echo '<h3 class="getTopic" href="'.$elem['id'].'">' . $elem['name'] . '</h3>';
echo '<div>
<ul id="baner'.$elem['id'].'"></ul>
<input type="text" placeholder="имя темы" id="text'.$elem['id'].'" >
<button class="clickCreate" href="'.$elem['id'].'">Создать новую тему</button><button class="backCreate">Отмена</button>
</div>';
}
echo '</div>';
?>

<script src="/jQuery/jQuery.js"></script>

<script>

//*******Получаю таблицу с темами*******
$('.getTopic').click(function(){
	var idTopic = $(this).attr('href');
	$.ajax({
			type: "GET",
			url: 'classAdmin.php',
			data: 'nameQuery=topics_site' + '&idParent=' + idTopic,
			success: function(data)
				{
					$('#baner'+ idTopic).html(data);
				}
	});
});




//*******Создаю новую тему*******
$('.clickCreate').click(function(){
	var getId = $(this).attr('href');
	$.ajax({
			type: "GET",
			url: 'classAdmin.php',
			data: 'nameTopic=' + $('#text' + getId).val() + '&idParent=' + getId,
			success: function(data)
				{
					$('#baner').html(data);
				}
	});
});




//************Показать все данные таблицы**********
$(document).ready(function(){
$('body').on('click', '.getPages', function(){
	var getId = $(this).attr('href');
	$.ajax({
			type: "GET",
			url: 'classAdmin.php',
			data: 'nameTable=pages_site&showTable=yes' + '&idParent=' + getId,
			success: function(data)
				{
					$('#baner').html(data);
				}
			});

	});
});
</script>

<?php
//*******Выводим таблицу***********
echo '<div id="baner" class="col">';
echo '</div>';

?>

<script>
//****************форма для изменения или добавления данных******
$('body').on('click', '.elementTable, #insertPage', function(){
	var getId= $(this).attr('href');
	$.ajax({
			type: "GET",
			url: 'classAdmin.php',
			data: "&nameTable=pages_site&status=showTable&idParent=" + getId,
			success: function(data)
				{
					$('#baner').html(data);
				}
	});
});

//****************Отправляю новые изменения и получаю ответ******
var statusGet;
var id;
$('body').on('click', '#insertPage', function(){statusGet = 'insert';});
$('body').on('click', '.elementTable', function(){statusGet = 'changePage';});
$('body').on('click', '.elementTable', function(){id = $(this).attr('myattribute');});
$('body').on('click', '#clickChange', function(){
	var nameTable = 'pages_site';
	var idParent = $('#idTextForm').val();
	var nameText = $('#nameTextForm').val();
	var textContent = $('#textContentForm').val();
	$.post({
			url: 'classAdmin.php',
			data: {"nameTable": nameTable, "id": id, "idParent": idParent, "nameText": nameText, "textContent": textContent, "textTitle": nameText, "status": statusGet},
			success: function(data)
				{
					$('#baner').html(data);
				}
	});
});


</script>
</div>
</div>
</body>
</html>