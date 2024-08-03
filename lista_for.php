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
					<p align="right">
						Olá <?php include "valida_login.php" ?>
					</p>
					<?php include "menu_local.php"; ?>
				</div>
			</div>
			<div id="conteudo_especifico">
				<h1> FORNECEDORES </h1>
				<p align="right">
					<a href="cadastra_for.php">
						Cadastro de fornecedores
					</a>				
				</p>				
				<?php
					$conectar = mysqli_connect("localhost","root","","4000870");
					
					$sql_pesquisa = "SELECT
										cod_for,
                                        nome_for,
										telefone_for,
										nomecontato_for,
										produto_for
										
                                        
									 FROM
										fornecedores";
										
					$sql_resultado = mysqli_query($conectar, $sql_pesquisa);				
				?>
			
				<table width="100%" border=1>
							<tr height="50px">
								<td>
									NOME DO FORNECEDOR
								</td>
								
								<td>
									TELEFONE
								</td>

								<td>
									NOME DE CONTATO
								</td>
								
                                <td>
									PRODUTO
								</td>
                                <td>
									AÇÃO
								</td>
							</tr>
					<?php
						while ($registro = mysqli_fetch_row($sql_resultado)) {
					?>
							<tr height="50px">
								<td>
									<a href="exibe_for.php?codigo=<?php echo $registro[0];?>">
										<?php echo $registro[1];?>
									</a>
								</td>
								<td>
									<?php echo $registro[2]; ?>
								</td>
								
								<td>
									<?php echo $registro[3]; ?>
								</td>
								
								<td>
									<?php echo $registro[4]; ?>
								</td>
                
								<td>
									<a href="altera_for.php?codigo=<?php echo $registro[0];?>">	
										alterar
									</a>
								</td>
							</tr>
					<?php
						}
					?>
				</table>
				
				
			</div>	
			<div id="rodape">
				<div id="texto_institucional">
					<div id="texto_institucional">
						<h6> AMPLI - CONTROL </h6> 
						<h6> Rua do Rock, 666 -- E-mail: contato@ampli_control.com.br -- Fone: (61) 9966 - 6677 </h6> 
					</div> 
				</div>
				
		</div>
    </body>
</html>