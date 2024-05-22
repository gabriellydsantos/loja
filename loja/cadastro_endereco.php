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
                <form method="post">
                    <label for="cep">CEP:</label>
                    <input type="text" name="cep" id="cep">
                    <button type="submit">VER</button>
                </form>

                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $cep = $_POST['cep'];
                    $url = "https://viacep.com.br/ws/$cep/json/";
                    $json = file_get_contents($url);

                    $dados = json_decode($json, true);
                    echo "<pre>";
                    var_dump($dados);

                    echo '<div class="card">';
                    echo $dados['logradouro'] . ' - ' . $dados['localidade'] . "/" . $dados['uf'];
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </main>
    
</body>
</html>
