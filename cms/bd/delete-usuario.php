<?php

if(isset($_GET['modo'])){
    if($_GET['modo'] == 'excluir'){

        require_once('conexao.php');
        $conexao = conexaoMysql();

        $id = $_GET['id'];

        $sql = "delete from usuarios where id=".$id;

        if(mysqli_query($conexao, $sql)){
            header('location:../adm-users.php');
        }else{
            echo('erro ao executar o script');
            
        }
    }
}

?>