<!DOCTYPE html>
<html lang="pt">
    <head>
        <title>
            Delicia Gelada   
        </title>
		<meta charset="utf-8">
		<link type="text/css" rel="stylesheet" href="css/style.css">
		<meta id="viewport" name="viewport" content="width=device-width, user-scalable=no">
		<?php
			require_once('modulos/icon.php');
		?>
    </head>
    <body>
    	<?php
			require_once('modulos/header.php');
		?>
		<section id="destaque">
			<h2>Destaques do mês</h2>
			<div class="conteudo center">
				<h1 class="titulo">
					O Guaramês chegou!
				</h1>
				<!--<div class="card-destaque">
					<p class="texto texto-center">
						A primavera chegou e trouxe com ela o florecer de diversar novidades para você!
					</p>
					<p class="texto texto-center">
						Chegou o mês do guaraná, o Guaramês!
					</p>
				</div>-->
			</div>
		</section>
		<div class="decoracao">
			<div class="borda-dashed">
				<div class="separador center">
					<img src="icon/separador.png" alt="separador">
				</div>
			</div>
		</div>
		<section id="produtos-destaque">
			<h2>Produdos em destaque</h2>
			<div class="conteudo center">
				<h1 class="titulo">Veja nossos destaques do Guaramês</h1>
				<div class="produto-em-destaque margem-media-baixo">
					<div class="card-itens margem-media-direita">
						<img src="img/guarana-jesus.jpg" alt="guarana-jesus">
					</div>
					<h3 class="sub-titulo margem-pequena-baixo">Guaraná Jesus</h3>
					<p class="texto margem-media-baixo">
						Vindo diretamente do lugar onde se entende o que é verão, Maranhão, o novo e divino Guaraná Jesus vem para exorcisar o seu calor!
					</p>
					<div class="botao">
						<a href="index.php">VER NA LOJA</a> 
					</div>
				</div>
				<div class="produto-em-destaque margem-media-baixo">
					<div class="card-itens margem-media-direita">
						<img src="img/guarana-antartica.jpg" alt="guarana-antartica">
					</div>
					<h3 class="sub-titulo margem-pequena-baixo">Fanta Guaraná</h3>
					<p class="texto margem-media-baixo">
						Tem novidade na família Fanta. A segunda maior marca da Coca-Cola Brasil lança Fanta Guaraná, o primeiro refrigerante que já chega ao mercado com certificação da origem do guaraná 100% Amazonas.
					</p>
					<div class="botao">
						<a href="index.php">VER NA LOJA</a> 
					</div>
				</div>
				<div class="produto-em-destaque margem-media-baixo">
					<div class="card-itens margem-media-direita">
						<img src="img/itubaina-guarana.jpg" alt="itubaina-guarana">
					</div>
					<h3 class="sub-titulo margem-pequena-baixo">Itubaína Guaraná</h3>
					<p class="texto margem-media-baixo">
						A Itubaína amplia seu portfólio e apresenta ao mercado o novo sabor guaraná. A novidade vem acompanhada do novo posicionamento da marca, que busca resgatar a memória afetiva dos seus consumidores e estimular momentos de diversão.
					</p>
					<div class="botao"> 
						<a href="index.php">VER NA LOJA</a> 
					</div>
				</div>
			</div>
		</section>
		<?php
			require_once('modulos/footer.php');
			require_once('modulos/scripts.php');
		?>
    </body>
</html>