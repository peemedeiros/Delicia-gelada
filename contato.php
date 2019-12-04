<?php
	require_once('bd/conexao.php');
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
		<section id="contato">
			<div class="opacidadebg">
				<h2>
					formulario de contato
				</h2>
				<div class="conteudo center">
					<h1 class="titulo texto-center margem-pequena-baixo">
								contate nos
					</h1>
					<div class="caixa-contato center">
						<form method="post" action="bd/inserir.php" name="form-contato">
							<div class="itens-formulario">
								<div class="nome-campo">
									<h4 class="titulo-forumario center texto-center texto-branco">
										* NOME:
									</h4>
								</div>
								<div class="campo">
									<input type="text" value="" name="txt-nome" class="label" onkeypress="return mascaraUf(this,event);" maxlength="2" required>
								</div>
							</div>
							<div class="itens-formulario">
								<div class="nome-campo">
									<h4 class="titulo-forumario center texto-center texto-branco">
										TELEFONE:
									</h4>
								</div>
								<div class="campo">
									<input type="text" value="" name="txt-telefone" class="label"
									onkeypress="return mascaraFone(this,event);" id="campo-telefone">
								</div>
							</div>
							<div class="itens-formulario">
								<div class="nome-campo">
									<h4 class="titulo-forumario center texto-center texto-branco">
										* CELULAR
									</h4>
								</div>
								<div class="campo">
									<input type="text" value="" name="txt-celular" class="label" onkeypress="return mascaraFone(this,event);" id="campo-celular" required placeholder="(0xx)94002-8922">
								</div>
							</div>
							<div class="itens-formulario">
								<div class="nome-campo">
									<h4 class="titulo-forumario center texto-center texto-branco">
										* EMAIL:
									</h4>
								</div>
								<div class="campo">
									<input type="email" value="" name="txt-email" class="label" maxlength="100" required>
								</div>
							</div>
							<div class="itens-formulario">
								<div class="nome-campo">
									<h4 class="titulo-forumario center texto-center texto-branco">
										HOME PAGE
									</h4>
								</div>
								<div class="campo">
									<input type="url" value="" name="txt-page" class="label" maxlength="2048" placeholder="http://">
								</div>
							</div>
							<div class="itens-formulario">
								<div class="nome-campo">
									<h4 class="titulo-forumario center texto-center texto-branco">
										FACEBOOK
									</h4>
								</div>
								<div class="campo">
									<input type="url" value="" name="txt-facebook" class="label" maxlength="2048" placeholder="facebook.com/user">
								</div>
							</div>
							<div class="itens-formulario">
								<div class="nome-campo">
									<h4 class="titulo-forumario center texto-center texto-branco">
										CRITICAS/SUGESTÕES
									</h4>
								</div>
								<div class="campo texto">
									Criticas:
									<input type="radio" value="C" name="rdo-tipo">
									Sugestões:
									<input type="radio" value="S" name="rdo-tipo">
								</div>
							</div>
							<div class="itens-formulario">
								<div class="nome-campo">
									<h4 class="titulo-forumario center texto-center texto-branco">
										* MENSAGEM
									</h4>
								</div>
								<div class="campo-txt-area">
									<textarea class="mensagem-label" name="txt-mensagem" placeholder="Digite sua mensagem" maxlength="500" required></textarea>
								</div>
							</div>
							<div class="itens-formulario">
								<div class="nome-campo">
									<h4 class="titulo-forumario center texto-center texto-branco">
										* SEXO
									</h4>
								</div>
								<div class="campo texto">
									Masculino:
									<input type="radio" value="M" name="rdoSexo" required>
									Feminino:
									<input type="radio" value="F" name="rdoSexo" required>
								</div>
							</div>
							<div class="itens-formulario margem-pequena-baixo">
								<div class="nome-campo">
									<h4 class="titulo-forumario center texto-center texto-branco">
										* PROFISSÃO
									</h4>
								</div>
								<div class="campo">
									<input type="text" value="" name="txt-profissao" class="label"
										   onkeypress="return validarEntrada(event,'numeric');" maxlength="100" required>
									Os itens marcados com (*) são obrigatórios.
								</div>
							</div>
							<div class="itens-formulario-btn">
								<input type="submit" value="ENVIAR" name="btn-enviar" class="botao">
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
		<?php
			require_once('modulos/footer.php');
			require_once('modulos/scripts.php');
		?>
		<script src="js/modulo.js"></script>
    </body>
</html>