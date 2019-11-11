<?php
if (session_status() != PHP_SESSION_ACTIVE) {//Verificar se a sessão não já está aberta.
    session_start();
  }

    //verifica se o botão exite.
    if(isset($_POST['btn-cadastrar-nivel'])){

        require_once('../../bd/conexao.php');
        $conexao = conexaoMysql();

        if( strtoupper($_POST['btn-cadastrar-nivel']) == "CADASTRAR" ){

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
        }else if( strtoupper($_POST['btn-cadastrar-nivel']) == "EDITAR" ){
            //Editar nivel

            $nomeNivel = $_POST['nomeNivel'];
            

            $sqlUpdate = "update niveis set nome='".$nomeNivel."' where id = ".$_SESSION['idnivel'];
            
            mysqli_query($conexao, $sqlUpdate);
            
            if($_POST['adm_conteudo'] == 1){

                $adm_conteudo = $_POST['adm_conteudo'];

                $sqlSelectNivel = "select niveis.id from niveis where nome ='".$nomeNivel."'";

                $executarEdicaoNivel = mysqli_query($conexao, $sqlSelectNivel);
                
                if($rsIdNivel = mysqli_fetch_array($executarEdicaoNivel)){

                    $sqlAtualizarMenuAdmConteudo = "update nivel_menu set id_menu ='".$adm_conteudo."' where id_nivel =".$rsIdNivel['id'];

                    if(mysqli_query($conexao, $sqlAtualizarMenuAdmConteudo)){
                        header('location:../adm-users.php');
                        
                    }else{
                        echo("erro no scrip de update de menus");
            
                    }
                }

            }if($_POST['adm_contato'] == 2){

                $adm_contatos = $_POST['adm_contato'];

                //script que seleciona o nível que acabou de ser criado.
                $sqlNivel = "select niveis.id from niveis where nome = '".$nomeNivel."'";
                
                $idNivel = mysqli_query($conexao, $sqlNivel);
                
                if($rsIdNivel = mysqli_fetch_array($idNivel)){

                    $sqlAdmUser = "update nivel_menu set id_menu='".$adm_usuarios."' where id_nivel =".$rsIdNivel['id'];

                    if(mysqli_query($conexao, $sqlAdmUser)){
                        header('location:../adm-users.php');

                    }else{
                        echo("erro2");

                    }
                }
            }elseif($_POST['adm_users'] == 3){

                $adm_usuarios = $_POST['adm_users'];

                //script que seleciona o nível que acabou de ser criado.
                $sqlNivel = "select niveis.id from niveis where nome = '".$nomeNivel."'";
                
                $idNivel = mysqli_query($conexao, $sqlNivel);
                
                if($rsIdNivel = mysqli_fetch_array($idNivel)){

                    $sqlAdmContato = "update nivel_menu set id_menu='".$adm_contatos."' where id_nivel =".$rsIdNivel['id'];
                    
                    if(mysqli_query($conexao, $sqlAdmContato)){
                        header('location:../adm-users.php');

                    }else{
                        echo("erro2");
                        
                    }
                }
            }
        }
    }

?>