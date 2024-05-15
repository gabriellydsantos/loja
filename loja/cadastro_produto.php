<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo_blue.css">
    <link rel="stylesheet" href="css/form_blue.css">     
   
    <title>Cadastro de Produtos</title>
</head>
<body>

<?php
include_once "menu.php";
include_once "conexao.php";
?>
<main>
    <div class="container">
        <div class="conteudo_central">
            <form action="" method="post"> 
                <div>
                    <label for="nome">Nome do Produto</label>
                    <input type ="text" name="nome" id="nome">
                </div>

                <div>
                    <label for="descricao">Descrição</label>
                    <textarea name="descricao" id="descricao"></textarea>
                </div>

                <div>
                    <label for="preco">Preço</label>
                    <input type ="text" name="preco" id="preco">
                </div>

                <div>
                    <label for="estoque">Estoque</label>
                    <input type ="text" name="estoque" id="estoque">
                </div>

                <div>
                    <button type="submit">Cadastrar Produto</button>
                </div>
            </form>
            <?php
            include_once "conexao.php";

            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $erro = "";

                $nome = $_POST['nome'];
                $descricao = $_POST['descricao'];
                $preco = $_POST['preco'];
                $estoque = $_POST['estoque'];

                // Verifica se o produto já existe no banco pelo nome
                $selectProduto = $conexao->prepare("SELECT nome FROM produtos WHERE nome = :nome");
                $selectProduto->bindParam(':nome', $nome);
                $selectProduto->execute();

                if($selectProduto->fetch(PDO::FETCH_ASSOC)) {
                    $erro = "Produto {$nome} já cadastrado";
                }

                if($erro) {
                    echo '<div class="alert-danger">Erro: '.$erro.'</div>';
                } else {
                    $cadastra = $conexao->prepare("INSERT INTO produtos (nome, descricao, preco, estoque) VALUES (:nome, :descricao, :preco, :estoque)");
                    $cadastra->bindParam(':nome', $nome);
                    $cadastra->bindParam(':descricao', $descricao);
                    $cadastra->bindParam(':preco', $preco);
                    $cadastra->bindParam(':estoque', $estoque);
                    if($cadastra->execute()) {
                        echo '<div class="alert-success">Produto cadastrado com sucesso!</div>';
                    } else {
                        echo '<div class="alert-danger">Erro ao cadastrar o produto.</div>';
                    }
                }
            }
            ?>
        </div>
    </div>
</main>
</body>
</html>
