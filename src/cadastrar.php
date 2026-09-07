<?php

require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];

    $sql = "INSERT INTO produtos (nome, descricao, preco)
            VALUES (:nome, :descricao, :preco)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':nome' => $nome,
        ':descricao' => $descricao,
        ':preco' => $preco
    ]);

    header('Location: index.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Cadastrar Produto</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">

        <h1>Cadastrar Produto</h1>

        <form method="POST" class="formulario">

            <div class="campo">
                <label>Nome:</label>
                <input type="text" name="nome" required>
            </div>

            <div class="campo">
                <label>Descrição:</label>
                <textarea name="descricao" required></textarea>
            </div>

            <div class="campo">
                <label>Preço:</label>
                <input type="number" name="preco" step="0.01" required>
            </div>

            <div class="botoes">
                <button type="submit" class="botao">Cadastrar</button>

        </form>

        <br>

        <a href="index.php" class="voltar">Voltar</a>

    </div>

</body>

</html>