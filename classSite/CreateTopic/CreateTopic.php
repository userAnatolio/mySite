<?php
class CreateTopic extends HelpGetTable 
{
	function __construct($link, $nameTopic, $idParent)
	{
		$urlPage = '?&nameTopic='.$nameTopic.'&titlePage='.$nameTopic;
		$this -> m_query = "INSERT INTO `topics_site`(`id_parent`, `name`, `url_page`) 
		VALUES ('".$idParent."', '".$nameTopic."', '".$urlPage."')";
		
		$this -> m_link = $link;
		$this -> sqlQuery(0);
		echo 'Тема добавлена';
	}
	
}
?>