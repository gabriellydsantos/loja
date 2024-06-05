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
                   <?php
            $sql = "SELECT * FROM produto p JOIN categoria c ON p.id_cat = c.id_cat;";
            $select = $conexao->prepare($sql); 
            $select->execute();
            
            while($rs = $select->fetch(PDO::FETCH_ASSOC)) {
                $id_produto = $rs['id_produto'];
                $nome = $rs['nome_produto'];
                $descricao = $rs['descricao_produto'];
                $valor = $rs['valor'];

                echo '<div class="card">
                        <div class="card-header">
                            <img src="img/a54.jpeg" alt="' . $nome . '" width="150">
                            ' . $nome . '
                        </div>
                        <div class="card-body">
                            ' . $descricao . '
                        </div>
                        <div class="card-footer">
                            ' . $valor . '
                        </div>
                        <div id="btnComprar">
                            <button>Comprar</button>
                        </div>
                    </div>';
            }
        ?>


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
