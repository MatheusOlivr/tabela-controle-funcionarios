<?php 
	namespace App\Controllers;
	use App\Models\Cashier;
	use App\Models\Packer;
	use App\Models\Cart;
	use App\Models\Index;
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
						$cl_id = $data["cl_idInput"];
						Packer::addEmployee($cl_horario,$cl_nome,$cl_id);
					break;
					case "/carrinho":
						$cl_id = $data["cl_idInput"];
						Cart::addEmployee($cl_horario,$cl_nome,$cl_id);
					break;
					default:
					break;
				}
			}
		}
		public static function getTableByModel($data)
		{
			if (isset($data["showTableButton"]))
			{
				$getPath = IndexController::getUrl();
				switch($getPath)
				{
					case "/operador":
						Cashier::showTables();
					break;
					case "/empacotador":
						Packer::showTables();
					break;
					case "/carrinho":
						Cart::showTables();
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
		public static function trucanteTables($post)
		{
			if (isset($post["truncateTableButton"]))
			{
				Index::truncateTable();
			}
			else
			{
				echo "Não foi";
			}
		}
	}
?>