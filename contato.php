<!DOCTYPE html>
<html>
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
		<section id="contato">
			<div class="opacidadebg">
				<h2>
					formulario de contato
				</h2>
				<div class="conteudo center">
					<h1 class="titulo texto-center margem-media-baixo">
								contate nos
					</h1>
					<div class="caixa-contato center">
						<form method="post" action="contato.php" name="form-contato">
							<div class="itens-formulario">
								<div class="nome-campo">
									<h4 class="titulo-forumario center texto-center texto-branco">
										NOME:
									</h4>
								</div>
								<div class="campo">
									<input type="text" value="" name="txt-nome" class="label">
								</div>
							</div>
							<div class="itens-formulario">
								<div class="nome-campo">
									<h4 class="titulo-forumario center texto-center texto-branco">
										TELEFONE:
									</h4>
								</div>
								<div class="campo">
									<input type="text" value="" name="txt-telefone" class="label">
								</div>
							</div>
							<div class="itens-formulario">
								<div class="nome-campo">
									<h4 class="titulo-forumario center texto-center texto-branco">
										CELULAR
									</h4>
								</div>
								<div class="campo">
									<input type="text" value="" name="txt-nome" class="label">
								</div>
							</div>
							<div class="itens-formulario">
								<div class="nome-campo">
									<h4 class="titulo-forumario center texto-center texto-branco">
										HOME PAGE
									</h4>
								</div>
								<div class="campo">
									<input type="text" value="" name="txt-nome" class="label">
								</div>
							</div>
							<div class="itens-formulario">
								<div class="nome-campo">
									<h4 class="titulo-forumario center texto-center texto-branco">
										FACEBOOK
									</h4>
								</div>
								<div class="campo">
									<input type="text" value="" name="txt-nome" class="label">
								</div>
							</div>
							<div class="itens-formulario">
								<div class="nome-campo">
									<h4 class="titulo-forumario center texto-center texto-branco">
										CRITICAS/SUGESTÕES
									</h4>
								</div>
								<div class="campo">
									<input type="text" value="" name="txt-criticas" class="label">
								</div>
							</div>
							<div class="itens-formulario">
								<div class="nome-campo">
									<h4 class="titulo-forumario center texto-center texto-branco">
										MENSAGEM
									</h4>
								</div>
								<div class="campo-txt-area">
									<textarea class="mensagem-label" name="txt-mensagem" placeholder="Digite sua mensagem"></textarea>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
		<?php
			require_once('modulos/footer.php');
		?>
    </body>
</html>