<?php
class AllNamesTableDB extends HelpGetTable
{
	function __construct($link)
	{
	$this -> m_query = "SHOW TABLES";
	$this -> m_link = $link;
	$this -> sqlQuery(1);
	}
}
