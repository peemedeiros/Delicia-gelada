<?php

require_once('conexao.php');
$conexao = conexaoMysql();

$nome = $_POST['txt-produto'];
$preco = $_POST['txt-preco'];
$descricao = $_POST['txt-desc-produto'];
$categoria = $_POST['rdTipo'];
$sabor = $_POST['rdSabor'];

if(isset($_POST['btn-cadastro-produto'])){

    if($_FILES['flefoto']['size'] > 0 && $_FILES['flefoto']['type'] != ""){
        
        $arquivo_size = $_FILES['flefoto']['size'];

        $tamanho_arquivo = round($arquivo_size / 1024);

        $arquivos_permitidos = array("image/jpeg", "image/jpg", "image/png");

        $ext_arquivo = $_FILES['flefoto']['type'];

        if(in_array($ext_arquivo, $arquivos_permitidos)){

            if($tamanho_arquivo < 2048){

                $nome_arquivo = pathinfo($_FILES['flefoto']['name'], PATHINFO_FILENAME);

                $ext = pathinfo($_FILES['flefoto']['name'], PATHINFO_EXTENSION);

                $nome_arquivo_cripty = md5(uniqid(time()).$nome_arquivo);
                
                $foto = $nome_arquivo_cripty.".".$ext;

                $arquivo_temp = $_FILES['flefoto']['tmp_name'];

                $diretorio = "arquivos/";

                if(move_uploaded_file($arquivo_temp, $diretorio.$foto)){

                    $sql = "insert into produtos (nome, preco, descricao, imagem, id_categoria, id_sabor)
                    values ('".$nome."','".$preco."','".$descricao."','".$foto."','".$categoria."','".$sabor."')";

                    if(mysqli_query($conexao, $sql)){

                        header('location: ../cadastrar-produto.php');

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
    }


?>