<?php
class KH {
    public $MaKH;
    public $TenKH;
    public $username;
    public $password;
    public $DiaChi;
    public $SoDT;



    public static function getAll($pdo) {
        $sql = "SELECT * FROM KhachHang";
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'KH');
            return $stmt->fetchAll();
        }
    }
    public static function getKHbyId($pdo,$id) {
        $sql = "SELECT * FROM KhachHang WHERE username =:id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        if ($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'KH');
            return $stmt->fetch();
        }
    }
    public static function getKHbyMa($pdo,$id) {
        $sql = "SELECT * FROM KhachHang WHERE MaKH =:id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        if ($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'KH');
            return $stmt->fetch();
        }
    }
    public function update($pdo) {

        $sql = "UPDATE KhachHang SET TenKH=:TenKH,username=:username, password=:password, DiaChi=:DiaChi,SoDT=:SoDT WHERE MaKH =:id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':TenKH', $this->TenKH, PDO::PARAM_STR);
        $stmt->bindParam(':username', $this->username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $this->password, PDO::PARAM_STR);
        $stmt->bindParam(':id', $this->MaKH, PDO::PARAM_STR);
        $stmt->bindParam(':DiaChi', $this->DiaChi, PDO::PARAM_STR);
        $stmt->bindParam(':SoDT', $this->SoDT, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return true;
        }      
    }


}
?>