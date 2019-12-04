<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="css/cms-styles.css">
    <title>Delicia Gelada - CMS</title>
    <script src="./js/jquery.js"></script>
    <script>
        $(document).ready(function(){
            $('#upload-img').change(function(){
                const file = $(this)[0].files[0];
                const fileReader = new FileReader();
                fileReader.onloadend = function(){
                    $('#preview-img').attr('src',fileReader.result);
                }
                fileReader.readAsDataURL(file);
            });
        });
    </script>
</head>
    <body>
        <section id="cms">
            <div class="conteudo center">
                <?php 
                    require_once('./modulos/cms-header.php');
                ?>
                
                <div class="editar-sobre">

                    <h1 class="sub-titulo">
                        Editar conteudos da página SOBRE
                    </h1>

                    <div class="crud-editar-sobre">
                        <form action="./bd/editar-sobre.php" method="post" enctype="multipart/form-data">
                            <div class="formulario-sobre">
                                <div class="linha-formulario-sobre">
                                    <div class="coluna-formulario-sobre-nome-campo">
                                        TITULO
                                    </div>
                                    <div class="coluna-formulario-sobre">   
                                        <input type="text" name="txt-titulo" id="txt-titulo-sobre">
                                    </div>
                                </div>
                                <div class="linha-formulario-sobre-texto">
                                    <div class="coluna-formulario-sobre-nome-campo">
                                        TEXTO
                                    </div>
                                    <div class="coluna-formulario-sobre">
                                        <textarea name="txt-conteudo-sobre" id="txt-conteudo-sobre"></textarea>
                                    </div>
                                </div>
                                <div class="linha-formulario-sobre-img">
                                    <div class="coluna-formulario-sobre-nome-campo">
                                        IMAGEM
                                    </div>
                                    <div class="coluna-formulario-sobre">
                                        <label id="thumbnail" class="thumbnail">
                                                <input type="file" name="flefoto" id="upload-img">
                                                <img id="preview-img">
                                        </label>    
                                    </div>
                                </div>
                                <div class="linha-formulario-sobre-button">
                                    <div class="coluna-formulario-sobre-nome-campo">
                                        <input type="submit" value="EDITAR" name="btn-editar-conteudo" class="btn-editar-conteudo">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>










                    
                </div>

                <?php
                    require_once('./modulos/cms-footer.php');
                ?>
            </div>
        </section>
    </body>
</html>