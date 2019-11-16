
<!DOCTYPE html>
<html lang="pt">
    <head>
        <title>
            Delicia Gelada - CMS
        </title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="./css/cms-styles.css">
        <?php
			require_once('../modulos/icon.php');
		?>
    </head>
    <body>
        <section id="cms">
            <div class="conteudo center">
                <?php
                    require_once('./modulos/cms-header.php');
                ?>


                <div class="cms-estrutura">
                    <div class="cms-conteudo">
                        <div class="cms-conteudo-itens">
                            <a href="adm-conteudo-sobre.php">
                                <img src="./icon/info.png">
                                <h4 class="titulo4 float-left">PAGINA SOBRE</h4>
                            </a>
                        </div>
                        <div class="cms-conteudo-itens">
                            <a href="adm-conteudo-lojas.php">
                                <img src="../icon/icon-local2.png">
                                <h4 class="titulo4 float-left">PAGINA LOJAS</h4>
                            </a> 
                        </div>
                        <div class="cms-conteudo-itens"> 
                            <a href="adm-conteudo-curiosidades.php">
                                <img src="icon/online-question.png">
                                <h4 class="titulo4 float-left">PAGINA CURIOSIDADES</h4>
                            </a>
                        </div>
                         <div class="cms-conteudo-itens">
                            <img src="../icon/home.png">
                            <h4 class="titulo4 float-left">home</h4>
                        </div>
                        <div class="cms-conteudo-itens">
                            <img src="../icon/home.png">
                            <h4 class="titulo4 float-left">home</h4>
                        </div>
                        <div class="cms-conteudo-itens">
                            <img src="../icon/home.png">
                            <h4 class="titulo4 float-left">home</h4>
                        </div>
                        <div class="cms-conteudo-itens">
                            <img src="../icon/home.png">
                            <h4 class="titulo4 float-left">home</h4>
                        </div>
                    </div>
                </div>


                <?php
                    require_once('./modulos/cms-footer.php');
                ?>
            </div>
        </section> 
    </body>
</html>