<?php
    //declaração de variaveis e array
    
    $nome = (String) "";
    $email = (String) "";
    $data_nasc = (String) "";
    $senha = (String) "";
    $setor = 0;
    $nivel = 0;
    $botao = (String)"CADASTRAR";
    $botaoNivel = (String)"CADASTRAR";
    $title = (String)"CADASTRAR NOVO USUARIO";
    $titleNivel = (String) "CRIAR NOVO NIVEL";

    $modo = (String)"";
    $nomeNivel = (String)"";
    $idmenu = (int) 0;
    $disabled = (String)"";

    $selectedAdmConteudo = "";
    $selectedAdmContato = "";
    $selectedAdmUsuarios = "";

    $sombraOffAdmConteudo = "adm-conteudo";
    $sombraOffAdmContato = "adm-contato";
    $sombraOffAdmUsuario= "adm-user";

    $imgAtivar = "switch_on.png";
    $imgDesativar = "switch_off.png";

    $status = (String) "";

    $permissoes = array ();


//verificação para entrar no modo de edição de usuarios
    if(isset($_GET['modo'])){

        if(($_GET['modo']) == "editar"){

            //startando sessão
            if (session_status() != PHP_SESSION_ACTIVE) {//Verificar se a sessão não já está aberta.
                session_start();
              }
              //conexao com o banco
            require_once('../bd/conexao.php');
            $conexao = conexaoMysql();

            $id = $_GET['id'];

            //mudando o valor da variavel para adicionado um disabled no menu em que o usuario nao tem permissão
            $disabled = "disabled";
            
            //criando variavel de sessao para o update
            $_SESSION['id_registro'] = $_GET['id'];
           
            //query para trazer informaçoes sobre o usuario, o setor em que foi cadastrado e o nivel de permissao do mesmo
            //estao sendo relacionadas 3 tabelas (usuarios, setor, niveis)
            $trazerInfo = "select usuarios.*, setores.nome as setor, niveis.nome as nivel from usuarios inner join
            setores on usuarios.idsetor = setores.id inner join niveis on usuarios.idnivel = niveis.id where usuarios.id = ".$id;

            $select = mysqli_query($conexao, $trazerInfo);

            if($rsEditar = mysqli_fetch_array($select)){
            //carregando as informações retornadas do array em variaveis
                $nome = $rsEditar['nome'];
                $email = $rsEditar['email'];
                $senha = $rsEditar['senha'];
                $data_nasc = $rsEditar['dt_nasc'];
                $id_nivel = $rsEditar['idnivel'];
                $id_setor = $rsEditar['idsetor'];
                $setor = $rsEditar['setor'];
                $nivel = $rsEditar['nivel'];

                //mudando o estado do botao e do titulo do formulario
                $botao = "EDITAR";
                $title = "EDITAR USUARIO";

            }
            //verificação para entrar no modo de edição de nivel
        }elseif(($_GET['modo']) == 'editarnivel'){

            require_once('../bd/conexao.php');
            $conexao = conexaoMysql();


            $idnivel = $_GET['idnivel'];

            //selecionando registro selecionado para editar
            $trazerInfoNivel = "select niveis.nome, niveis.id from niveis where niveis.id =".$idnivel;

            $executar = mysqli_query($conexao, $trazerInfoNivel);

            //trazendo informações em array para realizar a consulta dos menus em que o nivel selecionado tem.
            if($rsEditarNivel = mysqli_fetch_array($executar)){

                if (session_status() != PHP_SESSION_ACTIVE) {//Verificar se a sessão não já está aberta.
                    session_start();
                  }

                $nomeNivel = $rsEditarNivel['nome'];
                $idNivelConsulta = $rsEditarNivel['id'];

                $_SESSION['idnivel'] = $idNivelConsulta;
                $botaoNivel = "EDITAR";
                $titleNivel = "EDITAR NIVEL";
                
                //selecionando os menus que o nivel selecionado para edição possui
                $sqlPermissoes = "select menus.id from menus inner join
                nivel_menu on menus.id = nivel_menu.id_menu where nivel_menu.id_nivel =".$idNivelConsulta;

                $executarPermissoes = mysqli_query($conexao, $sqlPermissoes);

                while( $rsMenusId = mysqli_fetch_array($executarPermissoes)){
                //coloca todos os menus do nivel selecionado no array $permissoes
                    array_push($permissoes, $rsMenusId['id']);
                    
                }
               
                //mostrar quais permissoes aquele nivel possui, aplicando o efeito de selecionado naquele que o nivel possuir
                for($i = 0; $i < sizeof($permissoes); $i++){
                    if($permissoes[$i] == "1"){
                        $permissaoAdmConteudo = 1;
                        $selectedAdmConteudo = "checked";
                        $sombraOffAdmConteudo = "adm-conteudo-sombra-off";
                    }elseif($permissoes[$i] == "2"){
                        $permissaoAdmContato = 2;
                        $selectedAdmContato = "checked";
                        $sombraOffAdmContato = "adm-contato-sombra-off";
                    }elseif($permissoes[$i] == "3"){
                        $permissaoAdmUsuario = 3;
                        $selectedAdmUsuarios = "checked";
                        $sombraOffAdmUsuario = "adm-usuario-sombra-off";
                    }
                }
        
            }else {
                echo("erro ao executar scriptttt");
            }
            //modo ativar e desativar
        }elseif(($_GET['modo']) == 'status'){

            require_once('../bd/conexao.php');
            $conexao = conexaoMysql();
            $idDesativar = $_GET['idativo'];
            $estado = $_GET['estado'];
            $tabela = $_GET['tabela'];

            if($estado == 0)
                $estado = 1;
            elseif($estado == 1)
                $estado = 0;

            $sql = "update ".$tabela." set ativado =".$estado." where id =".$idDesativar;

            mysqli_query($conexao, $sql);
                
        }
    }
?>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <title>
            Delicia Gelada - CMS
        </title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" href="./css/cms-styles.css">
        <script src="js/jquery.js"></script>
        <script src="js/confirmacao.js"></script>
        <script>

            //Jquery para aplicar o efeito do menu bloqueado de acordo com o nivel de permissao do usuario
            $(document).ready(function(){
                let estado = true;
                
                $('#editar-senha').click(function(){

                    if( estado == true ){
                        $('.cadastroUsuarioInput-senha').removeAttr("disabled");
                        estado = false;
                    }else{
                        $('.cadastroUsuarioInput-senha').prop("disabled",'true');
                        estado = true;
                    }
                });
            });
        </script>
    </head>
    <body>
        <section id="cms">
            <div class="conteudo center">
                <?php
                    require_once('./modulos/cms-header.php');
                    ?>
                <div class="adm-users-estrutura">
                    <div class="cadastrarUsuarios">
                        <h1 class="titulo texto-center"><?=$title?></h1>
                        <form action="bd/salvar.php" method="post">
                            <div class="formularioCadastroUsuario center">
                                <div class="linhaFormularioCadastro">
                                    <div class="nomeDoCampo">
                                        nome
                                    </div>
                                    <div class="valorDoCampo">
                                        <input type="text" name="nomeUsuario" class="cadastroUsuarioInput" value="<?=$nome?>">
                                    </div>
                                </div>

                                <div class="linhaFormularioCadastro">
                                    <div class="nomeDoCampo">
                                        e-mail
                                    </div>
                                    <div class="valorDoCampo">
                                        <input type="email" name="emailUsuario" class="cadastroUsuarioInput" value="<?=$email?>">
                                    </div>
                                </div>

                                <div class="linhaFormularioCadastro">
                                    <div class="nomeDoCampo">
                                        senha
                                    </div>
                    
                                    <?php
                                    //traz a senha criptografada e dá ao usuario a opção de ativar o checkbox e alterar a senha antiga
                                    if(isset($_GET['modo'])){
                                        if($_GET['modo'] == 'editar'){
     
                                    ?>
                                    <div class="valorDoCampo">
                                        <input type="password" name="senhaUsuario" class="cadastroUsuarioInput-senha" <?=$disabled?> value="<?=$senha?>">
                                        Nova senha <input type="checkbox" name="ativar" id="editar-senha" value='ativo'>
                                    </div>
                                    <?php

                                        }else if($_GET['modo'] == 'status' || $_GET['modo'] == 'editarnivel'){
                                    ?>
                                    <div class="valorDoCampo">
                                        <input type="password" name="senhaUsuario" class="cadastroUsuarioInput-senha" <?=$disabled?> value="">
                                    </div>
                                    <?php
                                        }
                                    }else if (!isset($_GET['modo'])){
                                    ?>
                                    <div class="valorDoCampo">
                                        <input type="password" name="senhaUsuario" class="cadastroUsuarioInput-senha" <?=$disabled?> value="">
                                    </div>
                                    <?php
                                    }
                                    ?>
                                    
                                </div>

                                <div class="linhaFormularioCadastro">
                                    <div class="nomeDoCampo">
                                        data de nascimento
                                    </div>
                                    <div class="valorDoCampo">
                                        <input type="text" name="dtNascimentoUsuario" class="cadastroUsuarioInput" value="<?=$data_nasc?>">
                                    </div>
                                </div>

                                <div class="linhaFormularioCadastro">
                                    <div class="nomeDoCampo">
                                        Nivel
                                    </div>
                                    <div class="valorDoCampo">
                                        <select name="nivel" class="cadastroUsuarioInput">
                                                <?php
                                                //preenche o select do nivel quando o modo de edição for selecionado, trazendo o nivel que o usuario possui
                                                if(isset($_GET['modo'])){    
                                                    if($_GET['modo'] == 'editar'){
                                                        
                                                ?>

                                                <option value="<?=$id_nivel?>"><?=$nivel?></option>
                                               
                                                <?php
                                                    }
                                                }else{
                                                ?>

                                                <option value="">Selecione Nivel</option>
                                               
                                                <?php
                                                
                                                }
                                                    require_once('../bd/conexao.php');
                                                    $conexao = conexaoMysql();

                                                    $sql = "select * from niveis where ativado = 1";

                                                    $select = mysqli_query($conexao, $sql);
                                                //mostra todos os niveis cadastrados para serem escolhido no cadastro de usuario
                                                    while($rsNiveis = mysqli_fetch_array($select)){
                                                    
                                                    ?>
                                                    <option value="<?=$rsNiveis['id']?>"> 
                                                        <?=$rsNiveis['nome']?>
                                                    </option>
                                                <?php
                                                    }
                                                ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="linhaFormularioCadastro">
                                    <div class="nomeDoCampo">
                                        setor
                                    </div>
                                    <div class="valorDoCampo">
                                        <select name="setor" class="cadastroUsuarioInput">
                                            <?php
                                            //preenche o select do setor quando o modo de edição for selecionado, trazendo o setor que o usuario possui
                                            if(isset($_GET['modo'])){
                                                if($_GET['modo'] == 'editar'){
                                            ?>

                                            <option value="<?=$id_setor?>"> <?=$setor?> </option>
                                            
                                            <?php
                                                }
                                            }else{
                                            ?>

                                            <option value="">Selecione Setor</option>

                                            <?php

                                            }
                                                require_once('../bd/conexao.php');
                                                $conexao = conexaoMysql();

                                                $sql = "select * from setores";

                                                $select = mysqli_query($conexao, $sql);
                                             //mostra todos os setores cadastrados para serem escolhido no cadastro de usuario
                                                while($rsSetores = mysqli_fetch_array($select)){
                                                   
                                                ?>
                                                <option value="<?=$rsSetores['id']?>"> 
                                                    <?=$rsSetores['nome']?>
                                                </option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" value="<?=$botao?>" class="botao" name="btn-cadastrar">
                        </form>
                    </div>
                    <div class="decoracao">
                        <div class="borda-dashed">
                            <div class="separador center">
                                <img src="icon/separador.png" alt="separador">
                            </div>
                        </div>
                    </div>
                    <h2 class="sub-titulo texto-center margem-pequena-baixo">
                        Usuarios cadastrados
                    </h2>
                    <div class="usuarios-cadastrados center">
                        <div class="tabela-usuarios">
                            <div class="linha-tabela-usuarios table-head texto-branco">
                                <div class="coluna-tabela-usuarios">
                                    NOME
                                </div>
                                <div class="coluna-tabela-usuarios">
                                    EMAIL
                                </div>
                                <div class="coluna-tabela-usuarios">
                                    NIVEL
                                </div>
                                <div class="coluna-tabela-usuarios">
                                    OPÇÕES
                                </div>
                            </div>

                            <?php
                                
                                require_once('../bd/conexao.php');
                                $conexao = conexaoMysql();

                                $cor = (string) "";
                                $ativarZebrado = true;
                                //query para selecionar os usuarios cadastrados
                                $sql = "select usuarios.*,niveis.nome as nomesetor from usuarios inner join
                                        niveis on niveis.id = usuarios.idnivel";

                                $select = mysqli_query($conexao, $sql);
                                //traz em uma lista zebrada informações basicas sobre os usuarios cadastrados
                                while($rsConsulta = mysqli_fetch_array($select)){
                                    
                                    if($ativarZebrado == true){
                                        $cor = 'zebrado';
                                        $ativarZebrado = false;
                                    }else if($ativarZebrado == false){
                                        $cor = '';
                                        $ativarZebrado = true;
                                    }  

                                    if($rsConsulta['ativado'] == 1){
                                        $status = $imgAtivar;
                                    }elseif($rsConsulta['ativado'] == 0){
                                        $status = $imgDesativar;
                                    }
                            ?>
                            <div class="linha-tabela-usuarios <?=$cor?>">
                                <div class="coluna-tabela-usuarios">
                                    <?=$rsConsulta['nome']?>
                                </div>
                                <div class="coluna-tabela-usuarios">
                                    <?=$rsConsulta['email']?>
                                </div>
                                <div class="coluna-tabela-usuarios">
                                    <?=$rsConsulta['nomesetor']?>
                                </div>
                                <div class="coluna-tabela-usuarios">
                                    <a href="bd/delete-usuario.php?modo=excluir&id=<?=$rsConsulta['id']?>">
                                        <img src="icon/cancel.png" alt="icon_cancel" onclick="return confirm('Deseja realmente excluir esse registro')">
                                    </a>
                                    <a href="adm-users.php?modo=editar&id=<?=$rsConsulta['id']?>">
                                        <img src="icon/edit1.png" alt="icon_edit">
                                    </a>
                                    <a href="adm-users.php?modo=status&idativo=<?=$rsConsulta['id']?>&estado=<?=$rsConsulta['ativado']?>&tabela=usuarios">    
                                        <img src="icon/<?=$status?>" alt="icon_togle">
                                    </a>   
                                </div>
                            </div>
                            <?php
                                }
                            ?>
                        </div>
                    </div>

                    <div class="decoracao">
                        <div class="borda-dashed">
                            <div class="separador center">
                                <img src="icon/separador.png" alt="separador">
                            </div>
                        </div>
                    </div>
                    <form action="bd/salvarNivel.php" method="POST" class="formulario_nivel">
                        <div class="container_cadastro_nivel">
                            <div class="cadastrarNivel">

                                <h1 class="titulo texto-center"><?=$titleNivel?></h1>

                                <div class="formularioCadastroNivel center">
                                    <div class="linhaFormularioCadastro">
                                        <div class="nomeDoCampo"> 
                                            nome 
                                        </div>
                                        <div class="valorDoCampo">
                                            <input type="text" name="nomeNivel" class="cadastroUsuarioInput" value="<?=$nomeNivel?>">
                                        </div>
                                    </div>

                                    <div class="linhaFormularioCadastro">
                                        <div class="nomeDoCampo center"> 
                                            Permissões
                                        </div>
                                    </div>
                                    <?php
                                        require_once('../bd/conexao.php');
                                        $conexao = conexaoMysql();
                                        
                                        $sql = "select menus.* from menus";

                                        $select = mysqli_query($conexao, $sql);

                                        if(!isset($_GET['modo']))
                                        {
                                            //mostra os menus pre-cadastrados no banco para serem atribuidos aos niveis
                                            while($rsMenus = mysqli_fetch_array($select))
                                            {
                                    ?>
                                    <div class="linhaFormularioCadastrocheck">
                                        <div class="nomeDoCampo center"> 
                                            
                                            <?=$rsMenus['nome'];?> <input type="checkBox" name="<?=$rsMenus['nome'];?>" value="<?=$rsMenus['id']?>" id="icon<?=$rsMenus['id']?>">
                                            
                                        </div>
                                    </div>
                                    <?php
                                            }
                                        }
                                        else if(isset($_GET['modo']))
                                        {
                                            //ajutando o layout de acordo com o MODO 
                                            if($_GET['modo'] == "editarnivel" || $_GET['modo'] == "editar" || $_GET['modo'] == "status")
                                            {
                                    ?>
                                    <div class="linhaFormularioCadastrocheck">
                                        <div class="nomeDoCampo center"> 
                                             <input type="checkBox" name="adm_conteudo" value="1" id="icon1"<?=$selectedAdmConteudo?>>
                                        </div>
                                    </div>
                                    <div class="linhaFormularioCadastrocheck">
                                        <div class="nomeDoCampo center">   
                                             <input type="checkBox" name="adm_contato" value="2" id="icon2" <?=$selectedAdmContato?>>
                                        </div>
                                    </div>
                                    <div class="linhaFormularioCadastrocheck">
                                        <div class="nomeDoCampo center"> 
                                             <input type="checkBox" name="adm_user" value="3" id="icon3" <?=$selectedAdmUsuarios?>>
                                        </div>
                                    </div>
                                    <?php
                                            }
                                        }    
                                    ?>
                                    <label id="<?=$sombraOffAdmConteudo?>" for="icon1">
                                        ADMINISTRADOR DE CONTEUDO
                                        <img src="./icon/responsive.png" alt="adm">
                                    </label>
                                    <label id="<?=$sombraOffAdmContato?>" for="icon2">
                                        ADMINISTRADOR DE FALE CONOSCO
                                        <img src="./icon/customer-service.png" alt="adm-contato">
                                    </label>
                                    <label id="<?=$sombraOffAdmUsuario?>" for="icon3">
                                        ADMINISTRADOR DE USUARIOS
                                        <img src="./icon/boss.png" alt="adm">
                                    </label>
                                </div>
                                
                                    
                                <input type="submit" value="<?=$botaoNivel?>" class="botao center" name="btn-cadastrar-nivel">

                            </div>
                        </div>
                        <div class="container_niveis_cadastrados">
                            <h1 class="titulo texto-center">Niveis cadastrados</h1>
                            <div class="niveis_cadastrados">
                                <div class="linha-tabela-niveis table-head texto-branco">
                                    <div class="coluna-tabela-niveis">
                                        NOME
                                    </div>
                                    
                                    <div class="coluna-tabela-niveis">
                                        PERMISSÕES
                                    </div>

                                    <div class="coluna-tabela-niveis">
                                        OPÇÕES
                                    </div>
                                </div>
                                <?php
                                    $cor = (string) "";
                                    $ativarZebrado = true;
                                   
                                    $sql = "select niveis.nome,niveis.id,niveis.ativado from niveis";

                                    $select = mysqli_query($conexao, $sql);

                                    //traz em uma lista zebrada todos os niveis cadastrados, mostrando tambem o icone das permissões
                                    while($rsNiveisCadastrados = mysqli_fetch_array($select))
                                    {
                                        if($ativarZebrado == true){
                                            $cor = 'zebrado';
                                            $ativarZebrado = false;
                                        }else if($ativarZebrado == false){
                                            $cor = '';
                                            $ativarZebrado = true;
                                        }
                                    //mostra os niveis que estao ativados e desativados
                                        if($rsNiveisCadastrados['ativado'] == 1){
                                            $status = $imgAtivar;
                                        }elseif($rsNiveisCadastrados['ativado'] == 0){
                                            $status = $imgDesativar;
                                        }
                                ?>
                                <div class="linha-tabela-niveis <?=$cor?>">
                                    <div class="coluna-tabela-niveis">
                                        <?=$rsNiveisCadastrados['nome'];?>
                                    </div>
                                    
                                    <div class="coluna-tabela-niveis">
                                        <?php
                                        //query para selecionar o icone dos menus que o nivel possui
                                         $sqlMenus = "
                                         select menus.icone,menus.nome, niveis.nome,niveis.id as idnivel from menus 
                                         inner join nivel_menu on menus.id = nivel_menu.id_menu 
                                         inner join niveis on nivel_menu.id_nivel = niveis.id where niveis.nome ='".$rsNiveisCadastrados['nome']."'
                                         ";

                                         $selectMenus = mysqli_query($conexao, $sqlMenus);

                                         while($rsPermissoes = mysqli_fetch_array($selectMenus))
                                         {
                                        
                                        ?>

                                        <div class="img-menus">
                                            <img src="./bd/arquivos/<?=$rsPermissoes['icone']?>" alt="permissoes">
                                        </div>
                                        <?php

                                         }
                                        ?>
                                    </div>

                                    <div class="coluna-tabela-niveis">
                                    <a href="bd/delete-niveis.php?modo=excluir&id=<?=$rsNiveisCadastrados['id']?>" onclick="return confirm('ATENÇÃO excluir o nivel de um usuario ja cadastrado acarretará na exlcusão do mesmo, deseja prosseguir?')">
                                        <img src="icon/cancel.png" alt="icon_cancel">
                                    </a>
                                    <a href="adm-users.php?modo=editarnivel&idnivel=<?=$rsNiveisCadastrados['id']?>">
                                        <img src="icon/edit1.png" alt="icon_edit">
                                    </a>

                                    <a href="adm-users.php?modo=status&idativo=<?=$rsNiveisCadastrados['id']?>&estado=<?=$rsNiveisCadastrados['ativado']?>&tabela=niveis">
                                        <img src="icon/<?=$status?>" alt="icon_togle">
                                    </a>
                                    </div>
                                </div>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </form>
                </div>
                <?php
                    require_once('./modulos/cms-footer.php');
                ?>
            </div>
            
        </section>
        
        
    </body>
</html>
