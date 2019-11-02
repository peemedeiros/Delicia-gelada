<?php

if(isset($_POST['btnLogin'])){

    require_once('conexao.php');
    $conexao = conexaoMysql();

	$usuario = $_POST['txtUsuario'];
    $senha = $_POST['txtSenha'];
    
    if($usuario != "" && $senha != ""){

        $sql = "select usuarios.* from usuarios 
        where email='".$usuario."'
        and senha ='".$senha."'";

        $logar = mysqli_query($conexao, $sql);

        $rsUsuario = mysqli_fetch_array($logar);

        if($rsUsuario['email'] == $usuario && $rsUsuario['senha'] == $senha){
            $_SESSION['']
            header('location: ../cms/home.php');
        }else{
            echo("usuario ou senha incorretos");
        }
    }else{
        echo("Os campos de usuario e senha devem ser preenchidos");
    }
}
?>