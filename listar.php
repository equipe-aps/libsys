<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf8"/>
		<link rel="stylesheet" type="text/css" href="estilo.css">
	</head>
	<body>
	
<?php
header("Content-Type: text/html; charset=ISO-8859-1",true);
require_once ("conection/conexao.php");

// cria a instrução SQL que vai selecionar os dados
$sql = "SELECT  autor,  titulo, preco FROM LIVRO ORDER BY id desc";
$dados = mysql_query($sql);
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
	<!-- Card -->
    <div class="card align-items-center">
        <!-- Card image -->
        <div class="view overlay">
            <img src="https://upload.wikimedia.org/wikipedia/pt/d/d9/Capa_do_livro_Como_Ser_um_Pirata.jpg" class="card-img-top" alt="">
            <a>
                <div class="mask rgba-white-slight"></div>
            </a>
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
                    <a href="" class="dark-grey-text">
                        <?=$linha['titulo']?>
                        <span class="badge badge-pill danger-color">NEW</span>
                    </a>
                </strong>
            </h5>
            <h4 class="font-weight-bold blue-text">
                <strong><?=$linha['preco']?>$</strong>
            </h4>
        </div>
        <!-- Card content -->
    </div>
    <!-- Card -->	

<?php
			// finaliza o loop que vai mostrar os dados
			}while($linha = mysql_fetch_assoc($dados));
		// fim do if 
		}
// tira o resultado da busca da memória
mysql_free_result($dados);
?>

</body>
</html>