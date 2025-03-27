<?php
class PhongBan {
    private $db;

    public function __construct() {
        $this->db = getDBConnection();
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM PHONGBAN");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($maPhong) {
        $stmt = $this->db->prepare("SELECT * FROM PHONGBAN WHERE Ma_Phong = :maPhong");
        $stmt->execute(['maPhong' => $maPhong]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}