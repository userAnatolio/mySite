<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta charset="utf-8">	
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Админ</title>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link href="/style/style.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Audiowide&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Exo+2&display=swap&subset=cyrillic" rel="stylesheet">
		 <link href="https://fonts.googleapis.com/css?family=Russo+One&display=swap&subset=cyrillic" rel="stylesheet">
		<script src="/jQuery/jQuery.js"></script>
		<style>



td, th {
    border: 1px solid black;
	text-align: center;
}


th
{
	background: #D0D0D0;
	color: black;
	margin: 1px;
}

.clickCreate, .backCreate, .tableInsert, .elementTable
{
	background: #474749;
	text-align: center;
	color: white;
}

.clickCreate:hover, .tableInsert:hover, .elementTable:hover, .clickChange:hover
{
	background: #A52A2A;
}


textarea
{
	min-width: 300px;
	min-height: 200px;
}

button, input
{
	width: 170px;
	padding: 5px;
	margin: 5px;
	text-align: center;
}

menuPage
{
	text-align: center;
}


.getTopic, li {cursor: pointer; color:#A52A2A; }
.getTopic:hover, li:hover {cursor: pointer; color: #0078D7; }

.backCreate, .textInput, .menuPage
{
	display: none;
}


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
echo '<div class="menuPage row" id="menu'.$elem['id'].'">
<button class="clickCreate" href="'.$elem['id'].'"  id="createTopic'.$elem['id'].'">Создать</button>
<input class="textInput" type="text" placeholder="имя темы" id="text'.$elem['id'].'">
<button class="backCreate" id="backTopic'.$elem['id'].'">Отмена</button>
<div id="answer'.$elem['id'].'"></div>
<ul id="baner'.$elem['id'].'"></ul>
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
	var subId = $(this).attr('id').substr(-1);
	$.ajax({
			type: "GET",
			url: 'classAdmin.php',
			data: 'nameTopic=' + $('#text' + getId).val() + '&idParent=' + getId,
			success: function(data)
				{
					$('#answer'+subId).html(data);
				}
	}); 
		$('#text'+subId).val('');


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

<div id="formChange"></div>

<?php
//*******Выводим таблицу***********
echo '<div id="baner" class="col">';
echo '</div>';

?>



<script>


var statusGet; //Новая страница или старая..
$('body').on('click', '#insertPage', function(){statusGet = 'insert';});
$('body').on('click', '.elementTable', function(){statusGet = 'changePage';});
var idPage; //id страницы для кнопки изменить..
$('body').on('click', '.elementTable', function(){idPage = $(this).attr('myattribute');});

//****************форма для изменения или добавления данных******
$('body').on('click', '.elementTable, #insertPage', function(){
	var getId= $(this).attr('href');
	$.ajax({
			type: "GET",
			url: 'classAdmin.php',
			data: "&nameTable=pages_site&status=showTable&idParent=" + getId + "&id=" + idPage,
			success: function(data)
				{
					if(statusGet == 'insert')
					{
						$('#formChange').html(data);
						$('#nameTextForm').val('');
						$('#textContentForm').html('');
					}
					
					if(statusGet == 'changePage')
					{
					
						$('#formChange').html(data);
					}
					
				}
	});
});





//****************Отправляю новые изменения и получаю ответ******
$('body').on('click', '#clickChange', function(){
	var nameTable = 'pages_site';
	var idParent = $('#idTextForm').val();
	var nameText = $('#nameTextForm').val();
	var textContent = $('#textContentForm').val();
	$.post({
			url: 'classAdmin.php',
			data: {"nameTable": nameTable, "id": idPage, "idParent": idParent, "nameText": nameText, "textContent": textContent, "textTitle": nameText, "status": statusGet},
			success: function(data)
				{
					if(statusGet == 'insert')
					{
					$('#formChange').html(data);
					}
					
					if(statusGet == 'changePage')
					{
					$('#formChange').html(data);
					}
				}
	});
});






$(document).on('click', '#cancelChange', function()
{
	$('#formChange').hide();
}
);

$(document).on('click', '.elementTable, #insertPage', function()
{
	$('#formChange').show();
}
);

$('.clickCreate').on('click', function()
{
	var subId = $(this).attr('id').substr(-1);
	$('#text'+subId).show();
	$('#backTopic'+subId).show();
	$('#backTopic'+subId).addClass('hideElem');
	$('#text'+subId).addClass('hideElem');
	$(this).addClass('timeClass');
	$(this).removeClass('.clickCreate');
}
);

$('.timeClass, .backCreate').on('click', function()
{
	var subId = $(this).attr('id').substr(-1);
	$('#text'+subId).hide();
	$('#backTopic'+subId).hide();
	$('.hideElem').hide();
	$('.hideElem').removeClass('.hideElem');
}
);

$(document).on('click', '.getTopic', function()
{
	var subId = $(this).attr('href').substr(-1);
	$('#menu'+subId).css("display", "inline");
	$(this).addClass('hideTopic');
}
);

$(document).on('click', '.hideTopic', function()
{
	var subId = $(this).attr('href').substr(-1);
	$('#menu'+subId).css("display", "none");
	$(this).removeClass('hideTopic');
}
);






</script>
</div>
</div>

</body>
</html>