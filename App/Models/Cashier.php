<?php 
	namespace App\Models;
	use App\Connection;
	class Cashier extends Connection
	{
		public static function addEmployee($cl_horario,$cl_numerocaixa,$cl_nome)
		{
			$data = 
			[
				":CLHORARIO" =>$cl_horario,
				":CLNUMEROCAIXA" => $cl_numerocaixa,
				":CLNOME" =>$cl_nome
			];			
			if (Connection::updateInTable("UPDATE tb_cashier SET cl_horario = :CLHORARIO, cl_numerocaixa = :CLNUMEROCAIXA,cl_nome = :CLNOME WHERE cl_id = :CLNUMEROCAIXA",$data))
			{	
				echo "O/A funcionario/a ".$data[":CLNOME"]." foi adicionado com sucesso no caixa: ".$data[":CLNUMEROCAIXA"];
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
			$results = Connection::showTable("SELECT cl_horario,cl_numerocaixa,cl_nome FROM tb_cashier WHERE cl_horario BETWEEN :VALUE1 AND :VALUE2 ",$shift);
			return $results;
		}
		public static function showTables()
		{
			echo "<div class = 'table'>";
			Cashier::showTable("06:00","12:59");
			Cashier::showTable("13:00","15:00");
			echo "</div>";
		}
		public static function showTable($betweenValue1 = "06:00" ,$betweenValue2 = "22:00")
		{

			$table = Cashier::getTable($betweenValue1,$betweenValue2);
			echo "<table>";
			foreach($table as $key => $value)
			{
				echo "<tr>";
				echo "<td class ='tableColumnShift'>".$value["cl_horario"]."</td>";
				echo "<td> Caixa - ".$value["cl_numerocaixa"]." - ".$value["cl_nome"]."</td>";
				echo "</tr>";
			}
			echo "</table>";
		}
	}
?>