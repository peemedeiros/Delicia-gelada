<?php
require_once('conexao.php');
$conexao = conexaoMysql();

if(isset($_GET['modo'])){
    if($_GET['modo'] == "deletar"){

        $id = $_GET['id'];
        $background = $_GET['background'];

        $sql = "delete from pagina_curiosidades where id = ".$id;

        if(mysqli_query($conexao, $sql)){

            header('location: ../adm-conteudo-curiosidades.php');
            unlink('arquivos/'.$background);
            
        }else{
            echo('erro ao deletar');
        }

    }
}

?>