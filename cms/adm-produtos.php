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
        <script>
        //Jquery para enxergar um PREVIEW da imagem selecionada para ser "uploadada".
            $(document).ready(function(){
                //aplica um evento de mudança quando a imagem é selecionada.
                $('#img-upload-produtos').change(function(){
                    const file = $(this)[0].files[0];
                    const fileReader = new FileReader();
                    //aplicará a function de adicionar um atributo SRC na tag IMG com o retorno da função readAsDataURL()
                    fileReader.onloadend = function(){
                        $('#preview-produtos').attr('src',fileReader.result);
                        $('#preview-produtos').css({
                            visibility:'visible'
                        });
                        
                    }
                    //lê o arquivo do tipo FILE e converte para uma URL
                    fileReader.readAsDataURL(file);
                });
            });
        </script>
        
        
    </head>
    <body>
        <section id="cms">
            <div class="conteudo-cms center">
                <?php 
                    require_once('./modulos/cms-header.php');
                ?>
                <div class="lojas">
                    <form action="bd/salvar-lojas.php" name="frm-lojas" method="POST">    
                        <div class="formulario-cadastro-produtos">
                
                            <label id="thumbnail-produto" class="thumbnail">
                                <input type="file" name="flefoto" id="img-upload-produtos">
                                
                                <img src="icon/photo.png"  alt="img" id="preview-produtos"> 
                            </label>
                            <h5>PRODUTO</h5>
                            <input value="" type="text" name="txt-loja" id="txtproduto" required >

                            <div class="produtos-form">
                                <div class="campo-produtos-form">
                                    <h5>PREÇO</h5>
                                    
                                    <input value="" type="text" name="txt-cep" id="preco" required>R$
                                </div>

                                <div class="campo-produtos-form">
                                    <h5>SUB CATEGORIA</h5>
                                    <select name="categoria" id="sltcategoria">
                                        <option value="">selecione uma sub-categoria</option>
                                    </select>
                                </div>
                                

                                <div class="campo-produtos-form-categorias">
                                    <h5>DETALHES</h5>
                                    <textarea value="" type="url" name="url-maps" id="txtdetalhes" required></textarea>
                                </div>

                                <div class="btn-lojas">
                                    <input type="submit" value="CADASTRAR" class="botao" name="btn-lojas">
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="lojas-layout">
                        <div class="header-layout texto-branco"> NAV BAR</div>

                        
                        <div class="lojas-cards-layout">
                            <h5>PRODUTO</h5>
                            <div class="produtos-content-layout">
                                <img src="../img/guarana-antartica.png" alt="">
                            </div>
                            <div class="opcoes-lojas">
                                <a href="">
                                    <img src="icon/switch_on.png" alt="ativar">
                                </a>
                                <a href="">
                                    <img src="icon/cancel.png" alt="delete">
                                </a>
                            </div>
                            <div class="editar-lojas-layout">
                                <a href="">
                                    <h3>EDITAR</h3>
                                </a>
                            </div>
                        </div>
                       

                    </div>
                </div>

                <?php
                    require_once('./modulos/cms-footer.php');
                ?>
            </div>
        </section>
        <script src="js/viacep.js"></script>
        
    </body>
</html>