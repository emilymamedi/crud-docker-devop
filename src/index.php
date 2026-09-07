<?php

require 'conexao.php';

$sql = "SELECT * FROM produtos ORDER BY id DESC";
$stmt = $pdo->query($sql);
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>CRUD de Produtos</title>
</head>
<body>

    <h1>Cadastro de Produtos</h1>

    <a href="cadastrar.php">Cadastrar produto</a>

    <h2>Produtos cadastrados</h2>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Data de cadastro</th>
            <th>Ações</th>
        </tr>

        <?php foreach ($produtos as $produto): ?>

            <tr>
                <td><?= $produto['id'] ?></td>
                <td><?= $produto['nome'] ?></td>
                <td><?= $produto['descricao'] ?></td>
                <td>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></td>
                <td><?= $produto['data_cadastro'] ?></td>
                <td>
                    <a href="editar.php?id=<?= $produto['id'] ?>">Editar</a>
                    |
                    <a href="excluir.php?id=<?= $produto['id'] ?>">Excluir</a>
                </td>
            </tr>

        <?php endforeach; ?>

    </table>

</body>
</html>