<?php
//declaração de variaveis
$texto = (String) "";
$titulo = (String) "";
$imagem = (String) "";
$botao = (String) "INSERIR";
$ativo = (String) "switch_on.png";
$desativo = (String) "switch_off.png";

//verifica se há a variavel modo na url
    if(isset($_GET['modo'])){
        if($_GET['modo'] == 'editar'){

            // starta a sessão
            session_start();

            //conexao com o banco
            require_once('bd/conexao.php');
            $conexao = conexaoMysql();

            $id= $_GET['id'];
            //variavel de sessão que será utilizada no update do arquivo editar-sobre.php
            $_SESSION['id'] = $id;

            //estado do botao sendo mudado para acessar a query de update
            $botao = "EDITAR";

            //query para trazer os dados do registro que fora selecionado para editar
            $sql = "select pagina_sobre.* from pagina_sobre where id=".$id;

            $select = mysqli_query($conexao, $sql);

            if($rsEditar = mysqli_fetch_array($select)){
                

                $titulo = $rsEditar['titulo'];
                $texto = $rsEditar['texto'];
                $imagem = $rsEditar['imagem'];
            
            }
            //entra no modo de ativar e desativar
        }elseif($_GET['modo']=='status'){
            require_once('bd/conexao.php');
            $conexao = conexaoMysql();

            $id = $_GET['id'];
            $status = $_GET['status'];

            if($status == 1){
                $status = 0;
            }elseif($status == 0){
                $status = 1;
            }
            
            //query para mudar o estado do registro
            $sql = "update pagina_sobre set ativado = ".$status." where id =".$id;

            if(mysqli_query($conexao, $sql)){
                header('location: adm-conteudo-sobre.php');
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
            $('#upload-img').change(function(){
                //retornando um objeto com varios atributos, o 'files' é o atributo em que se encontra o arquivo selecionado
                const file =$(this)[0].files[0];
                //ira executar a leitura do arquivo selecionado
                console.log(file);
                
                const fileReader = new FileReader();
                //aplicará a function de adicionar um atributo SRC na tag IMG com o retorno da função readAsDataURL()
                fileReader.onloadend = function(){
                    $('#preview-img').attr('src',fileReader.result);
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
                <div class="editar-sobre">
                    <div class="crud-editar-sobre">
                        <form action="./bd/editar-sobre.php" method="post" enctype="multipart/form-data">
                            <div class="formulario-sobre">
                                <div class="linha-formulario-sobre">
                                    TITULO
                                    <input type="text" name="txt-titulo" id="txt-titulo-sobre" value="<?=$titulo?>" required>
                                    TEXTO
                                    <textarea name="txt-conteudo-sobre" id="txt-conteudo-sobre" required><?=$texto?></textarea>
                                    
                                </div>
            
                                <div class="linha-formulario-sobre-img">
                    
                                    <div class="coluna-formulario-sobre">
                                        <label id="thumbnail" class="thumbnail">
                                                <input type="file" name="flefoto" id="upload-img">
                                                
                                                <?php
                                                //Uma verificação para adicionar a TAG IMG de acordo com o modo da pagina
                                                //verifica e coloca a imagem cadastrada no banco no modo editar
                                                //adiciona uma imagem padrão por fins de validação no W3C quando não há imagem no registo, 
                                                //essa imagem padrao não é cadastrada se uma imagem não for selecionada
                                                if(isset($_GET['modo'])){
                                                    if($_GET['modo'] == 'editar'){
                                                ?>        
                                                <img id="preview-img" src="bd/arquivos/<?=$imagem?>">
                                                <?php
                                                    }
                                                }else{
                                                ?>
                                                 <img id="preview-img" src="icon/photo.png" alt="preveiw">
                                                <?php
                                                }
                                                ?>
    
                                        </label>    
                                    </div>
                                </div>
                                <div class="linha-formulario-sobre-button">
                                    
                                    <input type="submit" value="<?=$botao?>" name="btn-editar-conteudo" class="botao">
                                
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="pagina">
                    <div class="header-layout"> NAV BAR</div>
                        <div class="container-layout">
                        
                            
                            <?php
                                require_once('bd/conexao.php');
                                $conexao = conexaoMysql();

                                $contadora = 0;

                                $sql = "select pagina_sobre.* from pagina_sobre";

                                $select = mysqli_query($conexao, $sql);
                                
                                //mostra uma pre visualização do conteudo cadastrado
                                while($rsConsulta = mysqli_fetch_array($select))
                                {
                                    $contadora +=1;
                                    if($rsConsulta['ativado'] == 1){
                                        $estado = $ativo;
                                    }elseif($rsConsulta['ativado'] == 0){
                                        $estado = $desativo;
                                    }
                            ?>
                            <div class="section-layout">
                            <div class="layout-opcoes">
                            <div class="opcoes-item">
                                    <a href="adm-conteudo-sobre.php?modo=status&id=<?=$rsConsulta['id']?>&status=<?=$rsConsulta['ativado']?>">
                                        <img src="icon/<?=$estado?>" alt="editar">
                                    </a>
                                </div>
                                <div class="opcoes-item">
                                    <a onclick="return confirm('deseja realmente excluir esse conteudo?');" href="bd/delete-pagina-sobre.php?modo=deletar&id=<?=$rsConsulta['id']?>&nomefoto=<?=$rsConsulta['imagem']?>">
                                        <img src="icon/cancel.png" alt="deletar">
                                    </a>
                                </div>
                            </div>
                                <div class="selected-layout">
                                    <a href="adm-conteudo-sobre.php?modo=editar&id=<?=$rsConsulta['id']?>">
                                        EDITAR
                                    </a>
                                </div>

                                <?php
                                    if($contadora % 2 == 0){
                                ?>
                                <div class="img-layout2"></div>
                                <?php
                                    }else{
                                ?>
                                <div class="img-layout"></div>
                                <?php
                                    }
                                ?>

                                <div class="txt-layout">
                                    <div class="titulo-layout"></div>
                                    <div class="txt"></div>
                                    <div class="txt"></div>
                                    <div class="txt"></div>
                                    <div class="txt1"></div>
                                    <div class="txt"></div>
                                    <div class="txt2"></div>
                                    <div class="txt"></div>
                                    <div class="txt"></div>
                                </div>
                            </div>
                            <div class="decoration"> SEPARADOR </div>
                            <?php
                                }
                            ?>
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