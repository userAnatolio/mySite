<?php
class CreateTable extends HelpGetTable
{
	function __construct($link, $nameTable)
	{
		$this -> m_query = "CREATE TABLE `my_site`.`$nameTable` (
							`id` INT NOT NULL AUTO_INCREMENT , 
							`name_text` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL , 
							`text_content` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL , 
							`title_text` VARCHAR(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL , 
							`url_page` VARCHAR(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL , 
							 PRIMARY KEY (`id`)
							) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci";
		$this -> m_link = $link;
		$this -> sqlQuery();
		echo 'Таблица создана';
	}
}
?>