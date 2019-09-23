<?php
    //verifica se houve um $_post
    if(isset($_POST['btn-enviar'])){
        //importa o arquivo de conexao;
        require_once('conexao.php');
        
        //chama a função que faz a conexão com o banco de dados;
        $conexao = conexaoMysql();
		
        //resgatando os dados informados pelo usuário
        $nome = $_POST['txt-nome'];
        $telefone = $_POST['txt-telefone'];
        $celular = $_POST['txt-celular'];
		$email = $_POST['txt-email'];
        $page = $_POST['txt-page'];
		$facebook = $_POST['txt-facebook'];
		$criticas = $_POST['txt-criticas'];
		$mensagem = $_POST['txt-mensagem'];
		$sexo = $_POST['rdoSexo'];
		$profissao =$_POST['txt-profissao'];
		
        
        $sql = "
                insert into contatos (nome,telefone,celular,email,
                homepage,facebook,criticas,mensagem,sexo,profissao)
                values('".$nome."','".$telefone."','".$celular."',
				'".$email."','".$page."','".$facebook."','".$criticas."',
                '".$mensagem."','".$sexo."','".$profissao."')
                ";
        
        //Executa um script no banco de dados (se o script der certo iremos redirecionar para a página de cadastro, se não mostrar mensagem de erro)
		
        if(mysqli_query($conexao, $sql))
            //redireciona para uma determinada página
            header('location:../cadastrou.php');
        else{
            echo(" Erro ao executar o script no banco");
        }
    }
?>