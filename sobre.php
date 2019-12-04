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

		<?php
		
			require_once('cms/bd/conexao.php');
			$conexao = conexaoMysql();

			$contadora = 1;

			$sql = "select * from pagina_sobre where ativado = 1";

			$select = mysqli_query($conexao, $sql);

			while($rsConsulta = mysqli_fetch_array($select)){
				$contadora += 1;

				if($contadora % 2 == 0){

		?>
			
		<section class="sobre">
			<h2>Conteudo principal sobre a empresa</h2>
			<div class="conteudo center">

				<div class="img_principal_sobre" style="background-image:url('cms/bd/arquivos/<?=$rsConsulta['imagem']?>')">
					<!--imagem posta como background-->
				</div>
				
				<div class="titulo_sobre_caixa">
					<h1 class="titulo">
						<?=$rsConsulta['titulo']?>
					</h1>
					<p class="texto">
						<?=$rsConsulta['texto']?>
					</p>
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
		<?php
				}else{
				//esle
		?>
		<section class="sobre2">
			<h2>Conteudo principal sobre a empresa</h2>
			<div class="conteudo center">

				<div class="img_principal_sobre_right" style="background-image:url('cms/bd/arquivos/<?=$rsConsulta['imagem']?>')">
					<!--imagem posta como background-->
				</div>
				
				<div class="titulo_sobre_caixa">
					<h1 class="titulo">
						<?=$rsConsulta['titulo']?>
					</h1>
					<p class="texto">
						<?=$rsConsulta['texto']?>
					</p>
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



		<?php
				}
			}
		?>
		
		<section id="sobre_origem">
			<h2> Origem da Empresa </h2>
			<div class="conteudo center">
				<div class="img_origem_sobre">
					
				</div>
				<div class="caixa_origem_sobre">
					<h1 class="titulo">
						ORIGEM DA EMPRESA
					</h1>
						
					<p class="texto">
						Dos campos verdejantes do interior do estado de São Paulo, surge a ideia, dois amigos muito unidos começam uma pesquisa de campo simples, com a intenção de iniciar um negócio em Bofete – SP, cidade onde ambos viviam. A pesquisa era simples, saber se as pessoas, nos horários das refeições principais, tinham alguma bebida de acompanhamento. A resposta não foi uma surpresa, mais de 80% responderam que possuíam bebidas como acompanhamento.
					</p>
					<br>
					<p class="texto">
						Com os resultados seguiram com a ideia, fundaram primeiramente uma adega Delícia Gelada em Bofete e Botucatú, ambas cidades do interior de São Paulo e hoje já contam com lojas em quase todos os estados do Brasil, atendendo diversas famílias direta e indiretamente.
					</p>
				</div>
			</div>
        </section>
		<?php
			require_once('modulos/footer.php');
			require_once('modulos/scripts.php');
		?>
		
    </body>
</html>