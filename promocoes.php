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
		<section id="promocoes">
			<h2>Promoções</h2>
			<div class="conteudo center">
				<div class="imagem-promocoes">
				</div>
				<div class="txt-promocoes titulo texto-center">
					promoções do mês!
				</div>
			</div>
		</section>
		<div class="decoracao">
			<div class="borda-dashed">
				<div class="separador center">
					<img src="icon/separador.png" alt="separador">
				</div>
			</div>
		</div>
		<section id="produtos-desconto">
			<h2>Produtos com desconto</h2>
			<div class="conteudo center">
				<div class="produtos-com-desconto center">
                    <div class="caixa_produto">
                        <div class="img_produto center">
                            <img src="img/fanta_guarana.jpg" alt="produto">
                        </div>
                        <div class="desc_produto">
                            <ul>
                                <li>Nome:</li>
                                <li>Descrição:</li>
                                <li>
									Preço:
									<span class="preco">
									 
									</span> 
									<span class="preco-antigo">
										R$6,50
									</span>
									<span class="preco-novo">
										R$4,99
									</span>
								</li>
                                <li class="detalhes">Detalhes</li>
                            </ul>
                        </div>
                    </div>
					
					<div class="caixa_produto">
                        <div class="img_produto center">
                            <img src="img/fanta_guarana.jpg" alt="produto">
                        </div>
                        <div class="desc_produto">
                            <ul>
                                <li>Nome:</li>
                                <li>Descrição:</li>
                                <li>
									Preço:
									<span class="preco">
									 
									</span> 
									<span class="preco-antigo">
										R$6,50
									</span>
									<span class="preco-novo">
										R$4,99
									</span>
								</li>
                                <li class="detalhes">Detalhes</li>
                            </ul>
                        </div>
                    </div>
					
					<div class="caixa_produto">
                        <div class="img_produto center">
                            <img src="img/fanta_guarana.jpg" alt="produto">
                        </div>
                        <div class="desc_produto">
                            <ul>
                                <li>Nome:</li>
                                <li>Descrição:</li>
                                <li>
									Preço:
									<span class="preco">
									 
									</span> 
									<span class="preco-antigo">
										R$6,50
									</span>
									<span class="preco-novo">
										R$4,99
									</span>
								</li>
                                <li class="detalhes">Detalhes</li>
                            </ul>
                        </div>
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