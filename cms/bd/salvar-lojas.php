<?php

require_once('conexao.php');
$conexao = conexaoMysql();

if(isset($_POST['btn-lojas'])){

    $nome = $_POST['txt-loja'];
    $cep = $_POST['txt-cep'];
    $logradouro = $_POST['txt-logradouro'];
    $bairro = $_POST['txt-bairro'];
    $numero = $_POST['txt-numero'];
    $cidade = $_POST['txt-cidade'];
    $estado = strtoupper($_POST['txt-estado']);
    $link = $_POST['url-maps'];

    if(strtoupper($_POST['btn-lojas']) == "CADASTRAR"){
        
        $sql = "insert into pagina_lojas (nome, cep, logradouro, bairro, numero, cidade, estado, link)
                values ('".$nome."','".$cep."','".$logradouro."','".$bairro."','".$numero."','".$cidade."','".$estado."','".$link."')";
        
        if(mysqli_query($conexao, $sql)){
            header('location: ../adm-conteudo-lojas.php');
        }else{
            echo("erro ao cadastrar loja");
        }
    }elseif(strtoupper($_POST['btn-lojas']) == "EDITAR"){
        session_start();

        $sql = "update pagina_lojas set 
        nome = '".$nome."', 
        cep = '".$cep."',
        logradouro = '".$logradouro."',
        bairro = '".$bairro."',
        numero = '".$numero."',
        cidade = '".$cidade."',
        estado = '".$estado."',
        link = '".$link."' where id = ".$_SESSION['id'];

        if(mysqli_query($conexao, $sql))
            header('location: ../adm-conteudo-lojas.php');
        else
            echo('erro ao atualizar loja');
    }
}


?>