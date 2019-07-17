<?php

	error_reporting(1);
	
	$con = new mysqli("localhost", "root", "", "projeto_servicos");
	
	if($con->connect_errno == true){
		
		echo "Erro ao conectar com o Banco de Dados!!!";
		
	}
	
	$sql = "SELECT * FROM clientes";
	
	$retorno = $con->query($sql);
	
	if($retorno != true){
		
		echo "<script>
				alert('Erro ao Realizar Consulta!!!
				       Entre em contato com o suporte do sistema');
		      </script>";
	}
	

?>



<!DOCTYPE html>
<html lang="pt-br">

			<!-- LISTA DE CLIENTES -->


	<head>
		<meta charset="UTF-8"/>
		<title>Lista de Clientes</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	
	<body>
	
	<div class="container-fluid">
	
		<h2>Lista de Clientes</h2>
		
		<table border="1">
		
			<tr>
				<th>Nome</th>
				<th>Telefone</th>
				<th>Email</th>
				<th>ver</th>
				<th>editar</th>
				<th>excluir</th>
			</tr>
			
			<?php
			
				while($registro = $retorno->fetch_array()){ //fetch_array obtem a linha de resultado associativa
					
					$codigo = $registro["id_cli"];
					$nome = $registro["nome_cli"];
					$telefone = $registro["telefone_cli"];
					$email = $registro["email_cli"];
					$endereco = $registro["endereco_cli"];
					$tipo = $registro["tipo_cli"];
					$empresa = $registro["empresa_cli"];
					
					echo "<tr>
							<td> $nome </td>
							<td> $telefone </td>
							<td> $email </td>
							<td> <a href = 'ver_cliente.php?codigo=$codigo'> Ver </a> </td>
							<td> <a href = 'editar_cliente.php?codigo=$codigo'> Editar </a> </td>
							<td> <a onclick = 'return confirm(\"Deseja Excluir este Cadastro?\");' href = 'excluir_cadastro.php'> Excluir </a> </td>
						  </tr>";
					
				}
				
			
			?>
			
		</table>
	
		<br><br>
		
		<strong><a href="profile.php">Voltar</a></strong>
	
	
	</div>
	
	</body>


</html>