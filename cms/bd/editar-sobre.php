<?php
    if(isset($_POST['btn-editar-conteudo'])){

        require_once('conexao.php');
        $conexao = conexaoMysql();

        $titulo = $_POST['txt-titulo'];
        $texto = $_POST['txt-conteudo-sobre'];

        if($_FILES['flefoto']['name'] == ''){
            $sql = "insert into pagina_sobre (titulo, texto) values ('".$titulo."','".$texto."')";

            if(mysqli_query($conexao, $sql)){
                header('location ../adm-conteudo-sobre.php');
            }else{
                echo("erro ao executar o script");
            }
        }else{
            if($_FILES['flefoto']['size'] > 0 && $_FILES['flefoto']['type'] != ""){
                
                $arquivo_size = $_FILES['flefoto']['size'];

                $tamanho_arquivo = round($arquivo_size / 1024);

                $arquivos_permitidos = array("image/jpeg", "image/jpg", "image/png");

                $ext_arquivo = $_FILES['flefoto']['type'];
                if(in_array($ext_arquivo, $arquivos_permitidos)){

                    if($tamanho_arquivo <2048){

                        $nome_arquivo = pathinfo($_FILES['flefoto']['name'], PATHINFO_FILENAME);

                        $ext = pathinfo($_FILES['flefoto']['name'], PATHINFO_EXTENSION);

                        $nome_arquivo_cripty = md5(uniqid(time()).$nome_arquivo);
                        
                        $foto = $nome_arquivo_cripty.".".$ext;
    
                        $arquivo_temp = $_FILES['flefoto']['tmp_name'];
    
                        $diretorio = "arquivos/";

                        if(move_uploaded_file($arquivo_temp, $diretorio.$foto)){
                            if(strtoupper($_POST['btn-editar-conteudo']) == "EDITAR"){
                                $sql="insert into pagina_sobre (titulo, texto, imagem) values ('".$titulo."','".$texto."','".$foto."')";

                                if(mysqli_query($conexao, $sql)){
                                    header('location:../adm-conteudo-sobre.php');
                                }else{
                                    echo ("erro ao executar o script");
                                }
                            } // aqui vira o ekse if para a futura edição
                        }else{
                            echo("<script> nao foi possivel enviar o arquivo para o servidor </script>");
                        }
                    }else{
                        echo("<script> Tamanho nao permitido</script>");
                    }
                }else{
                    echo("<script>Tipo nao permitido</script>");
                }
            }else{
                echo("<script> arquivo nao compativel </script>");
            }
        }
    }
?>