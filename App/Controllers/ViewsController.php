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
			$dirViewsForm = "..\\App\\Views\\Forms\\";
			$dirViewsTable = "..\\App\\Views\\Table\\";
			require_once($dirViewsForm.$formHeader.".phtml");
			require_once($dirViewsTable."tableHeader.phtml");
			Cashier::showTable();
			Packer::showTable();
			Cart::showTable();
			require_once($dirViewsTable."tableFooter.phtml");
		}
	}
?>