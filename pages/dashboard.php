<?php
// Página inicial após login
include 'config.php';
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Dashboard RH - "Nome da Empresa"</title></head>
<body>
    <h1>Bem-vindo, <?php echo $SESSION['user']; ?></h1>
    <a href="cadastrar.php">Cadastrar Colaborador(a)</a>
    <a href="listar.php">Lista de Colaboradores</a>
    <a href="logout.php">Sair</a>
</body>
</html>
