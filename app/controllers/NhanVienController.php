<?php
class NhanVienController {
    private $nhanVienModel;
    private $phongBanModel;

    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $this->nhanVienModel = new NhanVien();
        $this->phongBanModel = new PhongBan();
    }

    public function index() {
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 5;
        $offset = ($page - 1) * $limit;

        $nhanviens = $this->nhanVienModel->getAll($limit, $offset);
        $total = $this->nhanVienModel->getTotal();
        $totalPages = ceil($total / $limit);

        $view = __DIR__ . '/../views/nhanvien/index.php';
        require __DIR__ . '/../views/layout.php';
    }

    public function add() {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: /');
            exit;
        }

        $phongbans = $this->phongBanModel->getAll();
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'maNV' => trim($_POST['maNV'] ?? ''),
                'tenNV' => trim($_POST['tenNV'] ?? ''),
                'phai' => $_POST['phai'] ?? '',
                'noiSinh' => trim($_POST['noiSinh'] ?? ''),
                'maPhong' => $_POST['maPhong'] ?? '',
                'luong' => (int)($_POST['luong'] ?? 0)
            ];

            if ($this->nhanVienModel->add($data)) {
                header('Location: /');
                exit;
            } else {
                $error = "Không thể thêm nhân viên. Vui lòng kiểm tra lại.";
            }
        }

        $view = __DIR__ . '/../views/nhanvien/add.php';
        require __DIR__ . '/../views/layout.php';
    }

    public function edit($maNV) {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: /');
            exit;
        }

        $nhanvien = $this->nhanVienModel->getById($maNV);
        $phongbans = $this->phongBanModel->getAll();
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'maNV' => $maNV,
                'tenNV' => trim($_POST['tenNV'] ?? ''),
                'phai' => $_POST['phai'] ?? '',
                'noiSinh' => trim($_POST['noiSinh'] ?? ''),
                'maPhong' => $_POST['maPhong'] ?? '',
                'luong' => (int)($_POST['luong'] ?? 0)
            ];

            if ($this->nhanVienModel->update($data)) {
                header('Location: /');
                exit;
            } else {
                $error = "Không thể cập nhật nhân viên. Vui lòng kiểm tra lại.";
            }
        }

        $view = __DIR__ . '/../views/nhanvien/edit.php';
        require __DIR__ . '/../views/layout.php';
    }

    public function delete($maNV) {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: /');
            exit;
        }

        $this->nhanVienModel->delete($maNV);
        header('Location: /');
        exit;
    }
}