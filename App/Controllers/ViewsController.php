<?php 
	namespace App\Controllers;
	class ViewsController
	{
		public function __construct($view)
		{
			require_once("..\\App\\Views\\Forms\\".$view.".phtml");
		}
	}
?>