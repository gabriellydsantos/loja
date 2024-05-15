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
            <h1> Cadastro de produtos </h1>
            <form action="" method="post">
                <div>
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome">
                </div>

                <div>
                    <label for="descricao">Descricão: </label>
                    <textarea name="descricao" id="descricao" cols="4" rows="90" style="width: 802px; height: 35px;"></textarea>

               
                <div>
                    <label for="Valor">Valor: </label>
                    <input type="text" name="valor" id="valor">
                </div>

                <div>
    
            <label for="caategoria">Categoria</label>
            <select name="categoria" id="categoria">
            <option value="">Selecione</option>

                    <?php
                    $busca = $conexao->prepare("SELECT * FROM categoria");
                    $busca->execute();
                    while ($opcpes = $busca ->fetch(PDO::FETCH_ASSOC)){
                        echo '<option value= "'.$opcpes['id_cat'].'">'.$opcoes
                        ['nome_categoria'].'</options>';
                    }

                    ?>
                    </select>
                </div>
                <div>
                    <button type="submit">Cadastrar</button>
                </div>
            </form>

            <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $nome = $_POST['nome'];
                $descricao = $_POST['descricao'];
                $valor = $_POST['valor'];
                $categoria = $_POST['categoria'];

                $insert = $conexao->prepare("INSERT INTO produto(nome_produto, descricao_produto, valor, id_cat) VALUES(:nome, :descricao, :valor, :categoria)");
                $insert->bindParam(':nome', $nome);
                $insert->bindParam(':descricao', $descricao);
                $insert->bindParam(':valor', $valor);
                $insert->bindParam(':categoria', $categoria);

                if ($insert->execute()) { 
                    echo '<div class="alert-success">Produto cadastrado com sucesso!</div>';
                } else { 
                    echo '<div class="alert-danger">Erro ao cadastrar</div>';
                }
            }
        
            ?>
        </div>
    </div>
    <main>
</body>
</html>
