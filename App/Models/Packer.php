<?php 
	namespace App\Models;
	use App\Connection;
	class Packer extends Connection
	{
		public static function addEmployee($cl_horario,$cl_nome,$cl_id)
		{
			$data = 
			[
				":CLHORARIO" =>$cl_horario,
				":CLNOME" =>$cl_nome,
				":CLID" =>$cl_id
			];			
			if (Connection::updateInTable("UPDATE tb_packer SET cl_horario =  :CLHORARIO ,cl_nome =:CLNOME WHERE cl_id = :CLID",$data))
			{
				echo "O/A funcionario/a ".$data[":CLNOME"]." foi adicionado com sucesso na tabela";
			}
			else
			{
				echo "Ocorreu algum erro";
			}
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
		public static function showTables()
		{
			echo "<div class = 'table'>";
			Packer::showTable("06:00","12:59");
			Packer::showTable("13:00","15:00");
			echo "</div>";
		}
		public static function showTable($betweenValue1 = "06:00" ,$betweenValue2 = "22:00")
		{
			$table = Packer::getTable($betweenValue1,$betweenValue2);
			echo "<table>";
			foreach($table as $key => $value)
			{
				echo "<tr>";
				echo "<td class ='tableColumnShift'>".$value["cl_horario"]."</td>";
				echo "<td>".$value["cl_nome"]."</td>";
				echo "</tr>";
			}
			echo "</table>";
		}
	}
?>