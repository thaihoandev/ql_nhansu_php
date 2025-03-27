<div class="login-container">
    <div class="login-card">
        <div class="login-header">
            <img src="https://lambanner.com/wp-content/uploads/2021/11/MNT-DESIGN-LOGO-HR.jpg" alt="Logo" class="login-logo">
            <h2>Đăng Nhập</h2>
        </div>
        <form method="POST" action="/login">
            <div class="input-group">
                <span class="input-icon">
                    <i class="fas fa-user"></i>
                </span>
                <input type="text" name="username" placeholder="Tên đăng nhập" required>
            </div>
            <div class="input-group">
                <span class="input-icon">
                    <i class="fas fa-lock"></i>
                </span>
                <input type="password" name="password" id="password" placeholder="Mật khẩu" required>
                <span class="toggle-password" onclick="togglePassword()">
                    <i class="fas fa-eye" id="toggle-icon"></i>
                </span>
            </div>
            <?php if (isset($error) && $error): ?>
                <p class="error-message"><?= htmlspecialchars($error) ?></p>
            <?php endif; ?>
            <button type="submit" class="login-btn">Đăng nhập</button>
        </form>
    </div>
</div>

<script>
    function togglePassword() {
        const passwordField = document.getElementById('password');
        const toggleIcon = document.getElementById('toggle-icon');
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            toggleIcon.classList.remove('fa-eye');
            toggleIcon.classList.add('fa-eye-slash');
        } else {
            passwordField.type = 'password';
            toggleIcon.classList.remove('fa-eye-slash');
            toggleIcon.classList.add('fa-eye');
        }
    }
</script>