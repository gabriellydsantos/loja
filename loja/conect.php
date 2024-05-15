<?php
// Configurações do banco de dados
$servidor = "localhost"; // Endereço do servidor MySQL (normalmente é localhost)
$usuario = "root"; // Nome de usuário do MySQL
$senha = "200812"; // Senha do MySQL
$banco = "conect"; // Nome do banco de dados

// Estabelece a conexão com o banco de dados
try {
    $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
    // Define o modo de erro do PDO para exceção
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Define o charset para utf8 (opcional)
    $conexao->exec("set names utf8");
} catch(PDOException $e) {
    // Em caso de erro na conexão, exibe a mensagem de erro
    echo "Erro na conexão com o banco de dados: " . $e->getMessage();
    // Encerra o script
    exit();
}
?>


CREATE DATABASE IF NOT EXISTS sua_base_de_dados;

USE sua_base_de_dados;

CREATE TABLE IF NOT EXISTS produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    preco DECIMAL(10,2) NOT NULL
);

