<?php
class GetAllDataTable extends HelpGetTable 
{	
	function __construct ($link=null, $nameTable=null)
	{
		if($link != null and $nameTable != null)
		{
		$this -> m_query = "SELECT * FROM " . $nameTable;
		$this -> m_link = $link;
		$this -> sqlQuery(1);
		return $this -> m_data;
		}
	}
	
	public function getPages($link, $idParent)
	{
		$this -> m_query = "SELECT `id`, `id_parent`, `name_text`, `text_content`, `url_page` FROM `pages_site` WHERE `id_parent`='".$idParent."'"; //???????????
		$this -> m_link = $link;
		$this -> sqlQuery(1);
		return $this -> getData();
	}
	
	public function getTopic($link, $idParent)
	{
		$this -> m_query = "SELECT * FROM `topics_site` WHERE `id_parent`='".$idParent."'";
		$this -> m_link = $link;
		$this -> sqlQuery(1);
		return $this -> m_data;
		
	}
}
		
	
?>