<?php

    require_once('conexao.php');
    $conexao = conexaoMysql();

    if(isset($_GET['modo'])){
        if($_GET['modo'] == "deletar"){

            $id = $_GET['id'];

            $sql = "delete from pagina_lojas where id =".$id;

            if(mysqli_query($conexao, $sql))
                header('location:../adm-conteudo-lojas.php');
            else
                echo('erro ao deletar registro');
        }
    }

?>