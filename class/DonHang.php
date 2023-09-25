<?php
class DonHang {
    public $MaKH;
    public $MaDH;
    public $NgayTao;
    public $TinhTrang;

    public static function getAll($pdo) {
        $sql = "SELECT * FROM DatHang";
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'DonHang');
            return $stmt->fetchAll();
        }
    }
    public static function getCT($pdo,$id) {
        $sql = "SELECT * FROM ChiTiet WHERE MaDH=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'DonHang');
            return $stmt->fetchAll();
        }
    }
    public static function getSL($pdo,$sp,$id) {
        $sql = "SELECT SL FROM ChiTiet WHERE MaDH=:id AND MaSP=:sp";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':sp', $sp, PDO::PARAM_STR);
        if ($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'DonHang');
            return $stmt->fetch();
        }
    }

    public function create($pdo) {
        $sql = "INSERT INTO DatHang(MaDH,MaKH,NgayTao,TinhTrang) 
                VALUES (:madh,:makh,:ngaytao,:tt)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':madh', $this->MaDH, PDO::PARAM_INT);
        $stmt->bindValue(':makh', $this->MaKH, PDO::PARAM_INT);
        $stmt->bindValue(':ngaytao', $this->NgayTao, PDO::PARAM_STR);
        $stmt->bindValue(':tt', $this->TinhTrang, PDO::PARAM_STR);
        if ($stmt->execute()) {
            $this->MaDH = $pdo->lastInsertId();
            return true;
        }
    }
    public function deleteCT($pdo,$id)
    {
        $sql ="DELETE FROM ChiTiet WHERE MaDH=:id ";
        $stmt =$pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        if($stmt->execute()){
            return true;
        }
    }
    public function delete($pdo,$id)
    {
        $sql ="DELETE FROM DatHang WHERE MaDH=:id ";
        $stmt =$pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        if($stmt->execute()){
            return true;
        }
    }
    public function update($pdo,$id) {
        $sql = "UPDATE DatHang SET  TinhTrang = 1 WHERE MaDH=:id  ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return true;
        }      
        return false;
    }

    public function createCT($pdo,$cart,$id) {
        $sql = "INSERT INTO ChiTiet(MaDH,MaSP,SL) 
                VALUES (:madh,:masp,:sl)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':madh', $id, PDO::PARAM_INT);
        $stmt->bindValue(':masp', $cart->id, PDO::PARAM_STR);
        $stmt->bindValue(':sl', $cart->quantity, PDO::PARAM_STR);
        if ($stmt->execute()) {
            return true;
        }
    }

}
?>