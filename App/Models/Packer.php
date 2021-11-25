<?php 
	namespace App\Models;
	use App\Connection;
	class Operador extends Connection
	{
		public static function getTable()
		{
			$results = Connection::showTable("SELECT cl_horario,cl_numerocaixa,cl_nome FROM tb_cashier WHERE cl_horario BETWEEN '06:00' AND '12:00' ");
			return $results;
		}
	}
?>