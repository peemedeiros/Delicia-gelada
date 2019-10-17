<?php
    if(isset($_POST['modo'])){

        if(strtoupper($_POST['modo']) == 'VISUALIZAR'){

            require_once('../bd/conexao.php');

            $conexao = conexaoMysql();

            $codigo = $_POST['id'];

            $sql = "select * from contatos where id =".$codigo;

            $select = mysqli_query($conexao, $sql);

            if($rsVisualizar = mysqli_fetch_array($select)){
                $nome = strtoupper($rsVisualizar['nome']);
                $telefone = $rsVisualizar['telefone'];
                $celular = $rsVisualizar['celular'];
                $email = $rsVisualizar['email'];
                $homepage = $rsVisualizar['homepage'];
                $facebook = $rsVisualizar['facebook'];
                $tipo = $rsVisualizar['tipo'];
                    if( $tipo == "C")
                        $tipo = "CRÍTICA";
                    elseif( $tipo == "S")
                        $tipo = "SUGESTÃO";
                    else
                        $tipo = "NÃO ESPECÍFICADO";
                $mensagem = $rsVisualizar['mensagem'];
                $sexo = $rsVisualizar['sexo'];
                    if( $sexo == "M")
                        $sexo = "MASCULINO";
                    elseif( $sexo == "F" )
                        $sexo = "FEMININO";
                $profissao = strtoupper($rsVisualizar['profissao']);

                 
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
        <title>
            Modal
        </title>
    </head>
    <body>
        <div class="modalInfo-head">
            <h3 class="titulo-modal">Mensagem de <?=$nome?></h3>
        </div>

        <div class="modalInfo-body center">
            <div class="linha-modal">
                <div class="coluna-campo-modal">NOME:</div>
                <div class="coluna-modal"><?=$nome?></div>
            </div>
            <div class="linha-modal">
                <div class="coluna-campo-modal">TELEFONE:</div>
                <div class="coluna-modal"><?=$telefone?></div>
            </div>
            <div class="linha-modal">
                <div class="coluna-campo-modal">CELULAR:</div>
                <div class="coluna-modal"><?=$celular?></div>
            </div>
            <div class="linha-modal">
                <div class="coluna-campo-modal">E-MAIL:</div>
                <div class="coluna-modal"><?=$email?></div>
            </div>
            <div class="linha-modal-input">
                <div class="coluna-campo-modal padtop">HOME PAGE:</div>
                <div class="coluna-modal">
                    <input type="text" name="homepage" class="input-modal" value="<?=$homepage?>" disabled>
                </div>
            </div>
            <div class="linha-modal-input">
                <div class="coluna-campo-modal padtop">FACEBOOK:</div>
                <div class="coluna-modal">
                    <input type="text" name="facebook" class="input-modal" value="<?=$facebook?>" disabled>
                </div>
            </div>
            <div class="linha-modal">
                <div class="coluna-campo-modal">TIPO:</div>
                <div class="coluna-modal"><?=$tipo?></div>
            </div>
            <div class="linha-modal-mensagem">
                <div class="coluna-campo-modal">MENSAGEM:</div>
                <div class="coluna-modal-mensagem"><?=$mensagem?></div>
            </div>
            <div class="linha-modal">
                <div class="coluna-campo-modal">SEXO:</div>
                <div class="coluna-modal"><?=$sexo?></div>
            </div>
            <div class="linha-modal">
                <div class="coluna-campo-modal">PROFISSAO:</div>
                <div class="coluna-modal"><?=$profissao?></div>
            </div>
        </div>
    </body>
</html>