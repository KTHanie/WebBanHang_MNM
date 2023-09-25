<?php
class Product
{
    public $masp;
    public $tensp;
    public $thietKe;
    public $gia;
    public $hinh;
    public $loaisp;
    
    public static function getAll($pdo) {
        $sql = "SELECT * FROM sanpham";
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
            return $stmt->fetchAll();
        }
    }
    public static function getAllTang($pdo) {
        $sql = "SELECT * FROM sanpham ORDER BY gia ASC" ;
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
            return $stmt->fetchAll();
        }
    }
    public static function getSearch($pdo,$s) {
        $sql = "SELECT * FROM sanpham WHERE tensp LIKE'%".$s."%'" ;
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
            return $stmt->fetchAll();
        }
    }
    public static function getAllGiam($pdo) {
        $sql = "SELECT * FROM sanpham ORDER BY gia DESC" ;
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
            return $stmt->fetchAll();
        }
    }
    public static function getPDinCate($pdo, $loaisp) {
        $sql = "SELECT * FROM sanpham WHERE loaisp = :loaisp";
        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':loaisp', $loaisp, PDO::PARAM_STR);

        if ($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
            return $stmt->fetchAll();
        }
    }
    public static function getPDinCateGiam($pdo, $loaisp) {
        $sql = "SELECT * FROM sanpham WHERE loaisp = :loaisp ORDER BY gia DESC";
        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':loaisp', $loaisp, PDO::PARAM_STR);

        if ($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
            return $stmt->fetchAll();
        }
    }
    public static function getPDinCateTang($pdo, $loaisp) {
        $sql = "SELECT * FROM sanpham WHERE loaisp = :loaisp ORDER BY gia ASC";
        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':loaisp', $loaisp, PDO::PARAM_STR);

        if ($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
            return $stmt->fetchAll();
        }
    }
    public static function getOneByID($pdo, $id) {
        $sql = "SELECT * FROM sanpham WHERE masp = :id";
        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':id', $id, PDO::PARAM_STR);

        if ($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
            return $stmt->fetch();
        }
    }

    public function create($pdo) {
        $sql = "INSERT INTO sanpham(masp,tensp, thietKe, gia,hinh,loaisp) 
                VALUES (:id,:name, :desc, :price,:image,:loai)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':name', $this->tensp, PDO::PARAM_STR);
        $stmt->bindValue(':desc', $this->thietKe, PDO::PARAM_STR);
        $stmt->bindValue(':price', $this->gia, PDO::PARAM_INT);
        $stmt->bindParam(':loai', $this->loaisp, PDO::PARAM_STR);
        $stmt->bindParam(':image', $this->hinh, PDO::PARAM_STR);
        $stmt->bindParam(':id', $this->masp, PDO::PARAM_STR);

        if ($stmt->execute()) {
            $this->masp = $pdo->lastInsertId();
            return true;
        }
    }
    public function edit($pdo) {
        $sql = "UPDATE sanpham SET tensp=:name,thietKe=:desc, gia=:price, loaisp=:loai WHERE masp=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name', $this->tensp, PDO::PARAM_STR);
        $stmt->bindParam(':desc', $this->thietKe, PDO::PARAM_STR);
        $stmt->bindParam(':price', $this->gia, PDO::PARAM_INT);
        $stmt->bindParam(':id', $this->masp, PDO::PARAM_STR);
        $stmt->bindParam(':loai', $this->loaisp, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return true;
        }      
    }

    public function delete($pdo)
    {
        $sql ="DELETE FROM sanpham WHERE masp=:id";
        $stmt =$pdo->prepare($sql);
        $stmt->bindParam(':id',$this->masp,PDO::PARAM_STR);
        if($stmt->execute()){
            return true;
        }
    }
}