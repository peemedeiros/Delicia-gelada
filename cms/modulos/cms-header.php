<?php

$home = (String) "";
$admUser = (String) "";
$admContato = (String) "";

$disableAdmConteudo = (String) "disable-adm-conteudo";
$disableAdmUsuarios = (String) "disable-adm-users";
$disableAdmContatos = (String) "disable-adm-contato";

if(!isset($_SESSION)){

    session_start();
    
    //$arrMenus [] = $_SESSION['menus'];

    //var_dump($_SESSION['menus'][1]);

    for($i = 0; $i < sizeof($_SESSION['menus']); $i++){
        
        // var_dump($_SESSION['menus'][$i]);

        if($_SESSION['menus'][$i] == "home.php"){
            $home = "home.php";
            $disableAdmConteudo = "";
            // echo($home);
        }else if($_SESSION['menus'][$i] == "adm-users.php"){
            $admUser = "adm-users.php";
            $disableAdmUsuarios = "";
            // echo($admUser);
        }else if($_SESSION['menus'][$i] == "adm-contato.php"){
            $admContato = "adm-contato.php";
            $disableAdmContatos = "";
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
    <div class="cms-itens <?=$disableAdmConteudo?>">
        <a href="<?=$home?>">
            <div class="cms-itens-imagens center">
                <img src="../icon/execution.png" alt="adm">
            </div>
            Adm. Conteúdo
        </a>
    </div>
    <div class="cms-itens <?=$disableAdmContatos?>">
        <a href="<?=$admContato?>">
            <div class="cms-itens-imagens center">
                <img src="../icon/consumer.png" alt="adm">
            </div>
            Adm. Fale Conosco
        </a>
    </div>
    <div class="cms-itens <?=$disableAdmUsuarios?>">
        <a href="<?=$admUser?>">
            <div class="cms-itens-imagens center">
                <img src="../icon/multiple-users-silhouette.png" alt="adm">
            </div>
            Adm. Usuários
        </a>
    </div>
    <div class="cms-itens_login float-right">
        <div class="texto">Bem vindo, <?=$_SESSION['nome']?></div>
        <div class="bnt-log-out">
            <a href="../index.php">
                log out
            </a>
        </div>
    </div>
</nav>