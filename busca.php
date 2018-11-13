<!DOCTYPE html>
<html>
<head>
	<title></title>
		<meta charset="utf8"/>
		<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
<h3>RESULTADO:</h3>
<!-- Card deck -->
<div class="card-deck" style="margin-top: 2%;">
	<!-- Grid row -->
	<div class="row">
		<?php
							
		require_once ("../conection/conexao.php");
		// cria a instrução SQL que vai selecionar os dados
		$busca="SELECT autor, titulo, preco, imagem, qtd FROM livro WHERE titulo LIKE '%$buscas%' AND qtd >= 1 ORDER BY id desc";
		$dados = mysql_query($busca);
		// transforma os dados em um array
		$linha = mysql_fetch_assoc($dados);
		// calcula quantos dados retornaram
		$total = mysql_num_rows($dados);
		$conta = 1;
			// se o número de resultados for maior que zero, mostra os dados
			if($total > 0) {
				// inicia o loop que vai mostrar todos os dados
				do {
		?>
							

		<!-- teste -->
		<div class="col-lg-3 col-md-6 mb-lg-0 mb-4" style="margin-top: 2%">
			<!-- Card -->
			<div class="card align-items-center">
			<!-- Card image -->
			<div class="view overlay">
				<img height="400" width="300" src="../<?=$linha['imagem']?>" class="card-img-top" alt="">
					<a><div class="mask rgba-white-slight"></div></a>
			</div>
			<!-- Card image -->
			<!-- Card content -->
			<div class="card-body text-center">
				<!-- Category & Title -->
				<a href="" class="grey-text">
					<h5><?=$linha['autor']?></h5>
				</a>
				<h5>
					<strong>
						<a href="" class="dark-grey-text"><?=$linha['titulo']?>
							<span class="badge badge-pill danger-color">NEW</span>
                        </a>
					</strong>
				</h5>
				<p>Qtd: <?=$linha['qtd']?></p>
				<h4 class="font-weight-bold blue-text">
					<strong>R$<?=$linha['preco']?></strong>
				</h4>
			</div>
			<!-- Card content -->
			</div>
			<!-- Card -->
		</div>
		<!-- Grid column -->
		<!-- teste -->
		<?php
					// finaliza o loop que vai mostrar os dados
					}while($linha = mysql_fetch_assoc($dados));
				// fim do if 
				}else{
					echo "Nenhum resultado encontrado para '$buscas'.";
				}
		// tira o resultado da busca da memória
		mysql_free_result($dados);
		?>
								
	</div>
	<!-- Grid row -->
</div>
<!-- Card deck -->
</body>
</html>