<?php 
	namespace App\Controllers;
	use App\Models\Cashier;
	use App\Models\Packer;
	use App\Models\Cart;
	class TableController
	{
		public static function cashierTables()
		{
			$packerTableMorning = Packer::getTable("06:00","12:00");
			$packerTableEvening = Packer::getTable("13:00","22:00");
			$cartTableMorning = Cart::getTable("06:00","12:00");
			$cartTableEvening = Cart::getTable("13:00","22:00");
			echo "<th colspan = '2'>EMPACOTADOR</th>";
			foreach($packerTableMorning as $key => $value)
			{
			echo "<tr>";
			echo "<td>".$value["cl_horario"]."</td>";
			echo "<td>".$value["cl_nome"]."</td>";
			echo "</tr>";
			}
			echo "<th colspan = '2'>CARRINHOS</th>";
			foreach($cartTableMorning as $key => $value)
			{
			echo "<tr>";
			echo "<td>".$value["cl_horario"]."</td>";
			echo "<td>".$value["cl_nome"]."</td>";
			echo "</tr>";
			}
			foreach($packerTableEvening as $key => $value)
			{
			echo "<tr>";
			echo "<td>".$value["cl_horario"]."</td>";
			echo "<td>".$value["cl_nome"]."</td>";
			echo "</tr>";
			}
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