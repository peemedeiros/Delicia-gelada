<?php

//conexao com o banco de dados
require_once('../bd/conexao.php');
$conexao = conexaoMysql();

// Declaração de variaveis
$selecionar = "";
$selectedCriticas = "";
$selectedSugestoes = "";
$selectedTodos = "";
@$tipo = $_POST['opCritica'];

// Verificações para o filtro
if($tipo == "C"){
    $selecionar = "select * from contatos where tipo = 'C' ";
    $selectedCriticas = "selected";
}elseif($tipo == "S"){
    $selecionar = "select * from contatos where tipo = 'S' ";
    $selectedSugestoes = "selected";
}else{
    $selecionar = "select * from contatos";
    $selectedTodos = "selected";
}

$select = mysqli_query($conexao, $selecionar);

//verificação para o modo EXCLUIR para deletar registros no banco de dados

if (isset($_GET['modo'])){

    if($_GET['modo'] == 'excluir'){
        $codigo = $_GET['id'];
        
        $sql = "delete from contatos where id = ".$codigo;
        
        if(mysqli_query($conexao, $sql)){
            header('location: ./adm-contato.php');
        }else{
            echo('erro');
        }
    }
}
?>
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
       
        <script src="./js/jquery.js"></script>
        <script src="./js/confirmacao.js"></script>

        <script>
            //mostra a modal
            $(document).ready(function(){
                $('.visualizar').click(function(){
                    $('#container-modal').fadeIn(500);
                });
            //fechar a modal
                $('#fechar').click(function(){
                    $('#container-modal').fadeOut(500);
                });
            });
            // verifica e adiciona, se a verificação for verdadeira, dados via POST nos campos da Modal
            function visualizarDados(idItem){
                $.ajax({
                    type:"POST",
                    url:"modalContatos.php",
                    data: {
                        modo: 'visualizar',
                        id: idItem
                    },
                    success: function(dados){
                        $('#modalDados').html(dados);
                    }
                });
            }
        </script>
        

    </head>
    <body>
    <div id="container-modal">
        <div id="modal">
            <div id="fechar">
                <img src="./icon/cancel.png" alt="fechar">
            </div>
            <div id="modalDados">
            
            </div>
        </div>
    </div>
        <section id="cms">
            <div class="conteudo center">
                <?php
                    require_once('./modulos/cms-header.php');
                ?>
                <div class="estrutura-adm-conteudo">
                    <div class="filtro">
                        <h3>filtrar mensagens</h3>
                        <form action="adm-contato.php" method="POST">
                            <select id="caixaFiltro" name="opCritica">
                                <option value="C" <?=$selectedCriticas?>>Críticas</option>
                                <option value="S" <?=$selectedSugestoes?>>Sugestões</option>
                                <option value=""  <?=$selectedTodos?>>Todos</option>
                            </select>
                            <button type="submit" class="img" name="btnFiltro" value="botao">

                            </button>
                        </form>
                    </div>
                    <div class="tabela-contatos center">
                   
                        <div class="thead">
                            <div class="thead-itens"> NOME </div>
                            <div class="thead-itens"> E-MAIL </div>
                            <div class="thead-itens"> CELULAR </div>
                            <div class="thead-itens"> OPçÃO </div>
                        </div>
                        <?php
                        
                        $cor = (string) "";
                        $ativarZebrado = true;

                        //Exibe os registros de mensagens no banco de dados
                        while($rsConsulta = mysqli_fetch_array($select)){

                            //Zebrar a exibição da tabela de registros
                            if($ativarZebrado == true){
                                $cor = 'zebrado';
                                $ativarZebrado = false;
                            }else if($ativarZebrado == false){
                                $cor = '';
                                $ativarZebrado = true;
                            }
                        ?>
                        <div class="tbody <?=$cor?>">
                            <div class="tbody-itens"> <?=$rsConsulta['nome']?> </div>
                            <div class="tbody-itens"> <?=$rsConsulta['email']?> </div>
                            <div class="tbody-itens"> <?=$rsConsulta['celular']?> </div>
                            <div class="tbody-itens-icons">
                               <img src="./icon/lupa.png" class="visualizar" onclick="visualizarDados(<?=$rsConsulta['id']?>);" alt="lupa">
                                <a href="adm-contato.php?modo=excluir&id=<?=$rsConsulta['id']?>">                            
                                    <img src="./icon/cancelar.png" alt="cancelar" onclick="return confirmar('deseja realmente excluir esse registro???');" >
                                </a>
                            </div>
                        </div>
                        <?php

                        }

                        ?>
                    </div>
                </div>
                <?php
                    require_once('./modulos/cms-footer.php');
                ?>
            </div>
        </section> 
        
    </body>
</html>
