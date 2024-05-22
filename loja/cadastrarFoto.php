<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $foto = $_FILES['foto']['name'];
    $tipo = $_FILES['foto']['type'];
    $temp = $_FILES['foto']['tmp_name'];
    $tamanho = $_FILES['foto']['size'];

    echo 'Nome: ' . $foto;
    echo "<br>";
    echo 'Tipo: ' . $tipo;
    echo "<br>";
    echo 'Tamanho: ' . $tamanho;
    echo "<br>";
    echo 'Tamanho: ' . $temp;

    $path_info = pathinfo($temp);

    $extensao = $path_info['extension'];
    $novo_nome =  'foto_'.date('ymdhis');
   
    if (move_uploaded_file($temp, 'uploads/' . $novo_nome)) {
        echo 'Foto enviada ao servidor';
    } else {
        echo 'ERRO: Não enviou a foto';
    }
}
?>