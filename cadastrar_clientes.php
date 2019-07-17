<?php

	error_reporting(1);
	
	$con = new mysqli("localhost", "root", "", "projeto_servicos");

	if($con->connect_errno == true){
		
		echo "Erro ao conectar!";
		
	}

	//include_once "conexao_banco";

	if($_POST != NULL){
		
		$nome = $_POST["nome"];
		$telefone = $_POST["telefone"];
		$email = $_POST["email"];
		$endereco = $_POST["endereco"];
		$tipo = $_POST["tipocliente"];
		$empresa = $_POST["nomeempresa"];
		
		
		$sql = "INSERT INTO clientes (id_cli, nome_cli, telefone_cli, email_cli, endereco_cli, tipo_cli, empresa_cli)
				VALUES(default, '$nome', '$telefone', '$email', '$endereco', '$tipo', '$empresa')";
				
		$retorno = $con->query($sql);
		
		if($retorno == true){
			
			echo "<script>
					alert('Cliente Cadastrado com Sucesso!!!');
					location = 'profile.php';
				  </script>";
		}
		else{
			
			echo "<script>
					alert('Erro ao cadastrar Cliente');
			      </script>";
		}
		
	}


?>

<!DOCTYPE html>
<html lang="pt-br">

				<!--IMPEDIR CADASTRO DE CLIENTE JÁ CADASTRADO E EXIBIR MENSAGEM-->


	<head>
		<meta charset="UTF-8"/>
		<title>Cadastro de Clientes</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	
	<body>
	
	<div class="container-fluid">

	
		<h1>Cadastro de Cliente</h1> <br>
	
		<form method="post">
		
			Nome: <input type="text" name="nome" required><br><br>
			
			Telefone: <input type="text" name="telefone" maxlength="11" required><br><br>
			
			Email: <input type="text" name="email"><br><br>
			
			Endereço: <input type="text" name="endereco" required><br><br>
			
			Tipo<br>
			<input type="radio" name="tipocliente" id="empresa" value="empresa"> <label for="empresa">Empresa</label><br>
			<input type="radio" name="tipocliente" id="residencia" value="residencia"> <label for="residencia">Residência</label><br><br>
			
			Nome da Empresa: <input type="text" name="nomeempresa" id="idnomeempresa"><br><br>
			
			<div class="btn-group" role="group" aria-label="Basic example">
			
				<input type="submit" value="Cadastrar" class="btn btn-success">
				<button type="submit" onclick="location.href='profile.php'" class="btn btn-secondary">Cancelar</button> <br>
			
			</div>
			
		</form>
		
	</div>
	
	</body>


</html>