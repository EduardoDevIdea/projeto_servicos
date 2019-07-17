<?php

	error_reporting(1);
	
	$con = new mysqli("localhost", "root", "", "projeto_servicos");

	if($con->connect_errno == true){
		
		echo "Erro ao conectar com o banco de Dados. Favor entrar em contato com o suporte do sistema.";
	}
		//include_once "conexao_banco";
	
	$codigo = $_GET["codigo"];
	
	$sql = "SELECT *
	        FROM clientes
	        WHERE id_cli = $codigo";
			
	$retorno = $con->query($sql);
	
	if ($retorno != true){
		
		echo "<script>
				alert('Erro ao realizar consulta dos dados. Favor entrar em contato com o suporte do sistema.');
		      </script>";
	}
	
	$registro = $retorno->fetch_array();
		
		$nome = $registro["nome_cli"];
		$telefone = $registro["telefone_cli"];
		$email = $registro["email_cli"];
		$endereco =  $registro["endereco_cli"];
		$tipo = $registro["tipo_cli"];
		$empresa = $registro["empresa_cli"];
		

	if($_POST != NULL){
		
		$nome = $_POST["nome"];
		$telefone = $_POST["telefone"];
		$email = $_POST["email"];
		$endereco = $_POST["endereco"];
		$tipo = $_POST["tipocliente"];
		$empresa = $_POST["nomeempresa"];
		
		
		$sql = "UPDATE clientes
		        SET nome_cli = '$nome',
		            telefone_cli = '$telefone',
		            email_cli = '$email',
		            endereco_cli = '$endereco',
		            tipo_cli = '$tipo',
		            empresa_cli = '$empresa'
				WHERE id_cli = '$codigo'";
				
		$retorno = $con->query($sql);
		
		if($retorno == true){
			
			echo "<script>
					alert('Cadastro do Cliente atualizado com sucesso!');
					location = 'profile.php';
				  </script>";
		}
		else{
			
			echo "<script>
					alert('Erro ao atualizar cadastro. Favor entrar em contato com o suporte do sistema');
			      </script>";
		}
		
	}

?>


<!DOCTYPE html>
<html lang="pt-br">

											<!--ATUALIZAR CADASTRO DE CLIENTE-->


	<head>
		<meta charset="UTF-8"/>
		<title>Cadastro de Clientes</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	
	<body>
	
	<div class="container-fluid">
	
		<h1>Atualização de cadastro de Cliente</h1> <br>
	
		<form method="post">
		
			Nome:<input type="text" name="nome"  value="<?php echo $nome ?>" required><br><br>
			
			Telefone:<input type="text" name="telefone" maxlength="11"  value="<?php echo $telefone ?>" required><br><br>
			
			Email:<input type="text" name="email" value="<?php echo $email ?>" ><br><br>
			
			Endereço:<input type="text" name="endereco"  value="<?php echo $endereco ?>" required><br><br>
			
			Tipo<br>
			
				<input type="radio" name="tipocliente" id="empresa" value="Empresa"
					<?php echo ($tipo == 'empresa')? "checked" : null ?>
				> <label for="empresa">Empresa</label><br>
				
				<input type="radio" name="tipocliente" id="residencia" value="Residencia"
					<?php echo ($tipo == 'residencia')? "checked" : null ?>
				> <label for="residencia">Residência</label><br><br>
			
			Nome da Empresa:<input type="text" name="nomeempresa" id="idnomeempresa" value = "<?php echo $empresa ?>" ><br><br>
			
			<div class="btn-group" role="group" aria-label="Basic example">
			
				<input type="submit" value="Confirmar" class="btn btn-success">
				<button type="submit" onclick="location.href='listar_clientes.php'" class="btn btn-secondary">Cancelar</button>
				<button type="submit" onclick="location.href='profile.php'" class="btn btn-primary">Home</button>
				
			</div>
			
		</form>
		
	</div>
		
	</body>


</html>