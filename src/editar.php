<?php

require 'conexao.php';

$id = $_GET['id'];

$sql = "SELECT * FROM produtos WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $id]);

$produto = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$produto) {
    die('Produto não encontrado.');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];

    $sql = "UPDATE produtos
            SET nome = :nome,
                descricao = :descricao,
                preco = :preco
            WHERE id = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':nome' => $nome,
        ':descricao' => $descricao,
        ':preco' => $preco,
        ':id' => $id
    ]);

    header('Location: index.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Editar Produto</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">

        <h1>Editar Produto</h1>

        <form method="POST" class="formulario">

            <div class="campo">
                <label>Nome:</label>
                <input
                    type="text"
                    name="nome"
                    value="<?= htmlspecialchars($produto['nome']) ?>"
                    required>
            </div>

            <div class="campo">
                <label>Descrição:</label>
                <textarea name="descricao" required><?= htmlspecialchars($produto['descricao']) ?></textarea>

                <br><br>
                <div class="campo">
                    <label>Preço:</label>
                    <input
                        type="number"
                        name="preco"
                        step="0.01"
                        value="<?= $produto['preco'] ?>"
                        required>
                </div>
                <br><br>
                <div class="botoes">
                    <button type="submit" class="botao botao-amarelo">Salvar alterações</button>

        </form>

        <br>

        <a href="index.php" class="voltar">Voltar</a>

    </div>
</body>

</html>