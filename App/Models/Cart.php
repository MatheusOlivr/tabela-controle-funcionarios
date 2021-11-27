<?php 
	namespace App\Models;
	use App\Connection;
	class Cart extends Connection
	{
		public static function addEmployee($cl_horario,$cl_nome,$cl_id)
		{
			Connection::insertInTable("UPDATE tb_cart SET cl_horario =  :CLHORARIO ,cl_nome =:CLNOME WHERE cl_id = :CL_ID",
				array
				(
					":CLHORARIO" =>$cl_horario,
					":CLID" => $cl_id,
					":CLNOME" =>$cl_nome
				));
		}
		public static function getTable($value1,$value2)
		{
			$shift = array(
				":VALUE1" =>$value1,
				":VALUE2" =>$value2
			);
			$results = Connection::showTable("SELECT cl_horario,cl_nome FROM tb_cart WHERE cl_horario BETWEEN :VALUE1 AND :VALUE2 ",$shift);
			return $results;
		}
		public static function showTableMorning($betweenValue1 = "06:00" ,$betweenValue2 = "12:59")
		{
			$cartTableMorning = Cart::getTable($betweenValue1,$betweenValue2);
			echo "<table>";
			foreach($cartTableMorning as $key => $value)
			{
				echo "<tr>";
				echo "<td>".$value["cl_horario"]."</td>";
				echo "<td>".$value["cl_nome"]."</td>";
				echo "</tr>";
			}
			echo "</table>";
		}
		public  static function showTableEvening($betweenValue1 = "13:00" ,$betweenValue2 = "22:00")
		{
			$cartTableEvening = Cart::getTable($betweenValue1,$betweenValue2);
			echo "<table>";
			foreach($cartTableEvening as $key => $value)
			{
				echo "<tr>";
				echo "<td>".$value["cl_horario"]."</td>";
				echo "<td>".$value["cl_nome"]."</td>";
				echo "</tr>";
			}
			echo "</table>";
		}
	}
?>