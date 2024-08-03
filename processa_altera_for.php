<?php	
	$conectar = mysqli_connect ("localhost", "root", "", "4000870");				
	
	$cod = $_POST["codigo"];
	$nome = $_POST["nome"];
	$endereco = $_POST["endereco"];
	$telefone = $_POST ["telefone"];
	$nomecontato = $_POST["nomecontato"];	
	$tipoproduto = $_POST["tipoproduto"];
	
	
	
	$sql_altera = "UPDATE fornecedores 		
				   SET 		nome_for ='$nome', 
							endereco_for = '$endereco',
							telefone_for ='$telefone', 
							nomecontato_for = '$nomecontato',
							produto_for = '$tipoproduto'

				   WHERE 	cod_for = '$cod'";
	$sql_resultado_alteracao = mysqli_query ($conectar, $sql_altera);
	if ($sql_resultado_alteracao == true)
	{
		echo "<script>
				alert ('$fornecedor alterado com sucesso') 
			  </script>";
		echo "<script> 
				 location.href = ('lista_for.php') 
			  </script>";
	}  
	else{    
		echo "<script> 
				alert ('Ocorreu um erro no servidor. 
						Dados do amplificador não foram alterados. Tente de novo') 
			</script>";
		echo "<script> 
				location.href ('altera_for.php?codigo=$cod') 
			 </script>";
	}
?>