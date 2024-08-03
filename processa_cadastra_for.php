<?php
	$conectar = mysqli_connect ("localhost", "root", "", "4000870");
	
	$nome = $_POST["nome"];
	$endereco = $_POST["endereco"];
	$telefone = $_POST ["telefone"];
	$nomecontato = $_POST["nomecontato"];	
	$tipoproduto = $_POST["tipoproduto"];
	
	
	$sql_cadastrar = "INSERT INTO fornecedores (nome_for, 
											endereco_for, 
											telefone_for, 
											nomecontato_for, 
											produto_for) 
					  VALUES 			   ('$nome',
											'$endereco', 
											'$telefone',
											'$nomecontato',
											'$tipoproduto')";
											
	$sql_resultado_cadastrar = mysqli_query ($conectar, $sql_cadastrar);
	
	if ($sql_resultado_cadastrar == true) { 	
		echo "<script>
				alert ('$Fornecedor cadastrado com sucesso') 
			  </script>";
		echo "<script>
				location.href = ('cadastra_for.php') 
			  </script>";		
	}
	else { 	
		echo "<script> 
				alert ('ocorreu um erro no servidor ao tentar cadastrar') 
			  </script>";		
		echo "<script> 
				location.href = ('cadastra_for.php') 
			  </script>";	
	}
?>