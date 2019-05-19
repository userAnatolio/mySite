<?php
class GetFormChangeTable extends GetAllDataTable
{
	
	function __construct($link)
	{
		$this -> getForm($link);
	}
	public function getForm($link)
	{
		$data = $this -> getPages($link, $_GET['idParent']);
		echo '<h2 id="nameTableForm">'.$_GET['nameTable'].'</h2>';
		echo '<h3>'.$data[0]['name_text'].'</h3>';
		echo   '<form action="" method="GET">
				<input type="hidden" id="idTextForm" value="'. $_GET['idParent'].'">
				<input type="text" id="nameTextForm" value="'. $data[0]['name_text'].'"><br><br>
				<textarea id="textContentForm">'.$data[0]['text_content'].'</textarea><br><br>
				<p id="clickChange">Сохранить</p>
				</form>';
	}
}

?>