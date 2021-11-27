<?php 
	namespace App\Controllers;
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
		public static function getTable()
		{
			$formHeader = "formheader";
			$dirViewsForm = "..\\App\\Views\\Forms\\";
			require_once($dirViewsForm.$formHeader.".phtml");
			$dirViewsTable = "..\\App\\Views\\Table\\";
			require_once($dirViewsTable."tableHeader.phtml");
			require_once($dirViewsTable."tableFooter.phtml");
		}
	}
?>