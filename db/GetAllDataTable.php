<?php
class GetAllDataTable extends HelpGetTable 
{
	function __construct($link, $nameTable, $nameText=null)
	{
		$this -> getTable($link, $nameTable, $nameText=null);
	}
	
	public function getTable($link, $nameTable, $nameText=null)
	{
		if($nameText == null)
		{
		$this -> m_query = "SELECT * FROM " . $nameTable;
		}
		else
		{ 
		$this -> m_query = "SELECT `id`, `name_text`, `text_content`, `title_text`, `url_page` FROM $nameTable HAVING `name_text`='".$nameText."'";
		}
		$this -> m_link = $link;
		$this -> sqlQuery(1);
		return $this -> m_data;
	}
}
		
	
?>