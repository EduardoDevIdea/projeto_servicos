<?php

	error_reporting(1);
	
	$con = new mysqli("localhost", "root", "", "projeto_servicos");

	if ($con->connect_errno == true){
		
		echo "Erro ao conectar!";
		
		
	}

?>