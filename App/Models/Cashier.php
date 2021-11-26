<?php 
	namespace App\Models;
	use App\Connection;
	class Cashier extends Connection
	{
		public static function addEmployee($cl_horario,$cl_numerocaixa,$cl_nome)
		{
			Connection::insertInTable("UPDATE tb_cashier SET cl_horario = :CLHORARIO, cl_numerocaixa = :CLNUMEROCAIXA,cl_nome = :CLNOME WHERE cl_id = :CLNUMEROCAIXA",
				array
				(
					":CLHORARIO" =>$cl_horario,
					":CLNUMEROCAIXA" => $cl_numerocaixa,
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