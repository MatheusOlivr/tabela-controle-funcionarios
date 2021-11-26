<?php 
	namespace App\Controllers;
	use App\Models\Cashier;
	use App\Models\Packer;
	use App\Models\Cart;
	use App\Controllers\TableController;
	class IndexController
	{
		public static function getMethodAddEmployeeByModel($data)
		{
			if (isset($data["putInTableButton"]))
			{
				$getPath = IndexController::getUrl();
				$cl_nome = $data["cl_nomeInput"];
				$cl_horario = $data["cl_horarioInput"];
				switch($getPath)
				{
					case "/operador":
						$cl_numerocaixa = $data["cl_numerocaixaInput"];
						Cashier::addEmployee($cl_horario,$cl_numerocaixa,$cl_nome);
					break;
					case "/empacotador":
						Packer::addEmployee($cl_horario,$cl_nome);
					break;
					case "/carrinho":
						Cart::addEmployee($cl_horario,$cl_nome);
					break;
					default:
					break;
				}
			}
		}
		public static function getTable($data)
		{
			if(isset($data["showTableButton"]))
			{
				TableController::cashierTables();
			}
		}
		protected static function getUrl()
		{
			$getUrl = $_SERVER["REQUEST_URI"];
			$getUrl = parse_url($getUrl,PHP_URL_PATH);
			return $getUrl;
		}
	}
?>