<?php
class ShowTable
{
	private $m_arrData;
	function __construct($arrData)
	{
		$this -> m_arrData = $arrData;
		$this -> showTable($this -> m_arrData);
	}
	
	public function showTable($arrData)
	{
		echo '<h3 id="nameTable">'.$_GET['nameTable'].'</h3>';
		echo '<table id="sqlTable">';
		$arr = [];
		foreach($arrData as $elem) 
		{
			foreach($elem as $key=>$val)
			{
				array_push($arr, $key);
			}
		}
		
		$arr = array_unique($arr);
		echo '<tr>';
		
		foreach($arr as $elem) 
		{
			echo '<td class="red" height="50">'.$elem.'</td>';
		}
		echo '<td class="red" height="50">Изменить</td>';
		echo '<td class="red" height="50" id="insertPage" href="insert">Добавить страницу</td>';
		echo '</tr>';
		
		foreach($arrData as $key=>$elem1) 
		{
			echo '<tr>';
		foreach($elem1 as $key1 => $val1) 
		{
			echo '<td height="50">';
			echo $val1;
			echo '</td>'; 
			
		}
		echo '<td class="red"><li class="elementTable" href="'.$elem1['name_text'].'">Изменить страницу</li></td>';
		
		echo '</tr>';
		}
		echo '</table>';
	}
	
	public function getVarDump()
	{
			var_dump($this -> m_arrData);
	}
	
}
?>