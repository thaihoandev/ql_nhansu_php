<div class="page-header">
    <h2>THÊM NHÂN VIÊN</h2>
</div>

<div class="form-container">
    <form method="POST" action="/nhanvien/add">
        <div class="form-group">
            <label for="maNV">Mã Nhân Viên</label>
            <input type="text" id="maNV" name="maNV" required>
        </div>
        <div class="form-group">
            <label for="tenNV">Tên Nhân Viên</label>
            <input type="text" id="tenNV" name="tenNV" required>
        </div>
        <div class="form-group">
            <label for="phai">Giới Tính</label>
            <select id="phai" name="phai">
                <option value="NAM">Nam</option>
                <option value="NU">Nữ</option>
            </select>
        </div>
        <div class="form-group">
            <label for="noiSinh">Nơi Sinh</label>
            <input type="text" id="noiSinh" name="noiSinh">
        </div>
        <div class="form-group">
            <label for="maPhong">Phòng Ban</label>
            <select id="maPhong" name="maPhong">
                <?php foreach ($phongbans as $pb): ?>
                    <option value="<?= $pb['Ma_Phong'] ?>"><?= htmlspecialchars($pb['Ten_Phong']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="luong">Lương</label>
            <input type="number" id="luong" name="luong" required>
        </div>
        <?php if (isset($error) && $error): ?>
            <p class="error-message"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <button type="submit" class="btn btn-primary">Thêm Nhân Viên</button>
    </form>
</div>