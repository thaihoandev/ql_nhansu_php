<?php
session_start();
require __DIR__ . '/../app/config/database.php';
require __DIR__ . '/../app/models/NhanVien.php';
require __DIR__ . '/../app/models/PhongBan.php';
require __DIR__ . '/../app/models/User.php';
require __DIR__ . '/../app/controllers/NhanVienController.php';
require __DIR__ . '/../app/controllers/AuthController.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uriParts = explode('/', trim($uri, '/'));

$nhanVienController = new NhanVienController();
$authController = new AuthController();
switch ($uri) {
    case '/':
    case '/index.php':
        $nhanVienController->index();
        break;
    case '/login':
        $authController->login();
        break;
    case '/logout':
        $authController->logout();
        break;
    default:
        if ($uriParts[0] === 'nhanvien' && isset($_SESSION['user'])) {
            if ($uriParts[1] === 'add' && $_SESSION['user']['role'] === 'admin') {
                $nhanVienController->add();
            } elseif ($uriParts[1] === 'edit' && isset($uriParts[2]) && $_SESSION['user']['role'] === 'admin') {
                $nhanVienController->edit($uriParts[2]);
            } elseif ($uriParts[1] === 'delete' && isset($uriParts[2]) && $_SESSION['user']['role'] === 'admin') {
                $nhanVienController->delete($uriParts[2]);
            } else {
                http_response_code(404);
                echo "404 Not Found - Invalid nhanvien route";
            }
        } else {
            http_response_code(404);
            echo "404 Not Found - Route not recognized";
        }
        break;
}