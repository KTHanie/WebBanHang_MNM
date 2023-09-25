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
<div class="text-center" style="background-color: #fceced;">
    <img src="image/88.png" style="margin-top: 20px; margin-bottom: 20px;">
</div>

<div class="row " style="margin-left: 30px; margin-bottom: 30px; margin-right: 30px; margin-top: 30px;">
    <div class="col-4" >
    <a href="productInCate.php?id=1"><img src="image/begai.jpg" width="400px" /></a>

    </div>
    <div class="col-2">
        <a href="productInCate.php?id=2"><img src="image/chan-vay-phoi-nut-xep-ly-xam.jpg" width="200px" height="270px" style="margin-bottom: 30px;" href="productInCate.php?id=2"/></a>
        <br>
        <a href="productInCate.php?id=3"><img src="image/quan-jean-ong-rong-xanh-nhat.jpg" width="200px" height="300px" href="productInCate.php?id=3"/></a>
    </div>
    <div class="col-4" >
    <a href="productInCate.php?id=5"><img src="image/betrai.jpg" width="400px" /></a>

    </div>
    <div class="col-2">
        <a href="productInCate.php?id=4"><img src="image/quan jeans nam den.jpg" width="200px" height="270px" style="margin-bottom: 30px;" href="productInCate.php?id=2"/></a>
        <br>
        <a href="productInCate.php?id=6"><img src="image/ao-somi-caro-mat-cuoi-.jpg" width="200px" height="300px" href="productInCate.php?id=3"/></a>
    </div>
</div>
<?php require 'inc/footer.php'; ?>
