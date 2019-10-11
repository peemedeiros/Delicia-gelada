<?php
require_once('../bd/conexao.php');

$conexao = conexaoMysql();

$selecionar = 'select * from contatos';

$select = mysqli_query($conexao, $selecionar);

if (isset($_GET['modo'])){

    if($_GET['modo'] == 'excluir'){
        $codigo = $_GET['id'];
        
        $sql = "delete from contatos where id = ".$codigo;
        
        if(mysqli_query($conexao, $sql)){
            header('adm-contato.php');
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
            CMS
        </title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="./css/cms-styles.css">
        <?php
			require_once('../modulos/icon.php');
		?>
    </head>
    <body>
        <section id="cms">
            <div class="conteudo center">
                <?php
                    require_once('./modulos/cms-header.php');
                ?>
                <div class="estrutura-adm-conteudo">
                    <div class="filtro">
                        <select id="caixaFiltro">
                            <option value="C">Críticas</option>
                            <option value="S">Sugestões</option>
                        </select>
                        <img src="./icon/filter.png">
                    </div>
                    <div class="tabela-contatos center">
                   
                        <div class="thead">
                            <div class="thead-itens"> NOME </div>
                            <div class="thead-itens"> E-MAIL </div>
                            <div class="thead-itens"> CELULAR </div>
                            <div class="thead-itens"> OPçÃO </div>
                        </div>
                        <?php

                        while($rsConsulta = mysqli_fetch_array($select)){
                            $cor = (string) "";
                            if($rsConsulta['id'] % 2 == 0 ){
                                $cor = 'zebrado';
                            }else if($rsConsulta['id'] % 2 != 0){
                                $cor = '';
                            }
                        ?>
                        <div class="tbody <?=$cor?>" id="<?=$rsConsulta['id']?>">
                            <div class="tbody-itens"> <?=$rsConsulta['nome']?> </div>
                            <div class="tbody-itens"> <?=$rsConsulta['email']?> </div>
                            <div class="tbody-itens"> <?=$rsConsulta['celular']?> </div>
                            <div class="tbody-itens-icons">
                               <img src="./icon/lupa.png" alt="lupa">
                                <a href="adm-contato.php?modo=excluir&id=<?=$rsConsulta['id']?>">                            
                                    <img src="./icon/cancelar.png" alt="cancelar">
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