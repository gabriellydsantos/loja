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
include_once "conect.php";
?>
<main>
    <div class="container">
        <div class="conteudo_central">
            <h2>Cadastro de Produtos</h2>
            <form action="processa_cadastro_produto.php" method="post"> 
                <div>
                    <label for="nome">Nome do Produto</label>
                    <input type="text" name="nome" id="nome" required>
                </div>

                <div>
                    <label for="descricao">Descrição</label>
                    <textarea name="descricao" id="descricao" rows="4" cols="50"></textarea>
                </div>

                <div>
                    <label for="preco">Preço</label>
                    <input type="number" name="preco" id="preco" step="0.01" required>
                </div>

                <div>
                    <button type="submit">Cadastrar Produto</button>
                </div>
            </form>
        </div>
    </div>
</main>
</body>
</html>

<?php
// Inclui o arquivo de conexão com o banco de dados
include_once "conect.php";

// Verifica se o formulário foi enviado
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Inicializa a variável de erro
    $erro = "";

    // Recebe os dados do formulário
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];

    // Validação dos campos (pode ser expandida conforme necessário)
    if(empty($nome) || empty($preco)) {
        $erro = "Por favor, preencha todos os campos obrigatórios.";
    }

    // Se não houver erros, insere os dados no banco de dados
    if(empty($erro)) {
        // Prepara a consulta SQL para inserir o produto
        $inserir_produto = $conexao->prepare("INSERT INTO produtos (nome, descricao, preco) VALUES (:nome, :descricao, :preco)");

        // Associa os parâmetros da consulta aos valores recebidos do formulário
        $inserir_produto->bindParam(':nome', $nome);
        $inserir_produto->bindParam(':descricao', $descricao);
        $inserir_produto->bindParam(':preco', $preco);

        // Executa a consulta
        if($inserir_produto->execute()) {
            // Mensagem de sucesso
            echo '<div class="alert-success">Produto cadastrado com sucesso!</div>';
        } else {
            // Mensagem de erro ao inserir no banco de dados
            echo '<div class="alert-danger">Erro ao cadastrar o produto. Por favor, tente novamente.</div>';
        }
    } else {
        // Exibe mensagem de erro caso haja algum problema com os dados do formulário
        echo '<div class="alert-danger">'.$erro.'</div>';
    }
} else {
    // Se o formulário não foi enviado via POST, redireciona para a página de cadastro de produtos
    header("Location: cadastro_produtos.php");
    exit(); // Encerra o script após o redirecionamento
}
?>

