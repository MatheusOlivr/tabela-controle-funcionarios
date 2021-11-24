<?php
	namespace App; 
	Class Connection
	{
		protected $host;
		protected $user;
		protected $password;
		public static function getDb()
		{
			$host = "mysql:host=localhost;dbname=db_employee";
			$user = "root";
			$password = "";
			$conn = new \PDO($host,$user,$password);
			return $conn;
		}
		public function insertInTable($query,$bindParam = null)
		{
			$stmt = Connection::getDb()->prepare($query);
			$this->bindParams($stmt,$bindParam);	
			$stmt->execute();
		}
		public static function showTable($query)
		{
			$stmt = Connection::getDb()->prepare($query);
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