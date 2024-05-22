<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de categoria</title>
    <link rel="stylesheet" href="css/estilo_blue.css">
    <link rel="stylesheet" href="css/form_blue.css">
</head>

<body>
    <?php
    include_once "menu.php";
    include_once "conexao.php";
    $id_foto = $_GET['id'] ?? 0;
    ?>

    <main>
        <div class="container">
            <div class="conteudo_central">
                <form action="cadastrarFoto" method="post">
                    <input type="file" name="foto" id="foto">
                    <button type="submit">Enviar</button>
                </form>


                <?php
                ?>

            </div>
        </div>

    </main>
    <?php
include_once "footer.php"
    ?>
    
        
    </body>
    </html>