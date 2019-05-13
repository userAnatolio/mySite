<?php
class GetFormChangeTable extends GetAllDataTable
{
	
	function __construct($link)
	{
		$this -> getForm($link);
	}
	public function getForm($link)
	{
		$data = $this -> getTable($link, $_GET['nameTable'], $_GET['nameText']);
		echo '<h2 id="nameTableForm">'.$_GET['nameTable'].'</h2>';
		echo '<h3>'.$data[0]['name_text'].'</h3>';
		
		echo   '<form action="" method="GET">
				<input type="hidden" id="idTextForm" value="'. $data[0]['id'].'">
				<input type="text" id="nameTextForm" value="'. $data[0]['name_text'].'"><br><br>
				<input type="text" id="titleTextForm" value="'.$data[0]['title_text'].'"><br><br>
				<textarea id="textContentForm">'.$data[0]['text_content'].'</textarea><br><br>
				<p id="clickChange">Сохранить</p>
				</form>';
	}
}

?>