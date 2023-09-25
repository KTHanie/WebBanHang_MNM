<?php
$title = 'Regisster page';
require 'inc/init.php';
require 'class/Auth.php';
require 'class/KH.php';
require 'class/Database.php';
require 'class/Category.php';
$db = new Database();
$pdo = $db->getConnect();
$cate = Category::getAll($pdo);

    $tenError="";
    $sdtError="";
    $dcError="";
    $nameError ="";
    $passError ="";
    $pass2Error ="";
    if($_SERVER["REQUEST_METHOD"]== "POST")
    {
        if(empty($_POST['ten']))
        {
            $tenError="Tên khách hàng không được để trống ";
        }
        if(empty($_POST['dc']))
        {
            $dcError="Địa chỉ không được để trống ";
        }
        if(empty($_POST['sdt']))
        {
            $tenError="Số điện thoại không được để trống ";
        }
        if(empty($_POST['username']))
        {
            $nameError="Username không được để trống";
        }
        if(empty($_POST['pass']))
            $passError ="Password không được để trống";
        else
        {
            $pass= $_POST['pass'];
            if(empty($_POST['pass2']))
                $pass2Error ="Xác nhận Password không được để trống";
            else
            {
                $pass2=$_POST['pass2'];
                if($pass != $pass2)
                {
                    $pass2="";
                    $pass2Error ="Xác nhận Password không chính xác";
                }
                else
                {
                    $ten=$_POST['ten'];
                    $dc=$_POST['dc'];
                    $sdt=$_POST['sdt'];
                    $username=$_POST['username'];
                    $nameError = Auth::register($username, $pass2,$ten,$dc,$sdt);            
                }
            }
        }
    }
?>
<?php
    require 'inc/headerad.php';
?>
<div class="container  d-flex align-items-center min-vh-100">
    <div class="card text-center mx-auto py-5" style="width: 25rem; background-color:#eea5a4 ;">
<h1>Tạo người dùng mới</h1>
        <?php if ($error): ?>
            <div class="card-footer">
                <p class="text-danger"><?= $error ?></p>
            </div>
        <?php endif; ?>
    </div>
<form method="post" class= "w-50 m-auto " > 
<div class="mb-3">
        <label for="ten" class="form-label">Tên KH(*)</label>
        <input class="form-control" id="ten" name="ten" value="<?= $ten ?>" type="text">
        <a style="color:red"><?= $tenError ?></a>
    </div>  
    <div class="mb-3">
        <label for="dc" class="form-label">Địa chỉ(*)</label>
        <input class="form-control" id="dc" name="dc" value="<?= $dc ?>" type="text">
        <a style="color:red"><?= $dcError ?></a>
    </div>  
    <div class="mb-3">
        <label for="sdt" class="form-label">SĐT(*)</label>
        <input class="form-control" id="sdt" name="sdt" value="<?= $sdt ?>" type="number">
        <a style="color:red"><?= $sdtError ?></a>
    </div>  
    <div class="mb-3">
        <label for="username" class="form-label">Username(*)</label>
        <input class="form-control" id="username" name="username" value="<?= $username ?>" type="text">
        <a style="color:red"><?= $nameError ?></a>
    </div>  
    <div class="mb-3">
        <label for="pass" class="form-label">Password(*)</label>
        <input class="form-control" id="pass" name="pass" value="<?= $pass ?>" type="password">
        <a style="color:red"><?= $passError ?></a>
    </div>  
    <div class="mb-3">
        <label for="pass2" class="form-label">Xác nhận Password(*)</label>
        <input class="form-control" id="pass2" name="pass2" value="<?= $pass2 ?>" type="password">
        <a style="color:red"><?= $pass2Error ?></a>
    </div>  
    <div style="padding-top:10px; padding-bottom:10px;" class="text-center">
    <button type="submit" class="btn btn-primary">Create new</button>
    </div>
</form>
</div>
</div>
<?php
    require 'inc/footer.php';
?>
