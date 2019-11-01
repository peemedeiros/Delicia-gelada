
<html>
    <head>
        <title>
            Delicia Gelada - CMS
        </title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" href="./css/cms-styles.css">
        <script src="js/jquery.js"></script>
        <script>
             $(document).ready(function(){
                 $('.nivelAdministrador').click(function(){
                    $('.nivelAdministrador').css({border:'none'});
                    $(this).css({border:'solid 5px #00ff00'});
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
                        <h1 class="titulo texto-center">Criar novo usuario</h1>
                        <h1 class="sub-titulo texto-center">Nivel do usuario</h1>
                        <form action="bd/inserir.php" method="post">
                            <div class="formularioCadastroUsuario center">
                                <div class="linhaFormularioCadastro">
                                    <div class="nomeDoCampo">
                                        nome
                                    </div>
                                    <div class="valorDoCampo">
                                        <input type="text" name="nomeUsuario" class="cadastroUsuarioInput">
                                    </div>
                                </div>

                                <div class="linhaFormularioCadastro">
                                    <div class="nomeDoCampo">
                                        e-mail
                                    </div>
                                    <div class="valorDoCampo">
                                        <input type="email" name="emailUsuario" class="cadastroUsuarioInput">
                                    </div>
                                </div>

                                <div class="linhaFormularioCadastro">
                                    <div class="nomeDoCampo">
                                        senha
                                    </div>
                                    <div class="valorDoCampo">
                                        <input type="password" name="senhaUsuario" class="cadastroUsuarioInput">
                                    </div>
                                </div>

                                <div class="linhaFormularioCadastro">
                                    <div class="nomeDoCampo">
                                        data de nascimento
                                    </div>
                                    <div class="valorDoCampo">
                                        <input type="text" name="dtNascimentoUsuario" class="cadastroUsuarioInput">
                                    </div>
                                </div>

                                <div class="linhaFormularioCadastro">
                                    <div class="nomeDoCampo">
                                        Nivel
                                    </div>
                                    <div class="valorDoCampo">
                                        <select name="nivel" class="cadastroUsuarioInput">
                                                <option value="">Selecione Nivel</option>
                                                <?php
                                                    require_once('../bd/conexao.php');
                                                    $conexao = conexaoMysql();

                                                    $sql = "select * from niveis";

                                                    $select = mysqli_query($conexao, $sql);

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
                                            <option value="">Selecione Setor</option>
                                            <?php
                                                require_once('../bd/conexao.php');
                                                $conexao = conexaoMysql();

                                                $sql = "select * from setores";

                                                $select = mysqli_query($conexao, $sql);

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
                            <input type="submit" value="Cadastrar" class="botao" name="btn-cadastrar">
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
                                    SETOR
                                </div>
                            </div>

                            <?php

                                require_once('../bd/conexao.php');
                                $conexao = conexaoMysql();
                                
                                $sql = "select usuarios.*,setores.nome as nomesetor from usuarios inner join
                                        setores on setores.id = usuarios.idsetor";

                                $select = mysqli_query($conexao, $sql);

                                while($rsConsulta = mysqli_fetch_array($select))
                                {  
                            ?>
                            <div class="linha-tabela-usuarios">
                                <div class="coluna-tabela-usuarios">
                                    <?=$rsConsulta['nome']?>
                                </div>
                                <div class="coluna-tabela-usuarios">
                                    <?=$rsConsulta['email']?>
                                </div>
                                <div class="coluna-tabela-usuarios">
                                    <?=$rsConsulta['nomesetor']?>
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
                    <form action="bd/inserirNivel.php" method="POST">
                        <div class="cadastrarNivel">

                            <h1 class="titulo texto-center">Criar novo nível</h1>

                            <div class="formularioCadastroNivel center">
                                <div class="linhaFormularioCadastro">
                                    <div class="nomeDoCampo"> 
                                        nome 
                                    </div>
                                    <div class="valorDoCampo">
                                        <input type="text" name="nomeNivel" class="cadastroUsuarioInput">
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

                                    while($rsMenus = mysqli_fetch_array($select))
                                    {
                                ?>
                                <div class="linhaFormularioCadastro">
                                    <div class="nomeDoCampo center"> 
                                        <?=$rsMenus['nome'];?> <input type="checkBox" name="<?=$rsMenus['nome'];?>" value="<?=$rsMenus['id']?>" class="checkBox">
                                    </div>
                                </div>
                                <?php
                                    }
                                ?>

                            </div>
                                
                            <input type="submit" value="Cadastrar" class="botao center" name="btn-cadastrar-nivel">

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
