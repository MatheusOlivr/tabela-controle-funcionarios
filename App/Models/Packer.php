<?php 
	namespace App\Models;
	use App\Connection;
	class Packer extends Connection
	{
		public static function addEmployee($cl_horario,$cl_nome,$cl_id)
		{
			Connection::insertInTable("UPDATE tb_packer SET cl_horario =  :CLHORARIO ,cl_nome =:CLNOME WHERE cl_id = :CLID",
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
			$results = Connection::showTable("SELECT cl_horario,cl_nome FROM tb_packer WHERE cl_horario BETWEEN :VALUE1 AND :VALUE2 ",$shift);
			return $results;
		}
		public static function showTableMorning()
		{
			$packerTableMorning = Packer::getTable("13:00","22:00");
			echo "<table>";
			foreach($packerTableMorning as $key => $value)
			{
				echo "<tr>";
				echo "<td>".$value["cl_horario"]."</td>";
				echo "<td>".$value["cl_nome"]."</td>";
				echo "</tr>";
			}
			echo "</table>";
		}
		public  static function showTableEvening()
		{
			$packerTableEvening = Packer::getTable("06:00","12:00");
			echo "<table>";
			foreach($packerTableEvening as $key => $value)
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