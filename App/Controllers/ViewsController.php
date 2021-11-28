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
			require_once($dirViewsTable.$tableMorningStart.".phtml");
			Cashier::showTable("06:00","12:59");
			Packer::showTable("06:00","12:59");
			Cart::showTable("06:00","12:59");
			require_once($dirViewsTable.$tableMorningEnd.".phtml");
			require_once($dirViewsTable.$tableEveningStart.".phtml");
			Cashier::showTable("13:00","15:00");
			Packer::showTable("13:00","15:00");
			Cart::showTable("13:00","15:00");
			require_once($dirViewsTable.$tableEveningEnd.".phtml");
			require_once($dirViewsTable.$tableFooter.".phtml");
		}
	}
?>