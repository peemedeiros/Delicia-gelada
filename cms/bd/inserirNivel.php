<?php

    //verifica se o botão exite.
    if(isset($_POST['btn-cadastrar-nivel'])){
        require_once('../../bd/conexao.php');
        $conexao = conexaoMysql();

        $nomeNivel = $_POST['nomeNivel'];
        $adm_conteudo = $_POST['adm_conteudo'];
        $adm_contatos = $_POST['adm_contato'];
        $adm_usuarios = $_POST['adm_user'];
        
        //cadastra o nível
        $sql = "insert into niveis (nome) values ('".$nomeNivel."')";

        if(mysqli_query($conexao, $sql)){

            //implementações, trazer o comando que irá buscar o ultimo item que foi adicionado no banco de dados;
            //com isso nos iremos dar o comando para busca pelo ID esse ultimo item que foi adicionado, não buscar o ID pelo nome. 
            //mysqli_insert_id
            
            if($adm_conteudo != 0){

                //script que seleciona o nível que acabou de ser criado.
                $sqlNivel = "select niveis.id from niveis where nome = '".$nomeNivel."'";
                
                $idNivel = mysqli_query($conexao, $sqlNivel);
                
                $rsNivelId = mysqli_fetch_array($idNivel);

                $sqlAdmConteudo = "insert into nivel_menu (id_nivel, id_menu) values ('".$rsNivelId['id']."','".$adm_conteudo."')";
                
                if(mysqli_query($conexao, $sqlAdmConteudo)){
                    header('location:../adm-users.php');
                }else{
                    echo("erro2");
                    echo($sqlAdmConteudo);
                }
            }
            if($adm_contatos != 0){

                $sqlNivel = "select niveis.id from niveis where nome = '".$nomeNivel."'";

                $idNivel = mysqli_query($conexao, $sqlNivel);

                $rsNivelId = mysqli_fetch_array($idNivel);

                $sqlAdmContato = "insert into nivel_menu (id_nivel, id_menu) values ('".$rsNivelId['id']."','".$adm_contatos."')";
                
                if(mysqli_query($conexao, $sqlAdmContato)){
                    header('location:../adm-users.php');
                }else{
                    echo("erro2");
                    echo($sqlAdmUser);
                }
            }
            if($adm_usuarios != 0){
                $sqlNivel = "select niveis.id from niveis where nome = '".$nomeNivel."'";

                $idNivel = mysqli_query($conexao, $sqlNivel);

                $rsNivelId = mysqli_fetch_array($idNivel);

                $sqlAdmUser = "insert into nivel_menu (id_nivel, id_menu) values ('".$rsNivelId['id']."','".$adm_usuarios."')";
                
                if(mysqli_query($conexao, $sqlAdmUser)){
                    header('location:../adm-users.php');
                }else{
                    echo("erro2");
                    echo($sqlAdmUser);
                }
            }
        }else{
            echo("erro ao executar o script");
        }
    }

?>