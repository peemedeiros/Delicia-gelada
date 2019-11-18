<?php

//declaração de variaveis
$nome = (String) "";
$cep = (String) "";
$logradouro = (String) "";
$bairro = (String) "";
$numero = (String) "";
$cidade = (String) "";
$estado = (String) "";
$link = (String) "";
$ativado = (int) 1;
$imgAtivar = "switch_on.png";
$imgDesativar = "switch_off.png";


$botao = (String) "CADASTRAR";

//conexao com o banco
require_once('bd/conexao.php');
$conexao = conexaoMysql();

//verifica se há a variavel modo na url
if(isset($_GET['modo'])){
    if($_GET['modo'] == "editar"){
        // starta a sessão
        session_start();

        $id = $_GET['id'];

        //variavel de sessão que será utilizada no update do arquivo salvar-lojas.php
        $_SESSION['id'] = $id;

        //consulta no banco para trazer lojas cadastradas
        $sql = "select pagina_lojas.* from pagina_lojas where id = ".$id;

        $select = mysqli_query($conexao, $sql);

        //trazer o registro em formato ARRAY e carregar nas variaveis os valores de acordo com as colunas da tabela no banco de dados
        if($rsEditar = mysqli_fetch_array($select)){
            $nome = $rsEditar['nome'];
            $cep = $rsEditar['cep'];
            $logradouro = $rsEditar['logradouro'];
            $bairro = $rsEditar['bairro'];
            $numero = $rsEditar['numero'];
            $cidade = $rsEditar['cidade'];
            $estado = $rsEditar['estado'];
            $link = $rsEditar['link'];
        
        //troca o estado do botão para acessao o modo de update
            $botao = "EDITAR";
        }
        //entra no modo de ativar e desativar
    }elseif($_GET['modo'] == "status"){

        $id = $_GET['id'];
        $ativado = $_GET['ativado'];

        if($ativado == 0)
            $ativado = 1;
        elseif($ativado == 1)
            $ativado = 0;

        //query para mudar o estado do registro
        $sql = "update pagina_lojas set ativado =".$ativado." where id =".$id;

        if(mysqli_query($conexao, $sql)){
            header('location: adm-conteudo-lojas.php');
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
        <script src="../js/modulo.js"></script>
    </head>
    <body>
        <section id="cms">
            <div class="conteudo center">
                <?php 
                    require_once('./modulos/cms-header.php');
                ?>
                <div class="lojas">
                    <form action="bd/salvar-lojas.php" name="frm-lojas" method="POST">    
                        <div class="formulario-cadastro-lojas">
                            <h5>NOME DA LOJA</h5>
                            <input value="<?=$nome?>" type="text" name="txt-loja" id="txtLoja" required >

                            <div class="endereco-form">
                                <div class="campo-endereco-form">
                                    <h5>CEP</h5>
                                    <a href="http://www.buscacep.correios.com.br/sistemas/buscacep/" target="_blank">
                                        <img src="icon/brazil-correios.svg" alt="Correios">
                                        <div class="legenda-correios">
                                            <h6>BUSQUE O CEP</h6>
                                        </div>
                                    </a>
                                    <input value="<?=$cep?>" type="text" name="txt-cep" id="txtCep" onkeypress="return mascaraCep(this,event);" required>
                                </div>

                                <div class="campo-endereco-form-rua">
                                    <h5>Logradouro</h5>
                                    <input value="<?=$logradouro?>" type="text" name="txt-logradouro" id="txtLogradouro" required >
                                </div>
                                <div class="campo-endereco-form-bairro">
                                    <h5>Bairro</h5>
                                    <input value="<?=$bairro?>" type="text" name="txt-bairro" id="txtBairro" required >
                                </div>
                                <div class="campo-endereco-form-estado">
                                    <h5>Numero</h5>
                                    <input value="<?=$numero?>" type="text" name="txt-numero" id="txtNumero" onkeypress="return validarEntrada(event,'string');" required >
                                </div>
                                <div class="campo-endereco-form-bairro">
                                    <h5>Cidade</h5>
                                    <input value="<?=$cidade?>" type="text" name="txt-cidade" id="txtCidade" required >
                                </div>
                                <div class="campo-endereco-form-estado">
                                    <h5>UF</h5>
                                    <input value="<?=$estado?>" type="text" name="txt-estado" id="txtEstado" onkeypress="return mascaraUf(this,event);" required >
                                </div>
                                <div class="campo-endereco-form-url">
                                    <h5>Google Maps URL</h5>
                                    <a href="https://www.google.com.br/maps" target="_blank">
                                        <img src="icon/google-maps.png" alt="googleMaps" >
                                        <div class="legenda-maps">
                                            <h6>ACESSE O MAPS</h6>
                                        </div>
                                    </a>
                                        <input value="<?=$link?>" type="url" name="url-maps" id="txtMaps" required>
                                </div>
                                <div class="btn-lojas">
                                    <input type="submit" value="<?=$botao?>" class="botao" name="btn-lojas">
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="lojas-layout">
                        <div class="header-layout texto-branco"> NAV BAR</div>

                        <?php

                        require_once('bd/conexao.php');
                        $conexao = conexaoMysql();
                        
                        $sql = "select pagina_lojas.* from pagina_lojas";

                        $select = mysqli_query($conexao, $sql);

                        //mostra uma pre visualização das lojas cadastradas
                        while($rsConsulta = mysqli_fetch_array($select)){
                            if($rsConsulta['ativado'] == 1)
                                $ativado = $imgAtivar;
                            elseif($rsConsulta['ativado'] == 0)
                                $ativado = $imgDesativar;
                        ?>
                        <div class="lojas-cards-layout">
                            <h5><?=$rsConsulta['nome']?></h5>
                            <div class="lojas-content-layout">
                                <div class="layout-endereco"></div>
                                <div class="layout-endereco2"></div>
                                <div class="layout-endereco"></div>
                                <div class="layout-endereco3"></div>
                                <div class="layout-endereco"></div>
                            </div>
                            <div class="opcoes-lojas">
                                <a href="adm-conteudo-lojas.php?modo=status&id=<?=$rsConsulta['id']?>&ativado=<?=$rsConsulta['ativado']?>">
                                    <img src="icon/<?=$ativado?>" alt="ativar">
                                </a>
                                <a href="bd/deletar-lojas.php?modo=deletar&id=<?=$rsConsulta['id']?>">
                                    <img src="icon/cancel.png" alt="delete">
                                </a>
                            </div>
                            <div class="editar-lojas-layout">
                                <a href="adm-conteudo-lojas.php?modo=editar&id=<?=$rsConsulta['id']?>">
                                    <h3>EDITAR</h3>
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
        <script src="js/viacep.js"></script>
    </body>
</html>