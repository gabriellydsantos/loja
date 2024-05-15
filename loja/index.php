<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="css/estilo_blue.css">
    <link rel="stylesheet" href="css/form_blue.css">
</head>
 
<body>
    <?php
    include_once "menu.php";
    include_once "conexao.php";
    ?>
    <main>
        <div class="container">
            <!-- DIALOG -->
            <dialog class="avisos" id="avisos">
                Produto adicionado com sucesso!
            </dialog>
            <!-- fecha DIALOG -->
            <div class="conteudo_central">
                <!-- Carrossel de imagens -->
                <div class="slides">
                    <div class="item">
                        <img src="img/fundo.jpeg" alt="Samsung A54">
                    </div>
                    <div class="item">
                        <img src="img/fundo2.jpeg" alt="Samsung A54">
                    </div>
                    <div class="item">
                        <img src="img/fundo3.jpeg" alt="Samsung A54">
                    </div>
                    <div class="item">
                        <img src="img/fundo4.jpeg" alt="Samsung A54">
                    </div>
                </div>
                <!-- fecha Carrossel de imagens -->
                <form method="POST">
                    <div class="filtros">
                        <div>
                            <input type="text" id="nome" name="nome" placeholder="Por nome">
                        </div>
                        <div>
                            <select id="categoria" name="categoria">
                                <option value="">Categoria</option>
                            </select>
                        </div>
                        <div>
                            <input type="text" id="valor_max" name="valor_max" placeholder="Até R$">
                        </div>
                        <div>
                            <button type="submit">Filtrar</button>
                        </div>
                    </div>
                </form>
                <div class="produtos">
                    <div class="card">
                        <div class="card-header">
 
                        </div>
                        <div class="card-body">
                           
                        </div>
                        <div class="card-footer">
                           
                        </div>
                        <div id="btnComprar">
                           
                        </div>
                    </div>
                </div>
            </div><!-- fecha conteudo-central -->
        </div><!-- fecha container -->
    </main><!-- fecha main -->
    <?php
    include_once "footer.php";
    ?>
    <script src="js/carrossel.js"></script>
    <script>
        const dialog = document.getElementById('avisos');
        setTimeout(() => dialog.open = false, 2000);
    </script>
</body>
 
</html>