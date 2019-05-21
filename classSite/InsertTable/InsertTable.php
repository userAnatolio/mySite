<?php
class InsertTable extends HelpGetTable 
{
	function __construct($link, $nameTable, $nameText, $textContent, $textTitle, $idParent)
	{
		$this -> m_query = "SELECT * FROM `topics_site` WHERE id=" . $idParent;
		$this -> m_link = $link;
		$this -> sqlQuery(1);
		$urlPage = $this -> m_data[0]['url_page'];
		if(!empty($textContent) and !empty($nameText))
		{
		$this -> m_query = "INSERT INTO `$nameTable`(`id_parent`, `name_text`, `text_content`, `title_text`, `url_page`) 
		VALUES ('".$idParent."', '".$nameText."', '".$textContent."', '".$textTitle."', '".$urlPage."')";
		$this -> m_link = $link;
		$this -> sqlQuery(0);
		echo 'страница добавлена';
		}
		else echo 'Были заполнены не все поля, попробуйте еще раз';
	}

}
?>