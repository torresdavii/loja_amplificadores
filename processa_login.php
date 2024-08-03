<?php
	session_start ();

	$conectar = mysqli_connect ("localhost", "root", "", "4000870");
	
	$login = $_POST["login"];
	$senha = $_POST["senha"];	
		
	$sql_consulta = "SELECT login_fun, senha_fun,
						    cod_fun, nome_fun, funcao_fun
					 
					 FROM funcionarios
					 WHERE 
					       login_fun = '$login' 
					 AND 
					       senha_fun = '$senha'
				     AND
						   status_fun = 'ATIVO'";
					 
	$resultado_consulta = mysqli_query ($conectar, $sql_consulta);
	
	$linhas = mysqli_num_rows ($resultado_consulta);	
	
	if ($linhas == 1) {
		
		$registro = mysqli_fetch_row($resultado_consulta);
		
		$_SESSION["codigo"] = $registro[2];
		$_SESSION["nome"] = $registro[3];
		$_SESSION["funcao"] = $registro[4];		
		
		echo "<script> 
					location.href = ('administracao.php') 
			  </script>";
	}
	else {
		echo "<script> 
				  alert ('Login ou Senha Incorretos! Digite Novamente!!') 
			  </script>";
		echo "<script> location.href = ('index.php') </script>";
	}
?>