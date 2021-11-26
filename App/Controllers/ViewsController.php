<?php 
	namespace App\Controllers;
	class ViewsController
	{
		public static function getView($viewForm)
		{
			$header = "header";
			$content = "content";
			$footer = "footer";
			$formShift = "Forms\\formShift";
			$viewForm = "Forms\\".$viewForm;
			$dir = "..\\App\\Views\\";
			require_once($dir.$header.".phtml");
			require_once($dir.$content.".phtml");
			require_once($dir.$formShift.".phtml");
			require_once($dir.$viewForm.".phtml");
			require_once($dir.$footer.".phtml");
		}
	}
?>