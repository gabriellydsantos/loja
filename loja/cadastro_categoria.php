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
?>
<div class="container">
    <div class="conteudo_central">
        <form action="" method="post">
            <div>
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome">
            </div>
            <div>
                <button type="submit">Cadastrar</button>
            </div>
        </form>
        <?php
        if($_SERVER['REQUEST_METHOD']== 'POST'){
            $categoria = $_POST['nome'];
            $insert = $conexao->prepare("INSERT INTO categoria(nome_categoria) VALUES (:categoria)");
            $insert->bindParam(':categoria', $categoria);
            if($insert->execute()){
                echo '<div class="alert-success">Categoria cadastrada com sucesso</div>';
            } else {
                echo '<div class="alert-danger">Erro ao cadastrar categoria</div>';
            }
        }
        ?>
    </div>
</div>
    </main>
    <?php
include_once "footer.php";

?>
</body>
</html>

Fatal error: Uncaught PDOException: SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry '0' for key 'PRIMARY' in C:\xampp\htdocs\loja\cadastro_categoria.php:31 Stack trace: #0 C:\xampp\htdocs\loja\cadastro_categoria.php(31): PDOStatement->execute() #1 {main} thrown in C:\xampp\htdocs\loja\cadastro_categoria.php on line 31