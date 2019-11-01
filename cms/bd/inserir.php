<?php

if(isset($_POST['btn-cadastrar'])){

require_once('conexao.php');
$conexao = conexaoMysql();

    $nome = $_POST['nomeUsuario'];
    $email = $_POST['emailUsuario'];
    $senha = $_POST['senhaUsuario'];
    $dt_nasc = $_POST['dtNascimentoUsuario'];
    $idsetor = $_POST['setor'];
    $idnivel = $_POST['nivel'];

    $sql = "insert into usuarios(nome,email,senha,dt_nasc,idsetor,idnivel)
    values('".$nome."','".$email."','".$senha."','".$dt_nasc."',".$idsetor.",".$idnivel.")";
    echo($sql);

    if(mysqli_query($conexao, $sql))
        header('location:../adm-users.php');
    else
        echo("erro ao executar o script");
        
}

?>