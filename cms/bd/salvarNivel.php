<?php
if (session_status() != PHP_SESSION_ACTIVE) {//Verificar se a sessão não já está aberta.
    session_start();
  }

    //verifica se o botão exite.
    if(isset($_POST['btn-cadastrar-nivel'])){

        require_once('../../bd/conexao.php');
        $conexao = conexaoMysql();

        if( strtoupper($_POST['btn-cadastrar-nivel']) == "CADASTRAR" ){
        
        //cadastra o nível
        $nomeNivel = $_POST['nomeNivel'];
        
        $adm_conteudo = $_POST['adm_conteudo'];
        $adm_contatos = $_POST['adm_contato'];
        $adm_usuarios = $_POST['adm_user'];

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
                       
                    }
                }

            }else{
                echo("erro ao executar o script");
            }
        }else if( strtoupper($_POST['btn-cadastrar-nivel']) == "EDITAR" ){
            $nomeNivel = $_POST['nomeNivel'];
            
            //Editar nivel

            $sqlUpdate = "update niveis set nome='".$nomeNivel."' where id = ".$_SESSION['idnivel'];
            
            mysqli_query($conexao, $sqlUpdate);
            
            
            if($_POST['adm_conteudo'] == 1){

                $adm_conteudo = $_POST['adm_conteudo'];

                $sqlSelectNivel = "select niveis.id from niveis where nome ='".$nomeNivel."'";

                $executarEdicaoNivel = mysqli_query($conexao, $sqlSelectNivel);
                
                if($rsIdNivel = mysqli_fetch_array($executarEdicaoNivel)){

                    $sqlAtualizarMenuAdmConteudo = "insert into nivel_menu (id_nivel, id_menu) values (".$rsIdNivel['id'].",".$adm_conteudo.")";

                    if(mysqli_query($conexao, $sqlAtualizarMenuAdmConteudo)){
                        header('location:../adm-users.php');
                        
                    }else{
                        echo("erro no scrip de update de menus");
            
                    }
                }
            }else if($_POST['adm_conteudo'] == 0){

                var_dump($_POST['adm_conteudo']);

                $sqlSelectNivel = "select niveis.id from niveis where nome ='".$nomeNivel."'";

                $executarEdicaoNivel = mysqli_query($conexao, $sqlSelectNivel);
                
                if($rsIdNivel = mysqli_fetch_array($executarEdicaoNivel)){

                    $sqlAtualizarMenuAdmConteudo = "delete from nivel_menu where id_menu = 1 and id_nivel = ".$rsIdNivel['id']."";

                    if(mysqli_query($conexao, $sqlAtualizarMenuAdmConteudo)){
                        header('location:../adm-users.php');
                        
                    }else{
                        echo("erro no scrip do delete menus");
            
                    }
                }
            }


            if($_POST['adm_contato'] == 2){

                $adm_contato = $_POST['adm_contato'];

                $sqlEditarNivelAdmContato = "select niveis.id from niveis where nome ='".$nomeNivel."'";

                $executarEdicaoNivel = mysqli_query($conexao, $sqlEditarNivelAdmContato);
                
                if($rsIdNivel = mysqli_fetch_array($executarEdicaoNivel)){

                    $sqlAtualizarMenuAdmContato = "insert into nivel_menu (id_nivel, id_menu) values (".$rsIdNivel['id'].",".$adm_contato.")";

                    if(mysqli_query($conexao, $sqlAtualizarMenuAdmContato)){
                        header('location:../adm-users.php');
                        
                    }else{
                        echo("erro no scrip de update de menus");
            
                    }
                }
            }else if($_POST['adm_contato'] == 0){

                var_dump($_POST['adm_contato']);

                $sqlEditarNivelAdmContato = "select niveis.id from niveis where nome ='".$nomeNivel."'";

                $executarEdicaoNivel = mysqli_query($conexao, $sqlEditarNivelAdmContato);
                
                if($rsIdNivel = mysqli_fetch_array($executarEdicaoNivel)){

                    $sqlAtualizarMenuAdmContato = "delete from nivel_menu where id_menu = 2 and id_nivel = ".$rsIdNivel['id']."";

                    if(mysqli_query($conexao, $sqlAtualizarMenuAdmContato)){
                        header('location:../adm-users.php');
                        
                    }else{
                        echo("erro no scrip do delete menus");
            
                    }
                }
            }

            if($_POST['adm_user'] == 3){

                $adm_user = $_POST['adm_user'];

                $sqlEditarNivelAdmUser = "select niveis.id from niveis where nome ='".$nomeNivel."'";

                $executarEdicaoNivel = mysqli_query($conexao, $sqlEditarNivelAdmUser);
                
                if($rsIdNivel = mysqli_fetch_array($executarEdicaoNivel)){

                    $sqlAtualizarMenuAdmUser = "insert into nivel_menu (id_nivel, id_menu) values (".$rsIdNivel['id'].",".$adm_user.")";

                    if(mysqli_query($conexao, $sqlAtualizarMenuAdmUser)){
                        header('location:../adm-users.php');
                        
                    }else{
                        echo("erro no scrip de update de menus");
            
                    }
                }
            }else if($_POST['adm_user'] == 0){

                $sqlEditarNivelAdmUser = "select niveis.id from niveis where nome ='".$nomeNivel."'";

                $executarEdicaoNivel = mysqli_query($conexao, $sqlEditarNivelAdmUser);
                
                if($rsIdNivel = mysqli_fetch_array($executarEdicaoNivel)){

                    $sqlAtualizarMenuAdmUser = "delete from nivel_menu where id_menu = 3 and id_nivel = ".$rsIdNivel['id']."";

                    if(mysqli_query($conexao, $sqlAtualizarMenuAdmUser)){
                        header('location:../adm-users.php');
                        
                    }else{
                        echo("erro no scrip do delete menus");
            
                    }
                }
            }
        }
    }

?>