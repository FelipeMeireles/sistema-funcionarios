<?php
// Página de login
include 'config.php';
if (isset($_SESSION['user'])) {
    header("Location: dashboard.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (!empty($username) && !empty($password)) {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch();
        
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['username'];
            header("Location: dashboard.php");
            exit;
        } else {
            echo "Credenciais inválidas.";
        }
    } else {
        echo "Preencha todos os campos.";
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Login RH - "Nome da Empresa"</title></head>
<body>
    <form method="post">
        Usuário: <input type="text" name="username"><br>
        Senha: <input type="password" name="password"><br>
        <button type="submit">Entrar</button>
</body>
</html>
