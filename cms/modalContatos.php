<?php
    if(isset($GET['modo'])){
        if(strtoupper($GET['modo']) == 'VISUALIZAR'){
            $codigo = $GET['codigo'];

            require_once('../../bd/conexao.php');

            $conexao = conexaoMsql();

            $sql = "select * from contatos where codigo =".$codigo;

            $select = mysqli_query($conexao, $sql);

            if($rsVisualizar = mysqli_fetch_array($select)){
                $nome = $rsVisualizar['nome'];
                $telefone = $rsVisualizar['telefone'];
                $celular = $rsVisualizar['celular'];
                $email = $rsVisualizar['email'];
                $homepage = $rsVisualizar['homepage'];
                $facebook = $rsVisualizar['facebook'];
                $tipo = $rsVisualizar['tipo'];
                $sexo = $rsVisualizar['sexo'];
                $profissao = $rsVisualizar['profissao'];
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
        <table border="1">
            <tr>
                <td>
                    nome:
                </td>
                <td>
                    <?=$nome?>
                </td>
            </tr>
            <tr>
                <td>
                    telefone:
                </td>
                <td>
                <?=$telefone?>
                </td>
            </tr>
            <tr>
                <td>
                    celular
                </td>
                <td>
                <?=$celular?>
                </td>
            </tr>
            <tr>
                <td>    
                    email
                </td>
                <td>
                <?=$email?>
                </td>
            </tr>
            <tr>
                <td>
                    data nascimento
                </td>
                <td>
                <?=$dt_nasc?>
                </td>
            </tr>
            <tr>
                <td>
                    homepage
                </td>
                <td>
                <?=$homepage?>
                </td>
            </tr>
            <tr>
                <td>
                    facebook
                </td>
                <td>
                <?=$facebook?>
                </td>
            </tr>
            <tr>
                <td>
                    tipo
                </td>
                <td>
                <?=$tipo?>
                </td>
            </tr>
            <tr>
                <td>
                    mensagem
                </td>
                <td>
                <?=$mensagem?>
                </td>
            </tr>
            <tr>
                <td>
                    profissao
                </td>
                <td>
                <?=$profissao?>
                </td>
            </tr>
            
        </table>
    </body>
</html>