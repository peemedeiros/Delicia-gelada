<?php
//declarando variaveis
$home = (String) "";
$admUser = (String) "";
$admContato = (String) "";

if(!isset($_SESSION)){
    //startando sessao
    session_start();

    //variaveis de sessao sendo criadas para preencher o link dos botoes de menus de acordo com o nivel de permissao do usuario logado
    $_SESSION['home'] = "";
    $_SESSION['adm-users'] = "";
    $_SESSION['adm-contato'] = "";

    //variaveis com as classes que aplicam o efeito de menu desativado 
    $_SESSION['adm-disable'] = "disable-adm-conteudo";
    $_SESSION['adm-user-disable'] = "disable-adm-users";
    $_SESSION['adm-contato-disable'] = "disable-adm-contato";

    //verifica cada elemento do array menus para atribuir um link em uma varivel
    for($i = 0; $i < sizeof($_SESSION['menus']); $i++){
        
        // var_dump($_SESSION['menus'][$i]);

        if($_SESSION['menus'][$i] == "home.php"){

            $_SESSION['adm-disable'] = "";
            $_SESSION['home'] = "home.php";
            // echo($home);
        }else if($_SESSION['menus'][$i] == "adm-users.php"){

            $_SESSION['adm-user-disable'] ="";
            $_SESSION['adm-users'] = "adm-users.php";

            // echo($admUser);
        }else if($_SESSION['menus'][$i] == "adm-contato.php"){

            $_SESSION['adm-contato-disable'] = "";
            $_SESSION['adm-contato'] = "adm-contato.php";

            //echo($admContato);
        }
    }
}
?>
<div class="cms-header">
    <h1 class="titulo texto-branco">
        CMS
    </h1>
    <h3 class="sub-titulo texto-branco">
        - Sistema de Gerenciamento do Site
    </h3>

    <div class="cms-img">
        <img src="../icon/icon-logo-barra.png" alt="logo">
    </div>
</div>
<nav class="cms-nav">
    <div class="cms-itens <?=$_SESSION['adm-disable']?>">
        <a href="<?=$_SESSION['home']?>">
            <div class="cms-itens-imagens center">
                <img src="../icon/execution.png" alt="adm">
            </div>
            Adm. Conteúdo
        </a>
    </div>
    <div class="cms-itens <?=$_SESSION['adm-contato-disable']?>">
        <a href="<?=$_SESSION['adm-contato']?>">
            <div class="cms-itens-imagens center">
                <img src="../icon/consumer.png" alt="adm">
            </div>
            Adm. Fale Conosco
        </a>
    </div>
    <div class="cms-itens <?=$_SESSION['adm-user-disable']?>">
        <a href="<?=$_SESSION['adm-users']?>">
            <div class="cms-itens-imagens center">
                <img src="../icon/multiple-users-silhouette.png" alt="adm">
            </div>
            Adm. Usuários
        </a>
    </div>
    <div class="cms-itens_login float-right">
        <div class="texto">Bem vindo, <?=$_SESSION['nome']?></div>
        <div class="bnt-log-out">
            <a href="../index.php?modo=logout">
                log out
            </a>
        </div>
    </div>
</nav>