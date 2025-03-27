<div class="page-header">
    <h2>THÔNG TIN NHÂN VIÊN</h2>
    <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin'): ?>
        <a href="/nhanvien/add" class="btn btn-primary"><i class="fas fa-user-plus"></i> Thêm Nhân Viên</a>
    <?php endif; ?>
</div>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>Mã Nhân Viên</th>
                <th>Tên Nhân Viên</th>
                <th>Giới Tính</th>
                <th>Nơi Sinh</th>
                <th>Tên Phòng</th>
                <th>Lương</th>
                <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin'): ?>
                    <th>Action</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($nhanviens as $nv): ?>
                <tr>
                    <td data-label="Mã Nhân Viên"><?= htmlspecialchars($nv['Ma_NV']) ?></td>
                    <td data-label="Tên Nhân Viên"><?= htmlspecialchars($nv['Ten_NV']) ?></td>
                    <td data-label="Giới Tính">
                        <?php if ($nv['Phai'] === 'NU'): ?>
                            <img src="/images/woman.jpg" alt="Nữ" class="gender-icon">
                        <?php else: ?>
                            <img src="/images/man.jpg" alt="Nam" class="gender-icon">
                        <?php endif; ?>
                    </td>
                    <td data-label="Nơi Sinh"><?= htmlspecialchars($nv['Noi_Sinh']) ?></td>
                    <td data-label="Tên Phòng"><?= htmlspecialchars($nv['Ten_Phong']) ?></td>
                    <td data-label="Lương"><?= number_format($nv['Luong']) ?></td>
                    <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin'): ?>
                        <td data-label="Action">
                            <a href="/nhanvien/edit/<?= $nv['Ma_NV'] ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Sửa</a>
                            <a href="/nhanvien/delete/<?= $nv['Ma_NV'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa?')"><i class="fas fa-trash"></i> Xóa</a>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="pagination">
    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="/?page=<?= $i ?>" class="<?= $i === $page ? 'active' : '' ?>"><?= $i ?></a>
    <?php endfor; ?>
</div>