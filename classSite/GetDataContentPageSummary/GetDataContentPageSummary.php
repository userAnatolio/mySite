<?php
class GetDataContentPageSummary extends HelpGetTable 
{
	function __construct($link)
	{
		$nameTable = $_GET['nameTable'];
		$nameText = $_GET['nameText'];
		$this -> m_query = "SELECT `id`, `name_text`, `text_content`, `title_text`, `url_page` FROM $nameTable HAVING `name_text`='".$nameText."'";
		$this -> m_link = $link;
		$this -> sqlQuery();
	}
}
		
	
?>