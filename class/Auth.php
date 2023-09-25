<?php
class Auth 
{
    
    public static function login ($username, $password) 
    {
        $db = new Database();
        $pdo = $db->getConnect();
        $sql = "SELECT * FROM KhachHang WHERE username = :username AND password = :password ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->bindValue(':password', $password, PDO::PARAM_STR);
        if ($stmt->execute()) 
        {
            if($stmt->rowCount()>0)
            {
                $_SESSION['log_detail'] = $username;
                if ($_SESSION['log_detail']=="admin")
                    header('location: indexadmin.php');
                else
                    header('location: index.php');
                exit();
            }
            else 
            {
                return 'Login Fail';
            }   
        } 
        else 
        {
            return 'Login Fail';
        }
    }

    public static function logout() {
        unset($_SESSION['log_detail']);

        header('location: index.php');
        exit;
    }
    public static function register($username, $password,$ten,$dc,$sdt)
    {
        $db = new Database();
        $pdo = $db->getConnect();
        $sql = "INSERT INTO KhachHang(TenKH,username, password,DiaChi,SoDT) VALUES (:ten,:username, :password,:dc,:sdt)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':ten', $ten, PDO::PARAM_STR);
        $stmt->bindValue(':dc', $dc, PDO::PARAM_STR);
        $stmt->bindValue(':sdt', $sdt, PDO::PARAM_STR);
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->bindValue(':password', $password, PDO::PARAM_STR);

        if ($stmt->execute()) 
        {
            if(!isset($_SESSION['log_detail']))
            {
            $_SESSION['log_detail'] = $username;
                header('location: index.php');
                exit();
            }
            else
            {
                header('location: kh.php');
                exit();

            }
        } 
        else 
        {
            return 'Username already exists';
        }
    }
}
?>
