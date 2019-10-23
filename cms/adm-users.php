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
                        <form action="adm-users.php" method="get">
                            <div class="tipoDeUsuario center">
                                <div id="nivelAdm" class="nivelAdministrador" onclick="selecionado(this);">
                                    <div class="legenda" value="1">
                                        Administrador
                                    </div>
                                    <!-- <img src="./icon/boss.png" alt=""> -->
                                    <input type="radio" name="rdoNivel" id="ativarNivelAdm" value="A">
                                    <label for="ativarNivelAdm">
                                        <img src="./icon/boss.png" alt="boss">
                                    </label>
                                </div>

                                <div id="nivelContato" class="nivelAdministrador" onclick="selecionado(this);">
                                    <div class="legenda">
                                        Relacionamento com o cliente
                                    </div>
                                    <input type="radio" name="rdoNivel" id="ativarNivelContato" value="B">
                                    <label for="ativarNivelContato">
                                        <img src="./icon/customer-service.png" alt="contato">
                                    </label>
                                </div>

                                <div id="nivelConteudo" class="nivelAdministrador" onclick="selecionado(this);">
                                    <div class="legenda">
                                        Operador de conteudo
                                    </div>
                                    <input type="radio" name="rdoNivel" id="ativarNivelConteudo" value="C">
                                    <label for="ativarNivelConteudo">
                                        <img src="./icon/responsive.png" alt="conteudo">
                                    </label>
                                </div>
                            </div>

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
                                        setor
                                    </div>
                                    <div class="valorDoCampo">
                                        <select name="setor" class="cadastroUsuarioInput">
                                            <option value="">Selecione Setor</option>
                                            <option value="A">Administrativo</option>
                                            <option value="B">Comercial</option>
                                            <option value="C">Operacional</option>
                                            <option value="D">Externo</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" value="Cadastrar" class="botao">
                        </form>
                    </div>
                </div>
                <?php
                    require_once('./modulos/cms-footer.php');
                ?>
            </div>
        </section>
        
        
    </body>
</html>