<?php
class ShowTable
{
	private $m_arrData;
	function __construct($arrData, $idParent)
	{
		$this -> m_arrData = $arrData;
		$this -> showTable($this -> m_arrData, $idParent);
	}
	
	public function showTable($arrData, $idParent)
	{
		echo '<h3 id="nameTable">'.$_GET['nameTable'].'</h3>';
		echo '<button class="tableInsert" scope="col" id="insertPage" href="'.$idParent.'">Добавить</button>';
		echo '<table style="height:70px" class="table table-sm">';
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
			echo '<th scope="col">'.$elem.'</th>';
		}
		echo '<th scope="col">Изменить</th>';
		
		echo '</tr>';
		
		foreach($arrData as $key=>$elem1) 
		{
			echo '<tr>';
		foreach($elem1 as $key1 => $val1) 
		{
			echo '<td>';
			echo $val1;
			echo '</td>'; 
			
		}
		echo '<td width=100px> <button class="elementTable" myattribute="'.$elem1['id'].'" href="'.$idParent.'">Изменить</button></td>';
		
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