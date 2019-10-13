<?php

$tipo = "";

if(isset($_GET['btnFiltro'])){
    require_once('./conexao.php');

    $tipo = $_GET['opCritica'];


}

?>