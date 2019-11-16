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
                

                <?php
                    require_once('./modulos/cms-footer.php');
                ?>
            </div>
        </section>
    </body>
</html>