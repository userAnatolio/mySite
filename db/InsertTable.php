<?php
class InsertTable extends HelpGetTable 
{
	function __construct($link, $nameTable, $nameText, $textContent, $textTitle)
	{
		if($nameText == $textTitle)
		{
		$urlPage = '?nameTable='.$nameTable.'&titlePage='.$textTitle.'&nameText='.$nameText;
		$this -> m_query = "INSERT INTO `$nameTable`(`name_text`, `text_content`, `title_text`, `url_page`) 
		VALUES ('".$nameText."', '".$textContent."', '".$textTitle."', '".$urlPage."')";
		}
		else $this -> answerForUser();
		$this -> m_link = $link;
		$this -> sqlQuery(0);
		echo 'страница добавлена';
	}
	function answerForUser()
	{
		echo 'Название страницы должно соответствовать title';
	}
}
?>