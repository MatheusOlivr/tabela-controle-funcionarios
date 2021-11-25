<?php 
	namespace App\Models;
	use App\Connection;
	class Cashier extends Connection
	{
		protected static function getShift($shift)
		{
			switch($shift)
			{
				case "morning":
					$between = [
						":VALUE1" => "06:00",
						":VALUE2" => "12:00"
					];
					return $between;
				break;
				case "evening":
					$between = [
						":VALUE1" => "13:00",
						":VALUE2" => "22:00"
					];
					return $between;
				break;
			}
		}
		public static function getTable($shift = 0)
		{
			$results = Connection::showTable("SELECT cl_horario,cl_numerocaixa,cl_nome FROM tb_cashier WHERE cl_horario BETWEEN :VALUE1 AND :VALUE2 ",Cashier::getShift($shift));
			return $results;
		}
	}
?>