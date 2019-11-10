<?php

if(isset($_GET['modo'])){
    if($_GET['modo'] == 'excluir'){

        require_once('../../bd/conexao.php');
        $conexao = conexaoMysql();

        $id = $_GET['id'];

        $sql = "delete from nivel_menu where id_nivel=".$id;

        if(mysqli_query($conexao, $sql)){

            $sql2 = "delete from usuarios where idnivel =".$id;

            if(mysqli_query($conexao,$sql2)){

                $sql3 = "delete from niveis where id =".$id;

                if(mysqli_query($conexao, $sql3)){
                    header('location:../adm-users.php');
                }else{
                    echo('erro ao executar o terceiro script');
                }
            }else{
                echo('erro ao executar o segundo script');
                echo($sql2);
            }            
        }else{
            echo('erro ao executar o script');
            echo($sql);
            
        }
    }
}

?>