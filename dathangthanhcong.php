<?php
$title = 'Home page';
require 'class/Database.php';
require 'class/Product.php';
require 'inc/init.php';
require 'class/Auth.php';
require 'class/Cart.php';
require 'class/Category.php';
$sx="Sắp xếp";
$db = new Database();
$pdo = $db->getConnect();
$data = Product::getAll($pdo);
$cate = Category::getAll($pdo);
$cart = Cart::getAll($pdo,$_SESSION['log_detail']);
$t=0;
foreach($cart as $r)
    $t+=$r->quantity;

?>

<?php require 'inc/header.php'; ?>
<div class="text-center" style="padding-top: 200px; padding-bottom: 500px; background-color: white;">
<img src="image/thanhcong.png"/>
<h3 style="color: brown;">Đặt Hàng Thành Công</h3>
<h3 ><a href="index.php" style="text-decoration: none;">Tiếp tục mua sắm</a></h3>
</div>
<?php require 'inc/footer.php'; ?>
