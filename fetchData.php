<?php
$serviceUri = "mysql://avnadmin:AVNS_6hGwwTOy_0PIeyq4wzP@mysql-bertozzo-bertozzo-1.a.aivencloud.com:21209/defaultdb?ssl-mode=REQUIRED";
$databaseName = "defaultdb";
$host = "mysql-bertozzo-bertozzo-1.a.aivencloud.com";
$port = "21209";
$user = "avnadmin";
$password = "AVNS_6hGwwTOy_0PIeyq4wzP";
$sslMode = "REQUIRED";
$caCertificate = __DIR__ . "/ca.pem";

error_reporting(E_ALL);
ini_set('display_errors', 1);


try {
    $dsn = "mysql:host=$host;port=$port;dbname=$databaseName;charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::MYSQL_ATTR_SSL_CA => $caCertificate,
    ];

    $pdo = new PDO($dsn, $user, $password, $options);

    // Example query, replace with your actual query
    $stmt = $pdo->prepare("SELECT * FROM artist limit 25");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return the data as JSON
    header('Content-Type: application/json');
    echo json_encode($result);

} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
