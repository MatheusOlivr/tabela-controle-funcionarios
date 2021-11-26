<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ControleOperadoresCaixas</title>
	<style>
		#joinTables
		{
			width: 50vw;
			border: 1px solid black;
			text-align: center;
			border-collapse: collapse;
			border: solid 1px black;
		}
		table
		{
			width: 25vw;
			float: left;
		}
		#morningTable
		{

		}
		#eveningTable
		{
		}
		td,th
		{
			
		}
		#clean
		{
			clear: both;
		}
	</style>
</head>
<body>
			<?php
			session_start();
				if(isset ($_SESSION["employeePosition"]) || isset($_POST["employeePositionButton"]))
				{
					if (isset ($_SESSION["employeePosition"]))
					{
						$employeePosition = $_SESSION["employeePosition"];
					}
					else
					{
						$employeePosition = $_POST["employeePositionButton"];
						$_SESSION["employeePosition"] = $_POST["employeePositionButton"];
					}
					function getView($view)
					{
						require_once("App/Views/Forms/formShift".".phtml");
						require_once("App/Views/Forms/".$view.".phtml");
					}
					switch($employeePosition)
					{
						case "operador":
								getView("formCashier");
						break;
						case "empacotador":
								getView("formCashier");
						break;
						case "carrinho":
								getView("formCashier");
						break;
					}	
				}
			 ?>
		<br>
		<button name = "putInTableButton"value = "1">CADASTRAR</button>
		</br>
		<button name = "showTableButton">GERAR TABELA</button>
	</form>
</body>
</html>
<?php
	use App\Connection;
	use App\Controllers\TableController;
	use App\Models\Cashier;
	require "vendor/autoload.php";
	$conn = new Connection;
	$cont = 0;
	if(isset($_POST["showTableButton"]))
		{
			$new = new TableController();
			$new->joinTables();
		}	
	if ($_SERVER["REQUEST_METHOD"] === "POST")
		{
		if (isset($_POST["putInTableButton"]))
			{
			$idEmployee = $_POST["idEmployeeInput"];
			$nameEmployee = $_POST['nameEmployeeInput'];
			$employeePosition	= $_SESSION["employeePosition"];
			$turno = $_POST["shiftSelect"];
			Cashier::addEmployee($turno,$idEmployee,$nameEmployee);
			echo "deu certo";
			/*/if (
			{
				echo "O ".$employeePosition.": ".$nameEmployee."<br>";
				echo "Foi colocado no caixa ".$idEmployee."<br>";
			}*/
		}
	}
?>
<div id = "joinTables">
	<h3>PLANILHA DO DIA</h3>
	<?php TableController::cashierTables()?>
	<div id = clean></div>
	<h4>OPERADORES</h4>	
	<div id = clean></div>
	<h4>EMPACOTADORES</h4>
	<div id = clean></div>
	<h4>CARRINHOS</h4>
</div>
