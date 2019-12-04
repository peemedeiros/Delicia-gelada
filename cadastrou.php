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
		<section id="cadastrou">
			<h2>cadastro realizado com sucesso</h2>
			<div class="conteudo center">
				<h3 class="sub-titulo texto-center margem-media-baixo">
					Cadastro realizado com sucesso!
				</h3>
				<div class="botao-voltar center">
					<a href="contato.php">
						VOLTAR
					</a>
				</div>
			</div>
		</section>
		<?php
			require_once('modulos/footer.php');
			require_once('modulos/scripts.php');
		?>
    </body>
</html>