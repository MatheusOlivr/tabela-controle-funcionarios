<?php 
	namespace App\Controllers;
	use App\Models\Cashier;
	class TableController
	{
		public static function cashierTables()
		{
			$cashierTableMorning = Cashier::getTable("06:00","12:00");
			$cashierTableEvening = Cashier::getTable("13:00","22:00");
			echo "<table>";
			echo "<tr ><th colspan = '2'>MANHÂ:</th></tr>";
			foreach($cashierTableMorning as $key => $value)
			{
			echo "<tr>";
			echo "<td>".$value["cl_horario"]."</td>";
			echo "<td> Caixa - ".$value["cl_numerocaixa"]." - ".$value["cl_nome"]."</td>";
			echo "</tr>";
			}
			echo "</table>";
			echo "<table>";
			echo "<tr ><th colspan = '2'>TARDE:</th></tr>";
			foreach($cashierTableEvening as $key => $value)
			{
			echo "<tr>";
			echo "<td>".$value["cl_horario"]."</td>";
			echo "<td> Caixa - ".$value["cl_numerocaixa"]." - ".$value["cl_nome"]."</td>";
			echo "</tr>";
			}
			echo "</table>";
		}
	}
?>