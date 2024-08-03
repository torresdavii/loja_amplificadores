<?php 
	session_start ();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/layout.css">
		<link rel="stylesheet" type="text/css" href="css/menu.css">
        <link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet">
    </head>
    <body>
        <div id="principal">
			<div id="topo">
				<div id="logo">
					<h1> ROCK N´ROLL </h1>
					<h1> Amplificadores </h1>
				</div>
				<div id="menu_global"  class="menu_global">
					<p align="right"> Olá <?php include "valida_login.php";?> </p>
					<?php include "menu_local.php"; ?>               
				</div>
			</div>
			<div id="conteudo_especifico">
				<h1> CADASTRO DE AMPLIFICADORES </h1>
			
				<form method="post" action="processa_cadastra_amp.php" enctype="multipart/form-data">
					<h2>Fornecedor: <h2>
						<select id="selecao" name="codfornecedor">
							<?php

								$conn = mysqli_connect("localhost","root","","4000870");
            			
            					$sql = "SELECT cod_for, nome_for FROM fornecedores";
            					$result = $conn->query($sql);

            					if ($result->num_rows > 0) {
                					while($row = $result->fetch_assoc()) {
                    					echo "<option value='" . $row["cod_for"] . "'>" . $row["nome_for"] . "</option>";
                					}
            					} else {
                					echo "<option value=''>Nenhum fornecedor encontrado</option>";
            					}
          			
            				?>
						</select>
					
					<h2>Marca: </h2> <input type="text" name="marca" required> 
					<h2>Modelo: <h2> <input type="text" name="modelo" required> 
					<h2>Preço: <h2>  <input type="text" name="preco" required> 
					<h2>Foto: <h2>   <input type="file" name = "foto"> 
					
					<h2>Tipo: <h2>  <select id="selecao" name="tipo">
									<option value="guitarra"> Guitarra </option>
									<option value="baixo"> Contra-baixo </option>
									<option value="violao"> Violão </option>
							</select>
					
					<p> <input id="botao" type="submit" value="Cadastrar Amplificador"> </p>								
				</form>
			</div>	
			<div id="rodape">
				<div id="texto_institucional">
					<div id="texto_institucional">
						<h6> AMPLI - CONTROL </h6> 
						<h6> Rua do Rock, 666 -- E-mail: contato@ampli_control.com.br -- Fone: (61) 9966 - 6677 </h6> 
					</div> 
				</div>
			</div>
		</div>
    </body>
</html>