<?php
if(!isset($_SESSION)){

    session_start();

    if(isset($_POST['btnLogin'])){

        require_once('conexao.php');
        $conexao = conexaoMysql();
    
        $usuario = $_POST['txtUsuario'];
        $senha = $_POST['txtSenha'];
        
        if($usuario != "" && $senha != ""){
    
            $sql = "select usuarios.* from usuarios 
            where email='".$usuario."'
            and senha ='".$senha."'";
    
            $logar = mysqli_query($conexao, $sql);
    
            $rsUsuario = mysqli_fetch_array($logar);

            $_SESSION['nome'] = $rsUsuario['nome'];
    
            if($rsUsuario['email'] == $usuario && $rsUsuario['senha'] == $senha && $rsUsuario['ativado'] == 1){
    
                $sqlNivel ="select menus.* from nivel_menu 
                inner join menus on nivel_menu.id_menu = menus.id where nivel_menu.id_nivel =".$rsUsuario['idnivel']."";
    
                $permissoes = mysqli_query($conexao, $sqlNivel);
    
                while($rsPermissoes = mysqli_fetch_array($permissoes)){

                    $niveisPermissoes[] = $rsPermissoes['link'];

                }

                $_SESSION['menus'] = $niveisPermissoes;
                

                header('location: ../cms/'.$niveisPermissoes[0]);
            }else{
                echo("usuario ou senha incorretos ou o usuarios esta desativado");
            }
        }else{
            echo("Os campos de usuario e senha devem ser preenchidos");
        }
    }
}

?>