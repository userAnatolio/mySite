<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
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
	background: black;
	text-align: center;
	height: 50px;
}

a {color: while; text-decoration: none; font-size: 20px;}
.testDiv {background: black; padding: 5px; margin: 20px 0
</style>
</head>
<body>
<?php
//**************Автозагрузка классов*******************
spl_autoload_register(function ($class_name) {
include $class_name . '.php';
});

$onDb = new OnDb('my_site'); // Указываем имя бызы данных, подключаем..
$link = $onDb -> getLink();


//**************создаем новую таблицу*********
echo '<div id="newTable">
<b>Создать новый элемент </b><input type="text" placeholder="имя таблицы" id="createTable">
<button id="clickCreate">Создать</button><button id="clickBack">Отмена</button>
</div>';



//*******получить список названий таблиц**********************
echo '<div class="row">
<h3>Элементы сайта</h3>';
$allNamesTableDB = new AllNamesTableDB($link);
$arrData = $allNamesTableDB -> getData();
foreach($arrData as $elem)
{
	echo '<li class="col-md-1 elementMenu" href="'.$elem['Tables_in_my_site'].'">' . $elem['Tables_in_my_site'] .'</li><br>';
}
echo '</div>';
?>

<script src="/jQuery/jQuery.js"></script>

<script>

//*******Создаю новый элемент сайта*******
$('#clickCreate').click(function(){
	$.ajax({
			type: "GET",
			url: 'classAdmin.php',
			data: 'nameNewCreateTable=' + $('#createTable').val(),
			success: function(data)
				{
					$('#baner').html(data);
				}
	});

});



//************Показать все данные таблицы**********
$(document).ready(function(){
$('.elementMenu').click(function(){
	var get= $(this).attr('href');
	$.ajax({
			type: "GET",
			url: 'classAdmin.php?' + get,
			data: 'nameTable=' + get+'&showTable=yes',
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
echo '<div id="baner" class="testDiv">';
echo '</div>';


?>

<script>
//****************форма для изменения или добавления данных******
$('body').on('click', '.elementTable, #insertPage', function(){
	var get= $(this).attr('href');
	$.ajax({
			type: "GET",
			url: 'classAdmin.php',
			data: "nameText=" + get + "&nameTable=" + $('#nameTable').html() + "&status=showTable",
			success: function(data)
				{
					$('#baner').html(data);
				}
	});
});

//****************Отправляю новые изменения и получаю ответ******
var statusGet;
$('body').on('click', '#insertPage', function(){statusGet = 'insert';});

$('body').on('click', '#clickChange', function(){
	var nameTable = $('#nameTableForm').html();
	var id = $('#idTextForm').val();
	var nameText = $('#nameTextForm').val();
	var textContent = $('#textContentForm').val();
	var textTitle = $('#titleTextForm').val();
	alert(statusGet);
	$.ajax({
			type: "GET",
			url: 'classAdmin.php',
			data: "nameTable=" + nameTable + "&id=" +id+ "&nameText=" + nameText + "&textContent=" + textContent + "&textTitle=" + textTitle + "&status=" + statusGet,
			success: function(data)
				{
					$('#baner').html(data);
				}
	});
});


</script>


</body>
</html>