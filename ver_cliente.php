<?php

	error_reporting(1);

	$con = new mysqli("localhost", "root", "", "projeto_servicos");

	if($con->connect_errno == true){
		echo "Erro ao conectar com o banco de dados!";	
	}
	
	$codigo = $_GET["codigo"];
	
	$sql = "SELECT *
			FROM clientes
			WHERE id_cli = $codigo";
			
	$retorno = $con->query($sql);
	
	if($retorno != true){
		
		echo "<script>
				alert('Erro ao realizar consulta. Entre em contato com o suporte do sistema');
			 </script>";
	}

?>

<!DOCTYPE html>
<html lang="pt-br">

	<head>
		<meta charset="UTF-8"/>
		<title>Detalhes do cliente</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	
	<body>
	
	<div class="container-fluid">
	
		<h2>Detalhes do registro</h2>
	
		<table border="1">
		
			<tr>
				<th>Código</th>
				<th>Nome</th>
				<th>Telefone</th>
				<th>Email</th>
				<th>Endereço</th>
				<th>Tipo</th>
				<th>Empresa</th>
			</tr>
			
			<?php
			
				$registro = $retorno->fetch_array();
				
				$codigo = $registro["id_cli"];
				$nome = $registro["nome_cli"];
				$telefone = $registro["telefone_cli"];
				$email = $registro["email_cli"];
				$endereco = $registro["endereco_cli"];
				$tipo = $registro["tipo_cli"];
				$empresa = $registro["empresa_cli"];
				
				echo "<tr>
						<td> $codigo </td>
						<td> $nome </td>
						<td> $telefone </td>
						<td> $email </td>
						<td> $endereco </td>
						<td> $tipo </td>
						<td> $empresa </td>
				      </tr>";
			
			?>
			
		</table>
		
		<br>
		
		<div class="btn-group" role="group" aria-label="Basic example">
		
			<button type='button' onclick="location.href='editar_cliente.php?codigo=$codigo'" class="btn btn-warning">Editar</button>
			<button type="button" onclick="location.href='profile.php'" class="btn btn-primary">Home</button>
		
		</div>
		
		<br><br>
		
		<strong><a href="listar_clientes.php">Voltar</a></strong>
		
		
	</div>
		
	</body>

</html>



