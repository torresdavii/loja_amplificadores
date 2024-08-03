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
				<h1> ALTERAÇÃO DE AMPLIFICADORES </h1>				
				<?php
					$conectar = mysqli_connect ("localhost", "root", "", "4000870");
					
					$cod = $_GET["codigo"];
									
					$sql_pesquisa = "SELECT  
										marca_amp, 
										modelo_amp, 
										tipo_amp, 
										preco_amp
									FROM 
										amplificadores
									WHERE cod_amp = '$cod'";
					$resultado_pesquisa = mysqli_query ($conectar, $sql_pesquisa);	
					
					$registro = mysqli_fetch_row($resultado_pesquisa);
				?>
				<form method="post" action="processa_altera_amp.php" enctype="multipart/form-data">
					<input type="hidden" name="codigo" value="<?php echo $cod; ?>">

					<h2> Fornecedor: </h2> <select id="selecao" name="codfornecedor">
					<?php

						$conn = mysqli_connect("localhost","root","","4000870");
            			
            			$sql = "SELECT cod_for, nome_for FROM fornecedores";
            			$result = $conn->query($sql);

            			if ($result->num_rows > 0) {
                			while($row = $result->fetch_assoc()) {
                    			echo "<option value='" . $row["cod_for"] . "'>" . $row["nome_for"] . "</option>";
                			}
            			} 
          			
            		?>
					</select>
					
					<h2> Marca: </h2>  <input type="text" name="marca" required 
												value="<?php echo "$registro[0]"; ?>" > 
					
					<h2> Modelo: </h2>  <input type="text" name="modelo" required 
													value="<?php echo "$registro[1]"; ?>"> 
					
					<h2> Preço: </h2>  <input type="text" name="preco" required 
													value="<?php echo "$registro[3]"; ?>"> 
					
					<h2> Foto: </h2>  <input type="file" name = "foto"> 
					
					<h2> Tipo: </h2>  <select id="selecao" name="tipo">
									<option value="guitarra"
										<?php
												if ($registro[2] == "guitarra") {
													echo "selected";
												}
										?> > Guitarra </option>
									<option value="baixo"
										<?php
												if ($registro[2] == "baixo") {
													echo "selected";
												}
										?>	> Baixo </option>
									<option value="violao"
										<?php
												if ($registro[2] == "violao") {
													echo "selected";
												}
									    ?>	> Violão </option>
								</select>
					</p>
					<p> <input id="botao" type="submit" value="Alterar Amplificador"> </p>								
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