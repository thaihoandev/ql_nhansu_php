<?php
// Prevent multiple inclusions
if (!function_exists('getDBConnection')) {
    function getDBConnection() {
        // Configuration array
        $config = [
            'host' => 'localhost',
            'dbname' => 'ql_nhansu2',
            'username' => 'root',       // Replace with your MySQL username
            'password' => '',           // Replace with your MySQL password
            'charset' => 'utf8mb4'
        ];

        try {
            $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";
            $pdo = new PDO($dsn, $config['username'], $config['password'], [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]);
            return $pdo;
        } catch (PDOException $e) {
            // Log the error or handle it appropriately
            error_log('Database Connection Error: ' . $e->getMessage());
            throw new Exception('Database connection failed');
        }
    }
}

// Define BASE_PATH if not already defined
if (!defined('BASE_PATH')) {
    define('BASE_PATH', __DIR__ . '/../../');
}

return [
    'host' => 'localhost',
    'dbname' => 'QL_NhanSu',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8mb4'
];