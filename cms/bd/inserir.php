<?php

if(isset($_POST['btn-cadastrar'])){
    
    require_once('../../bd/conexao.php');
    $conexao = conexaoMsql();
    
    $nome = $_POST['nomeUsuario'];
    $email = $_POST['emailUsuario'];
    $senha = $_POST['senhaUsuario'];
    $dt_nasc = $_POST['dtNascimentoUsuario'];
    $idsetor = $_POST['setor'];

    $sql = "insert into usuarios(nome,email,senha,dt_nasc,idsetor)
    values('".$nome."','".$email"','".$senha."','".$dt_nasc."',".$idsetor.")";

    if(mysqli_query($conexao, $sql))
        header('location:../adm-users.php');
    else
        echo("erro ao executar o script");
}

?>