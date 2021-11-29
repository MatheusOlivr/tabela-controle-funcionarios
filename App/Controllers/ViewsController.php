<?php 
	namespace App\Controllers;
	use App\Models\Cashier;
	use App\Models\Packer;
	use App\Models\Cart;
	class ViewsController
	{
		public static function getView($view)
		{
			$header = "header";
			$content = "content";
			$formHeader = "formheader";
			$formShift = "formShift";
			$view = $view;
			$formFooter = "formfooter";
			$footer = "footer";
			$dirViewsMain = "..\\App\\Views\\";
			$dirViewsForm = "..\\App\\Views\\Forms\\";
			require_once($dirViewsMain.$header.".phtml");
			require_once($dirViewsMain.$content.".phtml");
			require_once($dirViewsForm.$formHeader.".phtml");
			require_once($dirViewsForm.$formShift.".phtml");
			require_once($dirViewsForm.$view.".phtml");
			require_once($dirViewsForm.$formFooter.".phtml");
			require_once($dirViewsMain.$footer.".phtml");
		}
		public static function showAllTablesTogether()
		{
			$formHeader = "formheader";
			$tableHeader = "tableHeader";
			$tableMorningStart = "tableMorningStart";
			$tableMorningEnd = "tableMorningEnd";
			$tableEveningStart = "tableEveningStart";
			$tableEveningEnd = "tableEveningEnd";
			$tableFooter = "tableFooter";
			$dirViewsForm = "..\\App\\Views\\Forms\\";
			$dirViewsTable = "..\\App\\Views\\Table\\";
			require_once($dirViewsForm.$formHeader.".phtml");
			require_once($dirViewsTable.$tableHeader.".phtml");
			echo "<h1>OPERADORES</h1>";
			Cashier::showTables();
			echo "<h1>EMPACOTADORES</h1>";
			Packer::showTables();
			echo "<h1>CARRINHOS</h1>";
			Cart::showTables();

			require_once($dirViewsTable.$tableFooter.".phtml");
		}
	}
?>