<?php
	namespace App; 
	Class Connection
	{
		protected $conn;
		public function __construct()
		{
			define("HOST","mysql:host=localhost;dbname=db_employee");
			define("USER","root");
			define("PASSWORD","");
			$conn = new \PDO(HOST,USER,PASSWORD);
			$this->conn = $conn;
		}
		public function getDb()
		{
			return $this->conn;
		}
		public function insertInTable($query,$bindParam = null)
		{
			$stmt = $this->conn->prepare($query);
			$this->bindParams($stmt,$bindParam);	
			$stmt->execute();
		}
		public function showTable($query)
		{
			$stmt = $this->conn->prepare($query);
			$stmt->execute();
			$results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
			return $results;
		}
		public function bindParam($stmt,$name,$value)
		{
			return $stmt->bindParam($name,$value);
		}
		public function bindParams($stmt,$bindParam = array())
		{
			foreach ($bindParam as $name => $value)
			{
				$this->bindParam($stmt,$name,$value);
			}
		}
	}
?>