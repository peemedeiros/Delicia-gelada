<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="css/cms-styles.css">
        <title>Delicia Gelada - CMS</title>
    </head>
    <body>
        <section id="cms">
            <div class="conteudo center">
                <?php 
                    require_once('./modulos/cms-header.php');
                ?>
                <div class="lojas">
                    <form action="" name="frm-lojas" method="POST">    
                        <div class="formulario-cadastro-lojas">
                            <h5>NOME DA LOJA</h5>
                            <input type="text" name="txt-loja" id="txtLoja">

                            <div class="endereco-form">
                                <div class="campo-endereco-form">
                                    <h5>CEP</h5>
                                    <input type="text" name="txt-cep" id="txtCep">
                                </div>

                                <div class="campo-endereco-form-rua">
                                    <h5>Logradouro</h5>
                                    <input type="text" name="txt-logradouro" id="txtLogradouro">
                                </div>
                                <div class="campo-endereco-form-bairro">
                                    <h5>Bairro</h5>
                                    <input type="text" name="txt-bairro" id="txtBairro">
                                </div>
                                <div class="campo-endereco-form-estado">
                                    <h5>Numero</h5>
                                    <input type="text" name="txt-numero" id="txtNumero">
                                </div>
                                <div class="campo-endereco-form-bairro">
                                    <h5>Cidade</h5>
                                    <input type="text" name="txt-cidade" id="txtCidade">
                                </div>
                                <div class="campo-endereco-form-estado">
                                    <h5>UF</h5>
                                    <input type="text" name="txt-estado" id="txtEstado">
                                </div>
                                <div class="campo-endereco-form-url">
                                    <h5>Google Maps URL</h5>
                                    <input type="url" name="url-maps" id="txtMaps">
                                </div>
                                <div class="btn-lojas">
                                    <input type="submit" value="CADASTRAR" class="botao">
                                </div>
                            </div>
                        </form>
                        </div>
                    <div class="lojas-layout">
                        <div class="header-layout"> NAV BAR</div>
                        <div class="lojas-cards-layout">
                            <h5>LOJA</h5>
                        </div>
                        
                    </div>
                </div>

                <?php
                    require_once('./modulos/cms-footer.php');
                ?>
            </div>
        </section>
    </body>
</html>