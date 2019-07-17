<?php

	error_reporting(1);
	
	$con = new mysqli("localhost", "root", "", "projeto_servicos");

	if ($con->connect_errno == true){
		
		echo "Erro ao conectar!";
		
	}
	
	if($_POST != NULL){
		
		
		$titulo = $_POST["titulo"];
		
		$dataAtual = new DateTime();
		$data = $dataAtual->format("d/m/Y H:i:s");
		
		$cliente = $_POST["cliente_orcamento"];
		$descservico = $_POST["descservico"];
		$maodeobra = $_POST["maodeobra"];
		
		$qtd_ano = ($_POST["qtd_ano"] * 365);
		$qtd_mes = ($_POST["qtd_mes"] * 30);
		$qtd_dia = $_POST["qtd_dia"];
		$qtd_hora = $_POST["qtd_hora"];
		
		$prazo = ($qtd_ano + $qtd_mes + $qtd_dia);
		
		//TESTE DE VERIFICAÇÃO DO FORMULARIO
		
		echo "<strong>Teste de Verificação do formulário:</strong><br>";
		
		echo $titulo. "<br>". $data. "<br>". $cliente. "<br>". $descservico. "<br>". $maodeobra. "<br>". $qtd_ano. "<br>". $qtd_mes. "<br>". $qtd_dia. "<br>". $qtd_hora. $prazo. "<br><br>";
		
		//------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		
		$sql = "INSERT INTO orcamento(id_orc, titulo_orc, data_orc, cliente_orc, id_cli, descricao_orc, material_orc, servico_orc, mao_de_obra_orc, prazo_orc, total_orc, status_orc)
		        VALUES(DEFAULT, '$titulo', '$data', '$cliente', '', '$descservico', '', '', '$maodeobra', '$prazo', '')";
				
		$retorno = $con->query($sql);
		
		echo var_dump($retorno);
		
		/*
		if ($retorno == true){
			
			echo "<script>
				  alert('Orçamento cadastrado com sucesso!!!');
				  location = 'profile.php';
				 </script>";
		} 
		else{
			echo "<script>
				 alert('Erro ao cadastrar orçamento. Favor entrar em contato com o suporte.');
				 location = 'profile.php';
			     </script>";
		}
		*/
	
	}

?>



<!DOCTYPE html>
<html lang="pt-br">

					<!-- FAZER ORÇAMENTO -->
					
	<head>
		<meta charset="UTF-8"/>
		<title>Orçamento</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	
	<body>
	
	<h2>Novo Orçamento - nome_cliente</h2> <br>
		
		<div class="container-fluid">
		
			<form method="POST">
				
				<?php
					
					$sql_select = "SELECT id_cli, nome_cli FROM clientes";
					$retorno = $con->query($sql_select);
					
				?>
				<strong>Cliente:</strong>
				<select name = "cliente_orcamento">
					
					<option>Selecione...</option>
					
					<?php
					
						while($registro = $retorno->fetch_array()){
							echo "<option value = '$registro[nome_cli]' >".  $registro['id_cli']. " - ". $registro['nome_cli']. "</option>";
							$id_cli = $registro["id_cli"];
						}
					
					?>
					
				</select>
				
				<br><br>
				
				<strong>Título:</strong><br>
				<input type="text" name="titulo" placeholder="Apenas duas palavras">
								
				<br><br>
			
				<strong>Descrição do serviço:</strong><br><textarea  name="descservico" placeholder="Descreva o serviço a ser realizado" required></textarea>
				<br><br>
				
				<!--
				
			    A FAZER: CADASTRO DE MATERIAIS E CADASTRO DE SERVIÇOS TERCEIRIZADOS
				
				<input type="submit" value="Cadastrar Material" onclick="location.href = 'cadastromaterial'" class="btn btn-secondary"><br><br>

				<input type="submit" value="Cadastrar Serviços" onclick="location.href = 'cadastromaterial'" class="btn btn-secondary"><br><br>
				
				-->
				
				<strong>Valor da mão de obra:</strong> <input type="number" name="maodeobra" min="0">
				
				<br><br>
				
				<strong>Prazo estipulado</strong><br>
				Qtd. Ano: <input type="number" name="qtd_ano">
				Qtd. Mês: <input type="number" name="qtd_mes">
				Qtd. Dia: <input type="number" name="qtd_dia" max="365">
				Qtd. Hora: <input type="number" name="qtd_hora" max="24">
				
				<br><br>
				
				<input type="submit" value="FINALIZAR" class="btn btn-success">
	
			</form>
		
			<br>
			
			<button type="submit" onclick="location.href='profile.php'" class="btn btn-primary">Home</button>
			
		</div>
		
	</body>
</html>