<?php
class UpdateTable extends HelpGetTable 
{
	function __construct($link, $id, $nameTable, $nameText, $textContent, $textTitle)
	{
		if($nameText == $textTitle and $id > 0 and is_numeric($id))
		{
		$urlPage = '?nameTable='.$nameTable.'&titlePage='.$textTitle.'&nameText='.$nameText;
		$this -> m_query = "UPDATE $nameTable SET 
							`name_text`='".$nameText."',
							`text_content`='".$textContent."',
							`title_text`='".$textTitle."',
							`url_page`='".$urlPage."' 
							WHERE `name_text`='".$nameText."' AND id='".$id."'";
							
							echo 'Данные успешно сохранены';
		}
		else $this -> answerForUser();
		$this -> m_link = $link;
		$this -> sqlQuery(0);
	}
	function answerForUser()
	{
		echo 'Название страницы должно соответствовать title';
	}
}
?>