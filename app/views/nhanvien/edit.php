<div class="page-header">
    <h2>SỬA NHÂN VIÊN</h2>
</div>

<div class="form-container">
    <form method="POST" action="/nhanvien/edit/<?= $nhanvien['Ma_NV'] ?>">
        <div class="form-group">
            <label for="maNV">Mã Nhân Viên</label>
            <input type="text" id="maNV" value="<?= htmlspecialchars($nhanvien['Ma_NV']) ?>" disabled>
        </div>
        <div class="form-group">
            <label for="tenNV">Tên Nhân Viên</label>
            <input type="text" id="tenNV" name="tenNV" value="<?= htmlspecialchars($nhanvien['Ten_NV']) ?>" required>
        </div>
        <div class="form-group">
            <label for="phai">Giới Tính</label>
            <select id="phai" name="phai">
                <option value="NAM" <?= $nhanvien['Phai'] === 'NAM' ? 'selected' : '' ?>>Nam</option>
                <option value="NU" <?= $nhanvien['Phai'] === 'NU' ? 'selected' : '' ?>>Nữ</option>
            </select>
        </div>
        <div class="form-group">
            <label for="noiSinh">Nơi Sinh</label>
            <input type="text" id="noiSinh" name="noiSinh" value="<?= htmlspecialchars($nhanvien['Noi_Sinh']) ?>">
        </div>
        <div class="form-group">
            <label for="maPhong">Phòng Ban</label>
            <select id="maPhong" name="maPhong">
                <?php foreach ($phongbans as $pb): ?>
                    <option value="<?= $pb['Ma_Phong'] ?>" <?= $pb['Ma_Phong'] === $nhanvien['Ma_Phong'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($pb['Ten_Phong']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="luong">Lương</label>
            <input type="number" id="luong" name="luong" value="<?= $nhanvien['Luong'] ?>" required>
        </div>
        <?php if (isset($error) && $error): ?>
            <p class="error-message"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>