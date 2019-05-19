<?php
class OnDb
{
	private $m_host;
	private $m_user;
	private $m_password;
	private $m_dbName;
	private $m_link;
	
	public function __construct($dbName)
	{
		$this -> m_host = 'localhost';
		$this -> m_user = 'root';
		$this -> m_password = '';
		$this -> m_dbName = $dbName;
		$this -> m_link = mysqli_connect($this -> m_host, $this -> m_user, $this -> m_password, $this -> m_dbName);
		mysqli_query($this -> m_link, "SET NAMES UTF8");
	}
	public function getLink()
	{
		return $this -> m_link;
	}
}
