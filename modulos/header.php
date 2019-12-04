
<header id="cabecalho">
	<div class="conteudo-header center">                
		<div class="logo">
			<img src="icon/logo-main.png" alt="logo"> 
		</div>
		<nav id="navgation">
			<div id="menu-mobile">
				<img src="icon/menu.png" alt="menu-mobile">
			</div>
			<div id="menu-para-celular">
				<ul class="caixa-menu-celular">
					
					<li class="item-menu-celular">
						<a href="index.php">
							HOME
						</a>
					</li>
					<li class="item-menu-celular">
						<a href="sobre.php">
							SOBRE
						</a>
					</li>
					<li class="item-menu-celular">
						<a href="curiosidades.php">
							CURIOSIDADES
						</a>
					</li>
					<li class="item-menu-celular">
						<a href="lojas.php">
							LOJAS
						</a>
					</li>
					<li class="item-menu-celular">
						<a href="promocoes.php">
							PROMOÇÕES
						</a>
					</li>
					<li class="item-menu-celular">
						<a href="destaque.php">
							DESTAQUE DO MÊS
						</a>
					</li>
					<li class="item-menu-celular">
						<a href="contato.php">
							CONTATO
						</a>
					</li>
					<li class="item-menu-celular">
						<a href="index.php">
							LOGIN
						</a>
					</li>
				</ul>	
			</div>
			<ul class="menu">
				<li class="menu_itens">
					<a href="index.php">
						HOME
					</a>
				</li>
				<li class="menu_itens">
					<a href="sobre.php">
						SOBRE
                        <img src="icon/arrow-down.png" alt="seta">
					</a>
					<ul class="menu-dropdown">
						<li class="menu-dropdown-itens">
							<a href="curiosidades.php">
								CURIOSIDADES
							</a>
						</li>
						<li class="menu-dropdown-itens">
							<a href="lojas.php">
								LOJAS
							</a>
						</li>
					</ul>
				</li>
				<li class="menu_itens">
					<a href="promocoes.php">
						PROMOÇÕES
                        <img src="icon/arrow-down.png" alt="seta">
					</a>
					<ul class="menu-dropdown">
						<li class="menu-dropdown-itens">
							<a href="destaque.php">
								DESTAQUES DO MÊS
							</a>
						</li>
					</ul>
				</li>
				<li class="menu_itens">
					<a href="contato.php">
						CONTATO
					</a>
				</li>
			</ul>
			
		</nav>
		<form class="login" action="bd/autenticacao.php" method="post">
			<div class="usuario">
				USUARIO:
				<input type="email" name="txtUsuario" placeholder="exemple@exemple.com" id="caixaUsuario">
			</div>
			<div class="senha">
				SENHA:
				<input type="password" name="txtSenha" placeholder="********" id="caixaSenha">
			</div>
			<div class="caixaBotao">
				<input type="submit" name="btnLogin" class="botaoLogin" value="OK">
			</div>
		</form>
		
	</div>
</header>
<div class="estrutura-auxiliar">

</div>