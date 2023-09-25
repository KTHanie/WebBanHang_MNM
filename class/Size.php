<?php
class Size {
    public $MaSize;
    public $CanNang;

    public static function getAll($pdo) {
        $sql = "SELECT * FROM BangSize";
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Size');
            return $stmt->fetchAll();
        }
    }
    public static function getSizeOnePD($pdo,$id) {
        $sql = "SELECT * FROM ChiTietSize WHERE MaSP =:id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        if ($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Size');
            return $stmt->fetch();
        }

    }
    public static function creatSizeOfPD($pdo,$sp,$size) {
        $sql = "INSERT INTO ChiTietSize(MaSP,MaSize) 
                VALUES (:sp,:size)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':sp', $sp, PDO::PARAM_STR);
        $stmt->bindParam(':size', $size, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return true;
        }
        return false;

    }
    public static function delete($pdo,$id)
    {
        $sql ="DELETE FROM ChiTietSize WHERE MaSP=:id";
        $stmt =$pdo->prepare($sql);
        $stmt->bindParam(':id',$id,PDO::PARAM_STR);
        if($stmt->execute()){
            return true;
        }
        return false;

    }
}
?>