<?php


require_once('conexao.php');
$conexao = conexaoMysql();

if (session_status() != PHP_SESSION_ACTIVE) {//Verificar se a sessão não já está aberta.
    session_start();
}

if(isset($_POST['btn-curiosidades'])){

    $titulo = $_POST['txt-curiosidades'];
    $texto = $_POST['conteudo-curiosidades'];

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

                    if(strtoupper($_POST['btn-curiosidades']) == "CADASTRAR"){

                            if($_FILES['flefoto']['name'] == ''){

                            $sql = "insert into pagina_curiosidades (titulo, texto) values ('".$titulo."','".$texto."')";   

                            if(mysqli_query($conexao, $sql)){
                                header('location: ../adm-conteudo-curiosidades.php');
                            }else{
                                echo("erro ao executar o script");
                            }

                        }else{

                            $sql="insert into pagina_curiosidades (titulo, texto, background) values ('".$titulo."','".$texto."','".$foto."')";

                            if(mysqli_query($conexao, $sql)){
                                header('location:../adm-conteudo-curiosidades.php');
                            }else{
                                echo ("erro ao executar o script");
                            }
                        }

                    }elseif(strtoupper($_POST['btn-curiosidades']) == "EDITAR"){

                        
                        // aqui vira o else if para a futura edição
                        $sql="update pagina_curiosidades set titulo='".$titulo."', texto='".$texto."' , background='".$foto."' where id=".$_SESSION['id'];

                        if(mysqli_query($conexao, $sql)){
                            header('location:../adm-conteudo-curiosidades.php');
                        }else{
                            echo ("erro ao executar o script2");
                        }
                        
                    }
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
        if(strtoupper($_POST['btn-curiosidades']) == "CADASTRAR"){

            $sql = "insert into pagina_curiosidades (titulo, texto) values ('".$titulo."','".$texto."')";   

            if(mysqli_query($conexao, $sql)){
                header('location: ../adm-conteudo-curiosidades.php');
            }else{
                echo("erro ao executar o script");
            }
        }elseif(strtoupper($_POST['btn-curiosidades']) == "EDITAR"){

            $sql="update pagina_curiosidades set titulo='".$titulo."', texto='".$texto."' where id=".$_SESSION['id'];

            if(mysqli_query($conexao, $sql)){
                header('location:../adm-conteudo-curiosidades.php');
            }else{
                echo ("erro ao executar o script2");
            }
        }
    }
}


?>