<?php

	error_reporting(1);
	
	$con = new mysqli("localhost", "root", "", "projeto_servicos");
	
	if($con->connect_errno == true){
		echo "Erro ao conectar com o Banco de Dados!!!"
	}
	
	if($_POST != NULL){
		
		$material = $_POST["material"];
		$qtd_material = $_POST["qtd_material"];
		$valor_material = $_POST["valor_material"];
		
	}
	
	
	


?>

<!DOCTYPE html>
<html lang="pt-br">

	<head>
		<title>Material do Orçamento</title>
		<meta charset="UTF-8"/>
	</head>
	
	<body>
		
		<h2>Cadastro de Material</h2>
		
		<form>
			
			Material: <input type="text" name="material" required>
			Qtd: <input type="number" name="qtd_material" min="1" max="1000" required>
			Valor: <input type="text" name="valor_material" placeholder="Apenas números"required>
			
			<br><br>
			
			<input type="submit" value="Finalizar">
			<button type="submit" value="s"> + </button>
			
		</form>
	
	</body>

</html>