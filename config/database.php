<?php
// Configurações do banco de dados
// Este arquivo é responsável por configurar a conexão com o MySQl.

// Configurações do servidor de banco de dados
define('DB_HOST', 'localhost');
define('DB_NAME', 'sitema_funcionarios');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8');

// Função para conectar ao banco de dados
// Retorna um objeto PDO com a conexão ao banco de dados.

function conectarBanco() {
    try {
        $dns = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;

        $pdo = new PDO($dns, DB_USER, DB_PASS, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]);

        return $pdo;

    } catch (PDOException $e) {
        die("Erro de conexão com o banco de dados: " . $e->getMessage());
    }
}

// Função para testar a conexão com o banco de dados
// Útil para verificar se a conexão com o banco de dados está funcionando.

function testarConexao() {
    $pdo = conectarBanco();
    if ($pdo) {
        echo "Conexão com o banco de dados estabelecida com sucesso!";
        return true;
    }
    return false;
}
?>
