<?php
	require_once('bd/conexao.php');
	$conexao = conexaoMysql();

	if(isset($_POST['btnFiltro'])){

		$uf = $_POST['opEstado'];

		$selectNormal = "select * from pagina_lojas where estado = '".$uf."'";
		
		mysqli_query($conexao, $selectNormal);

	}
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
                <form action="lojas.php" method="POST">    
                    <select name="opEstado" id="seletor_estado">
						<option value ="">Todos</option>
						<?php
							
							$sql = "select * from estados";
							$select = mysqli_query($conexao, $sql);

							while($rsEstados = mysqli_fetch_array($select)){							
						?>
						<option value ="<?=$rsEstados['uf']?>" ><?=$rsEstados['nome']?></option>
						<?php
							}
						?>
                    </select>
                    
                    <button type="submit" class="img" name="btnFiltro" value="botao">

					</button>
				</form>    
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
				<?php
				require_once('bd/conexao.php');
				$conexao = conexaoMysql();

				if(isset($_POST['btnFiltro'])){

					$uf = $_POST['opEstado'];

					if($uf != "")
						$sql = "select * from pagina_lojas where estado = '".$uf."' and ativado = 1";
					else
						$sql = "select * from pagina_lojas where ativado = 1";
				}else{

					$sql = "select * from pagina_lojas where ativado = 1";

				}
				$select = mysqli_query($conexao, $sql);

				while($rsConsulta = mysqli_fetch_array($select))
				{
				?>
                <div class="caixa_lojas">
					<div class="icone-localizar"></div>
					<div class="linha-vertical"></div>
					<div class="titulo-loja">
						<?=$rsConsulta['nome']?>
					</div>
					<div class="endereco-lojas">
						<div><?=$rsConsulta['logradouro']?>, <?=$rsConsulta['numero']?></div>
						<div><?=$rsConsulta['estado']?></div>
						<div><?=$rsConsulta['bairro']?>,	<?=$rsConsulta['cidade']?></div>
						<div>CEP: <?=$rsConsulta['cep']?></div>
					</div>
					<div class="botao texto-center">
						<a class="texto-branco" href="<?=$rsConsulta['link']?>" target="_blank">
						VER NO MAPA
						</a>	
					</div>
				</div>

				<?php
				}
				?>
            </div>
        </section>
		<?php
			require_once('modulos/footer.php');
			require_once('modulos/scripts.php');
		?>
    </body>
</html>