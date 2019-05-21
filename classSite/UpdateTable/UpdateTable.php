<?php
class UpdateTable extends HelpGetTable 
{
	function __construct($link, $id, $idParent, $nameTable, $nameText, $textContent, $textTitle)
	{
		$this -> m_query = "SELECT * FROM `topics_site` WHERE id=" . $idParent;
		$this -> m_link = $link;
		$this -> sqlQuery(1);
		$urlPage = $this -> m_data[0]['url_page'];
		$urlPage = '?nameTable='.$nameTable.'&titlePage='.$textTitle.'&nameText='.$nameText;
		$this -> m_query = "UPDATE $nameTable SET 
							`id_parent`='".$idParent."',
							`name_text`='".$nameText."',
							`text_content`='". $textContent ."',
							`title_text`='".$textTitle."',
							`url_page`='".$urlPage."' 
							WHERE `id`='".$id."' AND id_parent='".$idParent."'";
							
							echo 'Данные успешно сохранены';
							
		$this -> m_link = $link;
		$this -> sqlQuery(0);
	}
	function answerForUser()
	{
		echo 'Название страницы должно соответствовать title';
	}
}
?>