<?php

require_once('bd/conexao.php');
$conexao = conexaoMysql();
//matando as sessoes ao deslogar
if(isset($_GET['modo'])){
    if($_GET['modo'] == "logout"){
        session_start();
        session_destroy();
        unset( $_SESSION );
    }
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
        <section id="slider">
			<h2> Slider </h2>
            <div class="conteudo center">
                <!--slider-->
                <section id="corpo_slider">
					<h2> Corpo do Slider </h2>
                    <div class="slideshow" id="slideshow">
                        <div class="slide_selection">
                            <div class="selector" onclick="MudarSlide(0)"></div>
                            <div class="selector" onclick="MudarSlide(1)"></div>
                            <div class="selector" onclick="MudarSlide(2)"></div>
                            <div class="selector" onclick="MudarSlide(3)"></div>
                        </div>
                        <div class="slideshowarea">
                            
                            <div class="slide" style="background-image:url('img/floresta.jpg');">
                                <div class="slideinfo">
                                    <div class="slideinfo_titulo"></div>
                                </div>	
                            </div>


                            <div class="slide" style="background-image:url('img/cocacafe.jpg')">
                                <div class="slideinfo">
                                    <div class="slideinfo_titulo"></div>
                                </div>	
                            </div>


                            <div class="slide" style="background-image:url('img/mountain.png')">
                                <div class="slideinfo">
                                    <div class="slideinfo_titulo"></div>
                                </div>	
                            </div>


                            <div class="slide" style="background-image:url('img/redbull.jpg')">
                                <div class="slideinfo">
                                    <div class="slideinfo_titulo"></div>
                                </div>	
                            </div>
                            
                        </div>
                    </div>
                </section>
            </div>
        </section>
		<div class="decoracao">
			<div class="borda-dashed">
				<div class="separador center">
					<img src="icon/separador.png" alt="separador">
				</div>
			</div>
		</div>
        <section id="corpo">
			<h2> Conteudo Principal </h2>
			<div id="seta">
				<div class="icon-rede-social">
					<a href="http://facebook.com">
						<img src="icon/facebook2.png" alt="facebook">
					</a>
				</div>
				<div class="icon-rede-social">
					<a href="http://twitter.com">
						<img src="icon/twitter2.png" alt="twiter">
					</a>
				</div>
				<div class="icon-rede-social">
					<a href="http://instagram.com">
						<img src="icon/instagram2.png" alt="instagram">
					</a>
				</div>
			</div>
            <div class="conteudo center">
                <div class="menu_vertical">
                    <ul class="menu_vertical_caixa">


                        <?php

                            // $sql = "select categoria_sabor.*, categorias.nome as categoria, sabores.nome as sabor from categoria_sabor
                            // inner join categorias on categoria_sabor.id_categoria = categorias.id inner join
                            // sabores on categoria_sabor.id_sabor = sabores.id";

                            $sql = "select * from categorias";

                            $select = mysqli_query($conexao, $sql);

                            while($rsConsulta = mysqli_fetch_array($select)){
                                
                            
                        ?>
                        <a href="index.php?idcat=<?=$rsConsulta['id']?>">
                            <li class="menu_vertical_itens"> 
                                <?=$rsConsulta['nome']?>
                                    <img class="seta_direita" src="icon/arrow-right.png" alt="seta_direita">
                                    <ul class="sub_menu">
                                    
                                    <?php
                                        
                                        $sqlSabor = "select categoria_sabor.id_sabor, sabores.*
                                        from categoria_sabor inner join 
                                        sabores on categoria_sabor.id_sabor = sabores.id 
                                        where categoria_sabor.id_categoria = ".$rsConsulta['id'];

                                        $selectSabor = mysqli_query($conexao, $sqlSabor);

                                        while($rsConsultaSabor = mysqli_fetch_array($selectSabor)){

                                    ?> 
                                        <li class="sub_menu_itens">
                                            <?=$rsConsultaSabor['nome']?>
                                        </li>

                                    <?php
                                        }
                                    ?>
                                    </ul>
                                
                            </li>
                        </a>

                        <?php
                        
                            }
                        ?>




                        <!-- <li class="menu_vertical_itens"> ITEM 2
                            <img class="seta_direita" src="icon/arrow-right.png" alt="seta_direita">
                            <ul class="sub_menu">
                                <li class="sub_menu_itens">sub item</li>
                                <li class="sub_menu_itens">sub item</li>
                            </ul>
                        </li> -->
                    </ul>
                </div>
                <div class="produtos">

                    <?php

                    

                    if(isset($_GET['idcat'])){

                        $id_cat = $_GET['idcat'];

                        $sqlProduto = "select * from produtos where id_categoria = ".$id_cat;

                    }else{
                        $sqlProduto = "select * from produtos";
                    }
                    
                    

                    $select = mysqli_query($conexao, $sqlProduto);

                    while($rsConsultaProduto = mysqli_fetch_array($select)){

                    
                            
                    ?>

                    <div class="caixa_produto">
                        <div class="img_produto center">
                            <img src="cms/bd/arquivos/<?=$rsConsultaProduto['imagem']?>" alt="produto">
                        </div>
                        <div class="desc_produto">
                            <ul>
                                <li>Nome:<?=$rsConsultaProduto['nome']?></li>
                                <li>Descrição: <?=$rsConsultaProduto['descricao']?></li>
                                <li>
									Preço:
									<span class="preco">
									   R$<?=$rsConsultaProduto['preco']?>
									</span> 
									<span class="preco-antigo">
										
									</span>
									<span class="preco-novo">
										
									</span>
								</li>
                                <li class="detalhes">Detalhes</li>
                            </ul>
                        </div>
                    </div>
                    <?php
                    }
                    ?>




                    <!-- <div class="caixa_produto">
                        <div class="img_produto center">
                            <img src="img/suco_uva.jpg" alt="produto">
                        </div>
                        <div class="desc_produto">
                            <ul>
                                <li>Nome:Produto</li>
                                <li>Descrição: </li>
                                <li>
									Preço:
									<span class="preco">
									R$6,50 
									</span> 
									<span class="preco-antigo">
										
									</span>
									<span class="preco-novo">
										
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
                                <li>Nome:Produto</li>
                                <li>Descrição: Descrição deste produto</li>
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
                            <img src="img/energetico.jpg" alt="produto">
                        </div>
                        <div class="desc_produto">
                            <ul>
                                <li>Nome:Produto</li>
                                <li>Descrição: Descrição deste produto</li>
                                <li>
									Preço:
									<span class="preco">
									R$6,50 
									</span> 
									<span class="preco-antigo">
										
									</span>
									<span class="preco-novo">
										
									</span>
								</li>
                                <li class="detalhes">Detalhes</li>
                            </ul>
                        </div>
                    </div>
                    <div class="caixa_produto">
                        <div class="img_produto center">
                            <img src="img/sprite.jpg" alt="produto">
                        </div>
                        <div class="desc_produto">
                            <ul>
                                <li>Nome:Produto</li>
                                <li>Descrição: Descrição deste produto</li>
                                <li>
									Preço:
									<span class="preco">
									R$6,50 
									</span> 
									<span class="preco-antigo">
										
									</span>
									<span class="preco-novo">
										
									</span>
								</li>
                                <li class="detalhes">Detalhes</li>
                            </ul>
                        </div>
                    </div>
                    <div class="caixa_produto">
                        <div class="img_produto center">
                            <img src="img/suco_goiaba.jpg" alt="produto">
                        </div>
                        <div class="desc_produto">
                            <ul>
                                <li>Nome:Produto</li>
                                <li>Descrição: Descrição deste produto</li>
                                <li>
									Preço:
									<span class="preco">
									R$6,50 
									</span> 
									<span class="preco-antigo">
										
									</span>
									<span class="preco-novo">
										
									</span>
								</li>
                                <li class="detalhes">Detalhes</li>
                            </ul>
                        </div>
                    </div> -->
                </div>
            </div>
        </section>
        <?php
            require_once('modulos/footer.php');
            require_once('modulos/scripts.php');
		?>
    </body>
</html>










































