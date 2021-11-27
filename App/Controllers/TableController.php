<?php 
	namespace App\Controllers;
	use App\Models\Cashier;
	use App\Models\Packer;
	use App\Models\Cart;
	class TableController
	{
		public static function showJoinTables()
		{
			Cashier::showTableMorning();
		    echo "<hr>";
		    Cashier::showTableEvening();
		    echo "<hr>";
		    Cart::showTableMorning();
		    echo "<hr>";
		    Cart::showTableEvening();
		    echo "<hr>";
		    Packer::showTableMorning();
		    echo "<hr>";
		    Packer::showTableEvening();

		}
	}
?>