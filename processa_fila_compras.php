<?php	
	$conectar = mysqli_connect ("localhost", "root", "", "4000870");	
	$cod = $_GET["codigo"];	
	
	$sql_altera = "UPDATE amplificadores 		
				   SET 		fila_compra_amp = 'S'
				   WHERE 	cod_amp = '$cod'";
	$sql_resultado_alteracao = mysqli_query ($conectar, $sql_altera);

	if ($sql_resultado_alteracao == true)
	{
		echo "<script>
				alert ('Amplificador colocado na fila de compra com sucesso') 
			  </script>";
		echo "<script> 
				 location.href = ('vendas.php') 
			  </script>";
		exit();
	}  
	else
	{    
		echo "<script> 
				alert ('Ocorreu um erro no servidor. 
				O amplificador n�o foi colocado na fila de compras. Tente de novo') 
			</script>";
		echo "<script> 
				location.href ('vendas.php') 
			 </script>";
	}
?>