<!DOCTYPE html>
<html lang="pt">
    <head>
        <title>
            Delicia Gelada   
        </title>
		<meta charset="utf-8">
		<link type="text/css" rel="stylesheet" href="css/style.css">
        <?php
			require_once('modulos/icon.php');
		?>
    </head>
    <body>
    	<?php
			require_once('modulos/header.php');
		?>
		<section id="localizador">
			<h2>Localizar lojas</h2>
            <div class="conteudo center">
                <div class="caixa_texto_localizador">
                    <h2 class="titulo2">
                        ENCONTRE UMA LOJA
                    </h2>
                    <p class="texto_pequeno">
                        Localize uma loja Delícia Gelada mais próxima à você.
                    </p>
                </div>
                <div class="caixa_seletor_localizacao">
                    
                    <select id="seletor_estado">
                        <option>ESTADO</option>
                    </select>
                    
                     <select id="seletor_cidade">
                        <option>CIDADE</option>
                    </select>
                    
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
        <section id="lojas">
			<h2> Lojas </h2>
            <div class="conteudo center">
				<!--caixa de lojas-->
                <div class="caixa_lojas">
					<div class="icone-localizar"></div>
					<div class="linha-vertical"></div>
					<div class="titulo-loja">
						LOJA
					</div>
					<div class="endereco-lojas">
						<div>Av.Rainbow 333</div>
						<div>Asgard</div>
						<div>São Paulo - SP</div>
						<div>CEP: 06622-000 </div>
					</div>
					<button class="botao"> VER NO MAPA</button>
				</div>
				
				<div class="caixa_lojas">
					<div class="icone-localizar"></div>
					<div class="linha-vertical"></div>
					<div class="titulo-loja">
						LOJA 
					</div>
					<div class="endereco-lojas">
						<div>Av.Rainbow 333</div>
						<div>Asgard</div>
						<div>São Paulo - SP</div>
						<div>CEP: 06622-000 </div>
					</div>
					<button class="botao"> VER NO MAPA</button>
				</div>
				
				<div class="caixa_lojas">
					<div class="icone-localizar"></div>
					<div class="linha-vertical"></div>
					<div class="titulo-loja">
						LOJA
					</div>
					<div class="endereco-lojas">
						<div>Av.Rainbow 333</div>
						<div>Asgard</div>
						<div>São Paulo - SP</div>
						<div>CEP: 06622-000 </div>
					</div>
					<button class="botao"> VER NO MAPA</button>
				</div>
				
				<div class="caixa_lojas">
					<div class="icone-localizar"></div>
					<div class="linha-vertical"></div>
					<div class="titulo-loja">
						LOJA
					</div>
					<div class="endereco-lojas">
						<div>Av.Rainbow 333</div>
						<div>Asgard</div>
						<div>São Paulo - SP</div>
						<div>CEP: 06622-000 </div>
					</div>
					<button class="botao"> VER NO MAPA</button>
				</div>
            </div>
        </section>
		<?php
			require_once('modulos/footer.php');
		?>
    </body>
</html>