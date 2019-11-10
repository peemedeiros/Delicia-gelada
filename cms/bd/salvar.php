<?php

// $nome = (String) "";
// $email = (String) "";
// $data_nasc = (String) "";
// $senha = (String) "";
// $setor = 0;
// $nivel = 0;
// $botao = (String)"INSERIR";

if (session_status() != PHP_SESSION_ACTIVE) {//Verificar se a sessão não já está aberta.
    session_start();
  }

if(isset($_POST['btn-cadastrar'])){

    require_once('conexao.php');
    $conexao = conexaoMysql();

    $nome = $_POST['nomeUsuario'];
    $email = $_POST['emailUsuario'];
    $senha = $_POST['senhaUsuario'];
    $dt_nasc = $_POST['dtNascimentoUsuario'];
    $idsetor = $_POST['setor'];
    $idnivel = $_POST['nivel'];

    
    if(strtoupper($_POST['btn-cadastrar']) == "CADASTRAR"){
        $sql = "insert into usuarios(nome,email,senha,dt_nasc,idsetor,idnivel)
        values('".$nome."','".$email."','".$senha."','".$dt_nasc."',".$idsetor.",".$idnivel.")";

    }elseif(strtoupper($_POST['btn-cadastrar']) == "EDITAR"){
        $sql = "update usuarios set nome='".$nome."',
        email='".$email."',senha='".$senha."',
        dt_nasc='".$dt_nasc."',idsetor=".$idsetor.",
        idnivel=".$idnivel." where id = ".$_SESSION['id_registro']."
        ";
    }
    
    if(mysqli_query($conexao, $sql))
        header('location:../adm-users.php');
    else
        echo("erro ao executar o script");
        echo($sql);
}






// elseif($_POST['modo'] == ''){

//         require_once('conexao.php');
//         $conexao = conexaoMysql();

//         $nome = $_POST['nomeUsuario'];
//         $email = $_POST['emailUsuario'];
//         $senha = $_POST['senhaUsuario'];
//         $dt_nasc = $_POST['dtNascimentoUsuario'];
//         $idsetor = $_POST['setor'];
//         $idnivel = $_POST['nivel'];

        



//         $sql = "insert into usuarios(nome,email,senha,dt_nasc,idsetor,idnivel)
//         values('".$nome."','".$email."','".$senha."','".$dt_nasc."',".$idsetor.",".$idnivel.")";
//         echo($sql);

//         if(mysqli_query($conexao, $sql))
//             header('location:../adm-users.php');
//         else
//             echo("erro ao executar o script");
//     }
        
// }

// 