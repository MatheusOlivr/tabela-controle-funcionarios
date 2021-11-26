<?php
use App\connection;
require "vendor/autoload.php";
$count = 1;
while($count <= 6)
{
	$array = 
	[
		":CL_HORARIO" => "06:00",
		":CL_NOME" => " "
	];
	Connection::insertInTable("INSERT INTO tb_packer (cl_horario,cl_nome) VALUES (:CL_HORARIO,:CL_NOME)",$array);
	echo "indice $count";
	$count++;
}

 ?>

