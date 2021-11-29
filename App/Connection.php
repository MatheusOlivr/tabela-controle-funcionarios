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
		public static function updateInTable($query,$bindParam = null)
		{
			$stmt = Connection::getDb()->prepare($query);
			Connection::bindParams($stmt,$bindParam);	
			return $stmt->execute();
		}
		public static function showTable($query,$params)
		{
			$stmt = Connection::getDb()->prepare($query);
			Connection::bindParams($stmt,$params);
			$stmt->execute();
			$results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
			return $results;
		}
		public static function bindParam($stmt,$name,$value)
		{
			return $stmt->bindParam($name,$value);
		}
		public static function bindParams($stmt,$params = array())
		{
			foreach ($params as $name => $value)
			{
				Connection::bindParam($stmt,$name,$value);
			}
		}
	}
?>