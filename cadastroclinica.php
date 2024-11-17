<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "clinica");

// Verifique se há erro na conexão com o banco de dados
if ($mysqli->connect_error) {
    die("Conexão falhou: " . $mysqli->connect_error);
}

// Verifique se o usuário está logado e se é administrador
if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] != 5) {
    header("Location: login.php");
    exit;
}

// Processar o formulário de cadastro
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $is_admin = isset($_POST['is_admin']) ? 1 : 0; // 1 se for admin, 0 se for usuário normal

    // Criptografar a senha
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    // Inserir o novo usuário no banco de dados
    $stmt = $mysqli->prepare("INSERT INTO acessos (login, senha, is_admin) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $login, $senha_hash, $is_admin);

    if ($stmt->execute()) {
        echo "Usuário cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar o usuário: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Usuário</title>
</head>
<body>
    <h1>Cadastrar Usuário</h1>
    <form method="POST">
        <label for="login">Usuário:</label>
        <input type="text" name="login" required>
        <br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" required>
        <br>
        <label for="is_admin">É administrador?</label>
        <input type="checkbox" name="is_admin">
        <br>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>
