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
            });
        </script>
        
        
    </head>
    <body>
        <section id="cms">
            <div class="conteudo-cms center">
                <?php 
                    require_once('./modulos/cms-header.php');
                ?>
                <div class="cadastro-categoria">
                    <form class="cadastrar-categoria" method="POST" action="bd/salvar-categoria.php" enctype="multipart/form-data">
                        <div class="linha-cadastro-categoria-h">
                            <h3>CADASTRE UMA CATEGORIA</h3>
                        </div>
                        <div class="linha-cadastro-categoria">
                            <h5>NOME</h5>
                            
                            <input type="text" name="txt-categoria" id="txt-categoria" required>
                            <button name="btn-categoria" type="submit">CADASTRAR</button>
                        </div>

                        <div class="linha-cadastro-categoria">
                            <h5>ICONE</h5>
                            
                            <input type="file" name="fleicone" id="fle-categoria" required>
                        </div>

                        <h5>SABORES</h5>
                        <div class="linha-cadastro-categoria-sabores texto-center">
                            
                            
                            <?php

                                $sql = "select * from sabores";
                                $select = mysqli_query($conexao,$sql);

                                while($rsConsulta = mysqli_fetch_array($select)){

                                

                            ?>
                            <div class="linha-sabores">
                                <img src="bd/arquivos/<?=$rsConsulta['icone']?>" alt="Sabor">
                                <input value="<?=$rsConsulta['id']?>" class="checkbox" type="checkbox" name="checklist[]"><?=$rsConsulta['nome']?>
                            </div>
                            <?php
                                }
                            
                            ?>
                            
                        </div>
                    </form>


                    <form class="cadastrar-categoria" method="POST" action="bd/salvar-sabor.php" enctype="multipart/form-data"> 
                        <div class="linha-cadastro-categoria-h">
                            <h3>CADASTRAR UM NOVO SABOR</h3>
                        </div>
                        <div class="linha-cadastro-categoria">
                            <h5>NOME</h5>
                            
                            <input type="text" name="txt-sabor" id="txt-sabor" required>
                            <button name="btn-sabor" type="submit">CADASTRAR</button>
                        </div>

                        <div class="linha-cadastro-categoria">
                            <h5>ICONE</h5>
                            
                            <input type="file" name="fleicone-sabor" id="fle-categoria" required>
                        </div>
                    </form>


                </div>
                
                <?php
                    require_once('./modulos/cms-footer.php');
                ?>
            </div>
            
        </section>
        <script src="js/viacep.js"></script>
        
    </body>
</html>