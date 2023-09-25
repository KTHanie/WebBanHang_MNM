<?php
class Category {
    public $maLoai;
    public $tenLoai;
    public static function getAll($pdo) {
        $sql = "SELECT * FROM LoaiSP";
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Category');
            return $stmt->fetchAll();
        }
    }
    public static function getOneByID($pdo, $id) {
        $sql = "SELECT * FROM LoaiSP WHERE maLoai = :id";
        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':id', $id, PDO::PARAM_STR);

        if ($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Category');
            return $stmt->fetch();
        }
    }
}
?>