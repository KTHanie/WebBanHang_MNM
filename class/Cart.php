<?php
class Cart
{
    public $id;
    public $username;
    public $name;
    public $price;
    public $quantity;
    
    public static function getAll($pdo,$username) {
        $sql = "SELECT * FROM cart where username = :username ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        if ($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Cart');
            return $stmt->fetchAll();
        }
    }
    
    public static function getOneByID($pdo,$username,$id) {
        $sql = "SELECT * FROM cart WHERE id = :id AND username = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        if($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Cart');
            return $stmt->fetch();
        }
    }
    public function ktThem($pdo,$username,$id,$name,$price) {
        if(! Cart::getOneByID($pdo,$username,$id))
        {
            return Cart::them($pdo,$username,$id,$name,$price);

        }
        else
            {
                return Cart::them1($pdo,$username,$id);        

            }
    }
    public function them($pdo,$username,$id,$name,$price)
    {
        $quantity=1;
        $sql = "INSERT INTO cart(id,username,name, price,quantity) VALUES (:id,:username,:name, :price,:quantity)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':price', $price, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return true;
        }
        return false; 
    }
    public function them1($pdo,$username,$id) {
        $sql = "UPDATE cart SET  quantity = quantity + 1 WHERE id=:id AND username = :username ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        if ($stmt->execute()) {
            return true;
        }      
        return false; 
    }
    public function deleteAll($pdo,$username)
    {
        $sql ="DELETE FROM cart WHERE username = :username";
        $stmt =$pdo->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        if($stmt->execute()){
            return true;
        }
        return false;     }
    public function delete($pdo,$username,$id)
    {
        $sql ="DELETE FROM cart WHERE id=:id AND username = :username";
        $stmt =$pdo->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        if($stmt->execute()){
            return true;
        }
    }
    public function update($pdo,$username,$id,$quantity) {
        $sql = "UPDATE cart SET  quantity = :quantity WHERE id=:id AND username = :username ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return true;
        }      
        return false;
    }
}