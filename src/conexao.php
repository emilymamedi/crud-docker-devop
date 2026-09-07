<?php

$host = getenv('DB_HOST');
$usuario = getenv('DB_USER');
$senha = getenv('DB_PASSWORD');
$banco = getenv('DB_NAME');

$pdo = new PDO(
    "mysql:host=$host;dbname=$banco;charset=utf8mb4",
    $usuario,
    $senha
);