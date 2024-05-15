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
            <div class="conteudo_central">
                <form action="" method="post">
                    <div>
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" id="nome">
                    </div>
                    <div>
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email">
                    </div>
                    <div>
                        <label for="cpf">CPF:</label>
                        <input type="text" name="cpf" id="cpf">
                    </div>
                    <div>
                        <label for="senha">Senha:</label>
                        <input type="password" name="senha" id="senha">
                    </div>
                    <div>
                        <button type="submit">Cadastrar</button>
                    </div>
                </form>
                <?php
                //página de cadastro receberá os dados do formulário
                //Verifica se o formulário foi enviado
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $erro = ""; //cria variável erro
                    //se foi enviado o formulário recebe os dados do post
                    $nome = $_POST['nome']; //recebe o valor do campo nome
                    $email = $_POST['email']; //recebe o valor do campo email
                    $cpf = $_POST['cpf']; //recebe dados do campo cpf
                    $senha = $_POST['senha']; //recebe valor do campo senha
                    $senhaHash = password_hash($senha, PASSWORD_DEFAULT); //criptografa a senha para ser gravada no banco
                    //Verifica se o CPF já existe no banco
                    $selectCPF = $conexao->prepare("SELECT cpf FROM usuario WHERE cpf = :cpf"); //query
                    $selectCPF->bindParam('cpf', $cpf); //passa o parâmetro para a chave :cpf
                    $selectCPF->execute(); //executa a query
                    if ($verCpf = $selectCPF->fetch(PDO::FETCH_ASSOC)) {
                        $erro = "CPF {$verCpf['cpf']} já cadastrado"; //se o cpf for encontrado adiciona mensagem de erro a variável $erro
                    }
                    //Verfifica se Email já existe
                    $selectEmail = $conexao->prepare("SELECT email FROM usuario WHERE email = :email"); //query
                    $selectEmail->bindParam('email', $email); //passa o parâmetro para a chave :email
                    $selectEmail->execute(); //executa a query
                    if ($verEmail = $selectEmail->fetch(PDO::FETCH_ASSOC)) {
                        $erro .= "Email {$verEmail['email']} já existe!"; //adiciona mensagem de erro se email já existir
                    }
                    if ($erro) {
                        echo '<div class="alert-danger">Erro: ' . $erro . '</div>';
                    } else {
                        $cadastra = $conexao->prepare("INSERT INTO usuario (nome, email, cpf, senha) VALUES (:nome, :email, :cpf, :senha)"); //prepara a consulta com as chaves para receber os valores
                        $cadastra->bindParam('nome', $nome); //passa valor para a chave nome
                        $cadastra->bindParam('email', $email); //passa valor para a chave email
                        $cadastra->bindParam('cpf', $cpf); //passa valor para a chave cpf
                        $cadastra->bindParam('senha', $senhaHash); //passa valor para a chave senha
                        if ($cadastra->execute()) { //se tudo der certo exibe a mensagem de sucesso
                            echo '<div class="alert-success">Usuário cadastrado com sucesso!</div>';
                        } else { //se não ser certo exibe mensagem de erro
                            echo '<div class="alert-danger">Erro ao cadastrar</div>';
                        }
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