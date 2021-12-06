<?php 
	namespace App\Controllers;
	use App\Models\Cashier;
	use App\Models\Packer;
	use App\Models\Cart;
	class ViewsController
	{
		public static function getView($formContent = null)
		{
			$header = "header";
			$content = "content";
			$footer = "footer";
			$dirViewsMain = "..\\App\\Views\\";
			require_once($dirViewsMain.$header.".phtml");
			require_once($dirViewsMain.$content.".phtml");
			if ($formContent !== null)
			{
				ViewsController::getViewsForm($formContent);
			}
			else
			{
				
			}
			require_once($dirViewsMain.$footer.".phtml");
		}
		public static function getViewsForm($formContent)
		{
			$formHeader = "formheader";
			$formShift = "formShift";
			$formFooter = "formfooter";
			$dirViewsForm = "..\\App\\Views\\Forms\\";
			require_once($dirViewsForm.$formHeader.".phtml");
			require_once($dirViewsForm.$formShift.".phtml");
			require_once($dirViewsForm.$formContent.".phtml");
			require_once($dirViewsForm.$formFooter.".phtml");
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