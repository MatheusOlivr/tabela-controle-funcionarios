<?php 
	namespace App\Models;
	use App\Connection;
	class Index extends Connection
	{
		public static function truncateTable()
		{		
			if (Connection::truncate("TRUNCATE TABLE tb_cashier") && Connection::updateInTable("TRUNCATE TABLE tb_packer") && Connection::updateInTable("TRUNCATE TABLE tb_cart"))
			{
				$cont = 1;
				while($cont<=10)
				{
					Connection::truncate("INSERT INTO tb_cashier (cl_horario,cl_numerocaixa) VALUES ('06:00',$cont)");
					$cont++;
				}
				$cont = 11;
				while($cont<=20)
				{
					Connection::truncate("INSERT INTO tb_cashier (cl_horario,cl_numerocaixa) VALUES ('14:00',$cont)");
					$cont++;
				}
				$cont = 0;
				while($cont<=3)
				{
					Connection::truncate("INSERT INTO tb_packer (cl_horario) VALUES ('06:00')");
					Connection::truncate("INSERT INTO tb_cart (cl_horario) VALUES ('06:00')");
					$cont++;
				}
				$cont = 3;
				while($cont<=5)
				{
					Connection::truncate("INSERT INTO tb_packer (cl_horario) VALUES ('14:00')");
					Connection::truncate("INSERT INTO tb_cart (cl_horario) VALUES ('14:00')");
					$cont++;
				}
				echo "Tabela do dia anterior apagada com sucesso";

			}
		}
	}
?>