<?php
//conexao com o banco
	require_once('bd/conexao.php');
	$conexao = conexaoMysql();

?>

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

			$contadora = (int) 1;
		
			$sql = "select * from pagina_curiosidades where ativado = 1";

			$select = mysqli_query($conexao, $sql);

			//exibindo curiosidades cadastradas no CMS.

			while($rsConsulta = mysqli_fetch_array($select)){
				if($rsConsulta['background'] == ""){
		?>
		<section class="conteudo-sem-bg">
			<h2><?=$rsConsulta['titulo']?></h2>
            <div class="conteudo center">
                <h1 class="titulo">
					<?=$rsConsulta['titulo']?>
                </h1>
                <p class="texto">
					<?=$rsConsulta['texto']?>
                </p>
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
					$contadora += 1;

					if($contadora % 2 == 0){

		?>
		<section class="conteudo-com-bg" style="background-image:url('cms/bd/arquivos/<?=$rsConsulta['background']?>');">
			<h2><?=$rsConsulta['titulo']?></h2>
			<div class="conteudo center">
				<div class="caixa-titulo">
					<h1 class="titulo texto-branco">
						<?=$rsConsulta['titulo']?>
					</h1>
				</div>
				<div class="caixa-texto">
					<p class="texto texto-branco">
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
		?>
		<section class="conteudo-com-bg" style="background-image:url('cms/bd/arquivos/<?=$rsConsulta['background']?>');">
			<h2> <?=$rsConsulta['titulo']?> </h2>
			<div class="conteudo center">
				<div class="caixa-titulo-2">
					<h1 class="titulo texto-branco">
						<?=$rsConsulta['titulo']?>
					</h1>
				</div>
				<div class="caixa-texto-2">
					<p class="texto texto-branco">
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
			}
		
		?>
		<?php
			require_once('modulos/footer.php');
			require_once('modulos/scripts.php');
		?>
		
    </body>
</html>