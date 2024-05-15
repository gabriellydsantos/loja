<?php
try { //executa o código
    //cria a conexao. parâmetros: banco a ser usado mysql, servidor, nome do banco, usuário e senha(em branco)
    $conexao = new PDO('mysql:host=localhost;dbname=loja', 'root','200812');
} catch(PDOException $e){   
    //caso o código em try der erro o código em catch será executado.
    echo 'Não deu bom '.$e->getMessage();
}//se tudo for OK, não terá nenhuma mensagem na tela