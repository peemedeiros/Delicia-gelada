<?php
require_once('bd/conexao.php');
$conexao = conexaoMysql();

if(isset($_GET['id'])){

    $id = $_GET['id'];

    // $sql = "select * from produtos where id = ".$id;

    $sql = "select produtos.*, categorias.nome as categoria, sabores.nome as sabor, categorias.id as idcat from produtos inner join 
    categorias on produtos.id_categoria = categorias.id inner join 
    sabores on produtos.id_sabor = sabores.id where produtos.id = ".$id;

    $select = mysqli_query($conexao, $sql);

    $rsConsulta = mysqli_fetch_array($select);

    
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
        <div id="produto">
            <div class="conteudo center">
                <div class="foto-produto">
                    <div class="social">
                        <div>
                            <img src="icon/share.png" alt="share">
                        </div>
                        <div>
                            <img src="icon/star1.png" alt="share">
                        </div>
                    </div>
                    <div class="imagem-produto">
                        <img src="cms/bd/arquivos/<?=$rsConsulta['imagem']?>" alt="foto">
                    </div>
                </div>

                <div class="informacoes-produto">
                    <div class="tag-cat">
                        <div class="linha-categoria">
                            <?=$rsConsulta['categoria']?>
                        </div>

                        <div class="linha-categoria">
                            <?=$rsConsulta['sabor']?>
                        </div>

                        

                    </div>
                    <h1>
                        <?=$rsConsulta['nome']?>
                    </h1>
                    <div class="buy">
                        <div class="preco">
                            <h1>R$<?=$rsConsulta['preco']?></h1>
                        </div>
                        <button class="comprar">
                            <img src="icon/shopping-cart.png" alt="buy">
                            COMPRAR
                        </button>
                    </div>
                    <div class="descricao-produto">
                        <h2>Descrição:</h2>
                        <p>
                            <?=$rsConsulta['descricao']?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div id="produtos-relacionados">
            <div class="conteudo center">
                <h4>PRODUTOS RELACIONADOS</h4>
                <?php
            
                    $sql = "select * from produtos where id_categoria =".$rsConsulta['idcat']." and id not in (select id from produtos where id = ".$id.");";

                    $select = mysqli_query($conexao, $sql);

                
                    while($rsProdutos = mysqli_fetch_array($select)){
                ?>
                <div class="caixa-relacionado">
                    <a href="produto.php?id=<?=$rsProdutos['id']?>">
                        <img src="cms/bd/arquivos/<?=$rsProdutos['imagem']?>" alt="produtos">
                    </a>
                    <div class="nome-produto">
                        <?=$rsProdutos['nome']?>
                    </div>

                    <div class="preco-produto">
                        R$<?=$rsProdutos['preco']?>   
                    </div>
                </div>
                <?php

                    }
                
                ?>
            </div>
        </div>
        <?php
            require_once('modulos/footer.php');
		?>
    </body>
</html>