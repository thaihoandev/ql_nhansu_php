<?php
class NhanVien {
    private $db;

    public function __construct() {
        $this->db = getDBConnection();
    }

    public function getAll($limit = 5, $offset = 0) {
        $stmt = $this->db->prepare("
            SELECT n.*, p.Ten_Phong 
            FROM NHANVIEN n 
            LEFT JOIN PHONGBAN p ON n.Ma_Phong = p.Ma_Phong 
            LIMIT :limit OFFSET :offset
        ");
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotal() {
        $stmt = $this->db->query("SELECT COUNT(*) FROM NHANVIEN");
        return $stmt->fetchColumn();
    }

    public function getById($maNV) {
        $stmt = $this->db->prepare("SELECT * FROM NHANVIEN WHERE Ma_NV = :maNV");
        $stmt->execute(['maNV' => $maNV]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function add($data) {
        $stmt = $this->db->prepare("
            INSERT INTO NHANVIEN (Ma_NV, Ten_NV, Phai, Noi_Sinh, Ma_Phong, Luong) 
            VALUES (:maNV, :tenNV, :phai, :noiSinh, :maPhong, :luong)
        ");
        return $stmt->execute($data);
    }

    public function update($data) {
        $stmt = $this->db->prepare("
            UPDATE NHANVIEN 
            SET Ten_NV = :tenNV, Phai = :phai, Noi_Sinh = :noiSinh, Ma_Phong = :maPhong, Luong = :luong 
            WHERE Ma_NV = :maNV
        ");
        return $stmt->execute($data);
    }

    public function delete($maNV) {
        $stmt = $this->db->prepare("DELETE FROM NHANVIEN WHERE Ma_NV = :maNV");
        return $stmt->execute(['maNV' => $maNV]);
    }
}