<?php
class HelpGetTable
{
	protected $m_data;
	protected $m_link;
	protected $m_query;
	
	public function getData()
	{
		return $this -> m_data;
	}
	
	public function sqlQuery($status=0)
	{
	$getSql = mysqli_query($this -> m_link, $this -> m_query) or die(mysqli_error($this -> m_link));
	if($status != 0)
	{
	for($data=[]; $result = mysqli_fetch_assoc($getSql); $data[]=$result);
	$this -> m_data = $data;
	}
	}
}
?>
