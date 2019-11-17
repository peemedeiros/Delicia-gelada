<?php
    session_start();
    session_destroy();
    unset( $_SESSION );
?>
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
                        <li class="menu_vertical_itens"> ITEM 1
                            <img class="seta_direita" src="icon/arrow-right.png" alt="seta_direita">
                            <ul class="sub_menu">
                                <li class="sub_menu_itens">sub item</li>
                            </ul>
                        </li>
                        <li class="menu_vertical_itens"> ITEM 2
                            <img class="seta_direita" src="icon/arrow-right.png" alt="seta_direita">
                            <ul class="sub_menu">
                                <li class="sub_menu_itens">sub item</li>
                                <li class="sub_menu_itens">sub item</li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="produtos">
                    <div class="caixa_produto">
                        <div class="img_produto center">
                            <img src="img/suco_laranja.jpg" alt="produto">
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
                    </div>
                </div>
            </div>
        </section>
        <?php
			require_once('modulos/footer.php');
		?>
		<script src="js/jquery.js"></script>
		<script src="js/scroll.js"></script>
        <script src="js/slider.js"></script>
        <script src="js/menu.js"></script>
    </body>
</html>










































