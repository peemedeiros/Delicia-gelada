<?php

require_once('conexao.php');
$conexao = conexaoMysql();

if(isset($_POST['btn-categoria'])){

    $nome = $_POST['txt-categoria'];

    if($_FILES['fleicone']['size'] > 0 && $_FILES['fleicone']['type'] != ""){
        
        $arquivo_size = $_FILES['fleicone']['size'];

        $tamanho_arquivo = round($arquivo_size / 1024);

        $arquivos_permitidos = array("image/jpeg", "image/jpg", "image/png");

        $ext_arquivo = $_FILES['fleicone']['type'];

        if(in_array($ext_arquivo, $arquivos_permitidos)){

            if($tamanho_arquivo < 2048){

                $nome_arquivo = pathinfo($_FILES['fleicone']['name'], PATHINFO_FILENAME);

                $ext = pathinfo($_FILES['fleicone']['name'], PATHINFO_EXTENSION);

                $nome_arquivo_cripty = md5(uniqid(time()).$nome_arquivo);
                
                $foto = $nome_arquivo_cripty.".".$ext;

                $arquivo_temp = $_FILES['fleicone']['tmp_name'];

                $diretorio = "arquivos/";

                if(move_uploaded_file($arquivo_temp, $diretorio.$foto)){

                    $sql = "insert into categorias (nome, icone) values ('".$nome."', '".$foto."')";

                    if(mysqli_query($conexao, $sql)){

                        // header('location: ../cadastrar-categoria.php');

                        $sql = "select id from categorias order by id desc limit 1";

                        $select = mysqli_query($conexao, $sql);

                        $rsConsulta = mysqli_fetch_array($select);

                        if(!empty($_POST['checklist'])){

                            foreach($_POST['checklist'] as $selected){

                                $sqlDoencas = "insert into categoria_sabor (id_categoria, id_sabor) values (".$rsConsulta['id'].", ".$selected.")";

                                if(mysqli_query($conexao, $sqlDoencas)){
                                    header('location: ../cadastrar-categoria.php');
                                }else{
                                    echo("erro");
                                }
                            }
                            
                        }else{
                            echo("erro");
                        }


                    }
                    else
                        echo("erro ao executar o script");
                    
                }else{
                    echo(" nao foi possivel enviar o arquivo para o servidor ");
                }
            }else{
                echo(" Tamanho nao permitido");
            }
        }else{
            echo("Tipo nao permitido");
        }
    }else{
        echo("nao entrou aqui");
    }
}




?>