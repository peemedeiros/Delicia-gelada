<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="css/cms-styles.css">
        <title>Delicia Gelada - CMS</title>
        <script src="js/jquery.js"></script>
        <script src="../js/modulo.js"></script>
    </head>
    <body>
        <section id="cms">
            <div class="conteudo-cms center">
                <?php 
                    require_once('./modulos/cms-header.php');
                ?>
                <div class="cadastro-produtos">
                    <h1 class="titulo texto-center">
                        Cadastro de produto
                    </h1>
                    <div class="opcoes-produtos">
                        <div class="opcoes-produtos-item">
                            <a href="cadastrar-produto.php">
                                <img src="icon/add-box.png" alt="adicionar produtos">
                                <div class="legenda-produtos">
                                    Adicionar produto
                                </div>
                            </a>
                        </div>
                        <div class="opcoes-produtos-item">
                            <a href="#">
                                <img src="icon/visu-box.png" alt="adicionar produtos">
                                <div class="legenda-produtos">
                                    Visualizar produtos
                                </div>
                            </a>
                        </div>
                        <div class="opcoes-produtos-item">
                            <a href="cadastrar-categoria.php">
                                <img src="icon/conf-box.png" alt="adicionar produtos">
                                <div class="legenda-produtos">
                                    Configuração
                                </div>
                            </a>
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




                            <!-- <label id="thumbnail-produto" class="thumbnail">
                                <input type="file" name="flefoto" id="img-upload-produtos">
                                
                                <img src="icon/photo.png"  alt="img" id="preview-produtos"> 
                            </label> -->