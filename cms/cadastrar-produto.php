<?php
    require_once('bd/conexao.php');
    $conexao = conexaoMysql();
?>
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
                $('.categoria-produto').click(function(){
                    $('.categoria-produto').css({
                        border:'0',
                    });
                    $(this).css({
                        border:'solid 1px #000',
                    });
                });
                $('.sabor-produto-lab').click(function(){
                    $('.sabor-produto-lab').css({
                        border:'0',
                    });
                    $(this).css({
                        border:'solid 1px #000',
                    });
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
                <form class="cadastro-produtos-cadastrar" method="POST" action="bd/salvar-produto.php" enctype="multipart/form-data">
                    <div class="informacoes-produtos">

                        <div class="linha-cadastro-produto">
                            <h5>Nome do produto</h5>
                            <input type="text" name="txt-produto" id="nome-produto">
                        </div>

                        <div class="linha-cadastro-produto">
                            <h5>Preço</h5>
                            <input type="text" name="txt-preco" id="preco-produto">R$
                        </div>

                        <div class="linha-cadastro-produto-desc">
                            <h5>Descrição</h5>
                            <textarea name="txt-desc-produto" id="txt-descricao-produto"></textarea>
                        </div>

                        <div class="linha-cadastro-produto-categoria">
                            <h5>CATEGORIA</h5>
                            <select name="slt-categoria" id="slt-categoria">
                                <option value="">selecione</option>

                                <?php
                                $sql = "select * from categorias";

                                $select = mysqli_query($conexao, $sql);

                                while($rsConsulta = mysqli_fetch_array($select)){
                                
                                ?>
                                <option value="<?=$rsConsulta['id']?>"> <?=$rsConsulta['nome']?> </option>
                                <?php
                                }
                                ?>
                            </select>


                        </div>


                       
                        <div class="linha-cadastro-produto-sabor">
                            <h5>SABOR</h5>
                            <select name="slt-sabor" id="slt-sabor">

        
                            </select>
                        </div>
                        



                        <div class="linha-cadastro-botao">
                            <input value="CADASTRAR" type="submit" name="btn-cadastro-produto" class="botao">
                        </div>
                        
                    </div>
                    <div class="upload-imagem-produtos">
                        <h5>FOTO DO PRODUTO</h5>
                        <label id="thumbnail-produto" class="thumbnail">
                            <input type="file" name="flefoto" id="img-upload-produtos">
                            
                            <img src="icon/photo.png"  alt="img" id="preview-produtos"> 
                        </label>
                    </div>
                </form>
                
                <?php
                    require_once('./modulos/cms-footer.php');
                ?>
            </div>
            
        </section>
        <script>
            $('#slt-categoria').on("change", function(){
                var idCategoria = $('#slt-categoria').val();

                $.ajax({
                    url:'bd/selecionar-sabor.php',
                    type:'POST',
                    data:{id:idCategoria},
                    beforeSend: function(){
                        $('#slt-sabor').css({display:'block'});
                        $('#slt-sabor').html("Carregando...");
                    },
                    success: function(data){
                        $('#slt-sabor').css({display:'block'});
                        $('#slt-sabor').html(data);
                    },
                    error: function(data){
                        $('#slt-sabor').css({display:'block'});
                        $('#slt-sabor').html("Houve um erro ao carregar");
                    }
                });
            });
        </script>
        
    </body>
</html>