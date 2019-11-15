<?php
if(isset($_GET['modo'])){
    if($_GET['modo'] = 'deletar'){

        require_once('conexao.php');
        $conexao = conexaoMysql();

        $id = $_GET['id'];

        $sql = "delete from pagina_sobre where id = ".$id;

        if(mysqli_query($conexao, $sql)){
            header('location:../adm-conteudo-sobre.php');
        }else{
            echo('erro ao executar o script');
        }
    }
}


?>