<?php

	$con = new mysqli("localhost", "root", "", "projeto_servicos");

	
		if ($con->connect_errno == true){
		
		echo "Erro ao conectar!";
		
		}

	if($_POST != NULL){
		
		$nome = $_POST["nome"];
		$login = $_POST["login"];
		$senha = $_POST["senha"];
		
		$sql = "INSERT INTO usuario (id, nome, login, senha)
		       VALUES('default','$nome','$login','$senha')";
			   
		$retorno = $con->query($sql);
		
		if($retorno == true){
			
			echo "<script>
					alert('Conta criada com sucesso!!!');
					location = 'profile.php';
				  </script>";
			
		}else {
			"<script>
					alert('Erro ao criar conta!!!');
			</script>";
		}
		
	}


?>


<!DOCTYPE html>
<html lang="pt-br">

	<head>
		<meta charset="UTF-8"/>
		<title>Criar Conta</title>
	</head>
	
	<body>
	<h2>Crie uma conta</h2>
		<form method="POST">
			Nome: <input type="text" name="nome" required><br><br>
			Login: <input type="text" name="login" required><br><br>
			Senha: <input type="text" name="senha" required><br><br>
			<input type="submit" value="Criar">
		</form>
	</body>



</html>