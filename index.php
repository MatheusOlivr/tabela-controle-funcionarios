<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ControleOperadoresCaixas</title>
	<style>
		table
		{
			text-align: center;
			border-collapse: collapse;
		}
		td,th
		{
			border: solid 1px black;
		}
	</style>
</head>
<body>
	<form method = "POST">
		<label for = "employeePosition">Cargo do funcionario que deseja adicionar na tabela</label>
		<br>
			<button id = "employeePosition" name = "employeePositionButton" value = "operador">OPERADOR</button>
			<button id = "employeePosition" name = "employeePositionButton" value = "empacotador">EMPACOTADOR</button>
			<button id = "employeePosition" name = "employeePositionButton" value = "carrinho"> CARRINHO</button>
		<br>
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
						require_once("formShift".".phtml");
						require_once($view.".phtml");
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
	use App\Models\Cashier;
	require "vendor/autoload.php";
	$conn = new Connection;
	$cont = 0;
	if(isset($_POST["showTableButton"]))
		{
			$teste = new Cashier;
			$results = Cashier::getTable("evening");
			echo "<table>";
			echo "
				<tr>
						<th>TURNO</th>
						<th coldspan = 2>NUMERO DO CAIXA E NOME DO OPERADOR</th>
				</tr>";
			foreach($results as $key => $value)
			{
				echo "<tr>";
				echo "<td>".$value["cl_horario"]."</td>";
				echo "<td> Caixa - ".$value["cl_numerocaixa"]." - Op: ".$value["cl_nome"]."</td>";
				echo "</tr>";
			}
			echo "</table>";
		}	
	if ($_SERVER["REQUEST_METHOD"] === "POST")
		{
		if (isset($_POST["putInTableButton"]))
			{
			$idEmployee = $_POST["idEmployeeInput"];
			$nameEmployee = $_POST['nameEmployeeInput'];
			$employeePosition	= $_SESSION["employeePosition"];
			$turno = $_POST["shiftSelect"];
			$conn->insertInTable("UPDATE tb_cashier SET cl_nome = :CLNOME,cl_numerocaixa =:CLNUMEROCAIXA,cl_horario = :CLTURNO WHERE cl_id = :CLID",array
				(
					":CLNUMEROCAIXA" => $idEmployee,
					":CLNOME" => $nameEmployee,
					":CLTURNO" => $turno,
					":CLID" => $idEmployee
				));
			echo "deu certo";
			/*/if (
			{
				echo "O ".$employeePosition.": ".$nameEmployee."<br>";
				echo "Foi colocado no caixa ".$idEmployee."<br>";
			}*/
		}
	}
?>