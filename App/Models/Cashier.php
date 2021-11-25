<?php 
	namespace App\Models;
	use App\Connection;
	class Cashier extends Connection
	{
		public static function addEmployee($cl_horario,$cl_nome)
		{
			Connection::insertInTable("INSERT INTO tb_cashier (cl_horario,cl_nome) VALUES(:CLHORARIO,:CLNOME)",
				array
				(
					":CLHORARIO" =>$cl_horario,
					":CLNOME" =>$cl_nome
				));
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
	}
?>