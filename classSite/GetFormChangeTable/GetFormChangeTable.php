<?php
class GetFormChangeTable extends GetAllDataTable
{
	
	function __construct($link)
	{
		$this -> getForm($link);
	}
	public function getForm($link)
	{
		$data = $this -> getDataForm($link, $_GET['idParent'], $_GET['id']);
		echo '<h2 id="nameTableForm">'.$_GET['nameTable'].'</h2>';
		echo '<h3>'.$data[0]['name_text'].'</h3>';
		echo   '<form action="" method="GET">
				<input type="hidden" id="idTextForm" value="'. $_GET['idParent'].'">
				<input type="text" id="nameTextForm" placeholder="Название страницы" value="'. $data[0]['name_text'].'"><br><br>
				<textarea id="textContentForm" placeholder="Введите текст">'.$data[0]['text_content'].'</textarea><br><br>
				</form>
				<button id="clickChange">Сохранить</button>
				<button id="cancelChange">Отменить</button>';
	}
}

?>