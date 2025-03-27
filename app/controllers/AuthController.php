<?php
class AuthController {
    private $userModel;

    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $this->userModel = new User();
    }

    public function login() {
    if (isset($_SESSION['user'])) {
        header('Location: /');
        exit;
    }

    $error = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';
        
        $user = $this->userModel->login($username, $password);
        if ($user) {
            $_SESSION['user'] = $user;
            header('Location: /');
            exit;
        } else {
            $error = "Sai tên đăng nhập hoặc mật khẩu!";
        }
    }
    
    // Set the view path and include the layout
    $view = __DIR__ . '/../views/login.php';
    require __DIR__ . '/../views/layout.php';
}

    public function logout() {
        $_SESSION = [];
        session_destroy();
        header('Location: /login');
        exit;
    }
}