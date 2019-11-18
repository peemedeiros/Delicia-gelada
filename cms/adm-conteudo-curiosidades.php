<?php
    //Conexao com o banco
    require_once('bd/conexao.php');
    $conexao = conexaoMysql();

    if (session_status() != PHP_SESSION_ACTIVE) {//Verificar se a sessão não já está aberta.
        session_start();
    }

    //Declaração de variaveis
    $botao = (String) "CADASTRAR";
    $titulo = (String) "";
    $texto = (String) "";
    $foto = (String) "";
    $ativo = (String) "switch_on.png";
    $desativo = (String) "switch_off.png";
    $estado = (String)"";
    
    //Verificação para entrar no modo de edição
    if(isset($_GET['modo'])){
        if($_GET['modo'] == "editar"){

            $id = $_GET['id'];
            //variavel de sessao que será utilizada para o update no arquivo salvar-curiosidades.php
            $_SESSION['id'] = $id;

            $sql = "select * from pagina_curiosidades where id=".$id;

            $select = mysqli_query($conexao, $sql);

            //carregando as variáveis com as informações do registro selecionada para ser editado
            if($rsEditar = mysqli_fetch_array($select)){
                $titulo = $rsEditar['titulo'];
                $texto = $rsEditar['texto'];
                $foto = $rsEditar['background'];
                $botao = "EDITAR";
            }
            //verificação para o modo de ativar e desativar
        }elseif($_GET['modo'] == "status"){

            $id = $_GET['id'];
            $status = $_GET['ativado'];

            if($status == 1){
                $status = 0;
            }elseif($status == 0){
                $status = 1;
            }

            $sql = "update pagina_curiosidades set ativado = ".$status." where id =".$id;

            if(mysqli_query($conexao, $sql)){
                header('location: adm-conteudo-curiosidades.php');
            }
            
        }
    }
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
        <script src="./js/jquery.js"></script>
        <script>

            //Jquery para enxergar um PREVIEW da imagem selecionada para ser "uploadada".
            $(document).ready(function(){
                //aplica um evento de mudança quando a imagem é selecionada.
                $('#img-upload-curiosidades').change(function(){
                    //retornando um objeto com varios atributos, o 'files' é o atributo em que se encontra o arquivo selecionado
                    const file =$(this)[0].files[0];
                    console.log(file);
                    //ira executar a leitura do arquivo selecionado
                    const fileReader = new FileReader();
                    //aplicará a function de adicionar um atributo SRC na tag IMG com o retorno da função readAsDataURL()
                    fileReader.onloadend = function(){
                        $('.preview-img-curiosidades').attr('src',fileReader.result);
                    }
                    //lê o arquivo do tipo FILE e converte para uma URL
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
                <div class="curiosidades">
                    <div class="adm-pagina-curiosidades">
                        <form action="bd/salvar-curiosidades.php" method="post" enctype="multipart/form-data">
                            <div class="formulario-curiosidades">
                                <h2>
                                    Insira uma nova curiosidade
                                </h2>
                                <div class="linha-curiosidades">
                                    <h3>Titulo</h3>
                                    <input type="text" name="txt-curiosidades" id="txtCuriosidades" value="<?=$titulo?>" required>
                                </div>
                                <div class="linha-curiosidades-texto">
                                    <h3>
                                        Curiosidade
                                    </h3>
                                    <textarea name="conteudo-curiosidades" id="txt-conteudo-curiosidades" required><?=$titulo?></textarea>
                                </div>
                                
                                <label id="thumbnail-curiosidades" class="thumbnail">
                                    <input type="file" name="flefoto" id="img-upload-curiosidades">
                                    <?php

                                        //Uma verificação para adicionar a TAG IMG de acordo com o modo da pagina
                                            //verifica e coloca a imagem cadastrada no banco no modo editar
                                            //adiciona uma imagem padrão por fins de validação no W3C quando não há imagem no registo, 
                                            //essa imagem padrao não é cadastrada se uma imagem não for selecionada
                                        if(isset($_GET['modo'])){

                                            if($_GET['modo'] == "editar"){

                                                if($_GET['background'] == ""){
                                    ?>
                                        <img class="preview-img-curiosidades" src="icon/blue-bg.jpg" alt="img">
                                    <?php
                                                }else{
                                    ?>
                                        <img class="preview-img-curiosidades" src="bd/arquivos/<?=$foto?>" alt="img">
                                    <?php   
                                                }
                                            }
                                        }else{
                                    ?>
                                        <img class="preview-img-curiosidades" src="icon/blue-bg.jpg" alt="img">
                                    <?php
                                        }
                                    ?>
                                </label> 
                            </div>
                            <input type="submit" name="btn-curiosidades" value="<?=$botao?>" class="botao">
                        </form>


                        <div class="curiosidades-cadastradas">
                            <div class="pagina-curiosidades">
                                <div class="header-layout texto-branco">NAV BAR</div>

                                <?php

                                //realizando uma consuta na tabela pagina_curiosidades no banco, trazendo todos os registros criados
                                $contadora = (int) 1;
                                $sql="select * from pagina_curiosidades";
                                
                                $select = mysqli_query($conexao, $sql);
                                
                                //adicionando cada registro criado na tabela de visualização
                                while($rsConsulta = mysqli_fetch_array($select)){
                                
                                //muda o icone de ativado para desativado de acordo com estado do registro
                                    if($rsConsulta['ativado'] == 1){
                                        $estado = $ativo;
                                    }elseif($rsConsulta['ativado'] == 0){
                                        $estado = $desativo;
                                    }
                                
                                // verifica se no registro há uma imagem, se não houver adiciona um layout sem background e centralizado
                                    if($rsConsulta["background"] != ""){
                                        $contadora += 1;
                                        if($contadora % 2 == 0){
                                            

                                        
                                ?>
                                <div class="conteudo-curiosidades">
                                <div class="editar-curiosidades">
                                    <a href="adm-conteudo-curiosidades.php?modo=editar&id=<?=$rsConsulta['id']?>&background=<?=$rsConsulta['background']?>">
                                        EDITAR
                                    </a>
                                </div>
                                    <div class="container-curiosidades">

                                    
                                        <div class="titulo-curiosidades">

                                        </div>
                                        <div class="texto-curiosidades-2"></div>
                                        <div class="texto-curiosidades-2"></div>
                                        <div class="texto-curiosidades-2"></div>
                                        <div class="texto-curiosidades-2"></div>
                                        <div class="texto-curiosidades-2"></div>
                                        <div class="texto-curiosidades-2"></div>
                                    </div>
                                </div>
                                <div class="opcoes-curiosidades">
                                    <a href="bd/delete-curiosidades.php?modo=deletar&id=<?=$rsConsulta['id']?>&background=<?=$rsConsulta['background']?>">
                                        <img src="icon/cancel.png" alt="cancel">
                                    </a>
                                    <a href="adm-conteudo-curiosidades.php?modo=status&id=<?=$rsConsulta['id']?>&ativado=<?=$rsConsulta['ativado']?>">
                                        <img src="icon/<?=$estado?>" alt="switch">
                                    </a>
                                </div>
                                <div class="decoration texto-branco"> SEPARADOR </div>
                                


                               

                                <?php
                                // verifica se no registro há uma imagem, se houver adiciona um layout com background e centralizado, alterando o posicionamento dos textos de acordo com a variavel $contadora
                                        }else{
                                            

                                ?>
                                <div class="conteudo-curiosidades">
                                <div class="editar-curiosidades">
                                    <a href="adm-conteudo-curiosidades.php?modo=editar&id=<?=$rsConsulta['id']?>&background=<?=$rsConsulta['background']?>">
                                        EDITAR
                                    </a>
                                </div>
                                    <div class="container-curiosidades-2">
                                        <div class="titulo-curiosidades">

                                        </div>
                                        <div class="texto-curiosidades-2"></div>
                                        <div class="texto-curiosidades-2"></div>
                                        <div class="texto-curiosidades-2"></div>
                                        <div class="texto-curiosidades-2"></div>
                                        <div class="texto-curiosidades-2"></div>
                                        <div class="texto-curiosidades-2"></div>
                                    </div>
                                </div>
                                <div class="opcoes-curiosidades">
                                    <a href="bd/delete-curiosidades.php?modo=deletar&id=<?=$rsConsulta['id']?>&background=<?=$rsConsulta['background']?>">
                                        <img src="icon/cancel.png" alt="cancel">
                                    </a>
                                    <a href="adm-conteudo-curiosidades.php?modo=status&id=<?=$rsConsulta['id']?>&ativado=<?=$rsConsulta['ativado']?>">
                                        <img src="icon/<?=$estado?>" alt="switch">
                                    </a>
                                </div>
                                <div class="decoration texto-branco"> SEPARADOR </div>
                                <?php

                                        }
                                        // verifica se no registro há uma imagem, se houver adiciona um layout com background e centralizado, alterando o posicionamento dos textos de acordo com a variavel $contadora
                                    }else{
                                
                                ?>
                                    <div class="conteudo-curiosidades">
                                        <div class="editar-curiosidades">
                                            <a href="adm-conteudo-curiosidades.php?modo=editar&id=<?=$rsConsulta['id']?>&background=<?=$rsConsulta['background']?>">
                                                EDITAR
                                            </a>
                                        </div>
                                        <div class="titulo-curiosidades">

                                        </div>
                                        <div class="texto-curiosidades"></div>
                                        <div class="texto-curiosidades"></div>
                                        <div class="texto-curiosidades"></div>
                                        <div class="texto-curiosidades"></div>
                                        <div class="texto-curiosidades"></div>
                                        <div class="texto-curiosidades"></div>
                                    </div>
                                    <div class="opcoes-curiosidades">
                                        <a href="bd/delete-curiosidades.php?modo=deletar&id=<?=$rsConsulta['id']?>&background=<?=$rsConsulta['background']?>">
                                            <img src="icon/cancel.png" alt="cancel">
                                        </a>
                                        <a href="adm-conteudo-curiosidades.php?modo=status&id=<?=$rsConsulta['id']?>&ativado=<?=$rsConsulta['ativado']?>">
                                            <img src="icon/<?=$estado?>" alt="switch">
                                        </a>
                                    </div>

                                    <div class="decoration texto-branco"> SEPARADOR </div>

                                <?php
                                    }
                                }
                        
                                ?>        
                            </div>
                            
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