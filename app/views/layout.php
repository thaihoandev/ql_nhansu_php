<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Nhân Sự</title>
    <link rel="stylesheet" href="/css/style.css?v=2.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="/public/favicon.ico">
</head>
<body>
    <?php if (isset($_SESSION['user'])): ?>
        <!-- Sidebar for logged-in users -->
        <div class="sidebar">
            <div class="sidebar-header">
                <img src="/images/logo.jpg" alt="Logo" class="sidebar-logo">
                <h3>Quản Lý Nhân Sự</h3>
            </div>
            <nav class="sidebar-nav">
                <a href="/" class="nav-link"><i class="fas fa-users"></i> Danh Sách Nhân Viên</a>
                <?php if ($_SESSION['user']['role'] === 'admin'): ?>
                    <a href="/nhanvien/add" class="nav-link"><i class="fas fa-user-plus"></i> Thêm Nhân Viên</a>
                <?php endif; ?>
                <a href="/logout" class="nav-link logout"><i class="fas fa-sign-out-alt"></i> Đăng Xuất</a>
            </nav>
        </div>
        <div class="main-content">
            <header>
                <div class="header-content">
                    <button class="menu-toggle"><i class="fas fa-bars"></i></button>
                    <h1>Quản Lý Nhân Sự</h1>
                    <div class="user-info">
                        Xin chào, <?= htmlspecialchars($_SESSION['user']['fullname']) ?> 
                    </div>
                </div>
            </header>
            <main>
                <?php require $view; ?>
            </main>
        </div>
    <?php else: ?>
        <!-- No sidebar for login page -->
        <main>
            <?php require $view; ?>
        </main>
    <?php endif; ?>
    <script>
        // Toggle sidebar on mobile
        document.querySelector('.menu-toggle').addEventListener('click', () => {
            document.querySelector('.sidebar').classList.toggle('active');
        });
    </script>
</body>
</html>