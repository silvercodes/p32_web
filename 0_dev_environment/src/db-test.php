<?php

$host = 'mysql';
$dbname = 'app_db';
$username = 'appuser';
$password = 'apppassword';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => true
];

try {
    $pdo = new PDO($dsn, $username, $password, $options);

    echo "Подключение успешно!";
    echo "<br>Версия MySQL: " . $pdo->getAttribute(PDO::ATTR_SERVER_VERSION);

} catch (PDOException $e) {
    echo "ERROR: {$e->getMessage()}";
}
