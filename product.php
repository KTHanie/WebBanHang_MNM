<?php
$title = 'Product page';
if (! isset($_GET["id"])) {
    die("Cần cung cấp id sản phẩm !!!");
}

$id = $_GET["id"];
require 'class/Cart.php';
require 'class/Database.php';
require 'class/Product.php';
require 'class/Category.php';
require 'class/Size.php';
require 'inc/init.php';
$db = new Database();
$pdo = $db->getConnect();
$product = Product::getOneByID($pdo, $id);
$cate = Category::getAll($pdo);
$sizes = Size::getAll($pdo);
$size = Size::getSizeOnePD($pdo,$product->masp);
$cart = Cart::getAll($pdo,$_SESSION['log_detail']);
$t=0;
foreach ($cart as $a)
$t += $a->quantity;

if (!$product) {
    die("id không hợp lệ.");
}
else
    $cate1 = Category::getOneByID($pdo,$product->loaisp);
if(isset($_GET['action'])&& isset($_GET['proid']))
    {
        $action =$_GET['action'];
        $i =$_GET['proid'];
        if ($action == 'addcart') {
            $product = Product::getOneByID($pdo, $i);
            if ($product)
            {
                $cart = new Cart;   
                $cart->ktThem($pdo,$_SESSION['log_detail'],$i,$product->tensp,$product->gia);
                header("Location: product.php?id=$id");
                exit;

            }
        }
    } 


?>

<?php require 'inc/header.php'; ?>
<br>
<div class="row" style="padding-left:100px; padding-top: 100px;padding-bottom: 100px; background-color: white;">
    <div class="col-5">
        <img src="image/<?= $product->hinh ?>" width="500px" height="500px"></h4>
        </div>
        <div class="col-5">
        <h2><?= $product->tensp ?></h2>
        </br>
        <h3 style="color: red;"><?= number_format($product->gia, 0, ',', '.') ?> VNĐ</h3>
        </br>
        <h4>Size: <?= $size->MaSize?></h4>
        <?php if($_SESSION['size']!='size'):?>
            <a href="product.php?id=<?= $id ?>">Ẩn chi tiết size<a>
            <?php 
                    $_SESSION['size']='size';?>
        <?php else:
            $_SESSION['size']='';?>
            <a href="product.php?id=<?= $id ?>"> Chi tiết size<a>
            <?php endif;?>        
        </br>
        <h4>Mô tả sản phẩm</h4>
        </br>
        <div style="padding-left: 30px;">
            <a ><?= $product->thietKe ?></a>
        </div>
        <div class="text-center" style="padding-top: 50px;">
        <?php if($_SESSION['log_detail']!='admin') : ?>
                <?php  if(isset($_SESSION['log_detail'])):?>
                    <a href="product.php?action=addcart&proid=<?= $product->masp ?>&id=<?= $id ?>" style="color: white; text-decoration: none;"class="btn btn-primary">Thêm giỏ hàng</a>
                <?php else:?>
                    <a href="login.php" style="color: white; text-decoration: none;" class="btn btn-primary">Thêm giỏ hàng</a>
                <?php endif; ?>
            <?php endif;?>        
        </div>
</div>
<?php if($_SESSION['size']=='size'):?>
<div class ="row">
<div style="padding-left: 50px; padding-bottom: 20px;">
        <table class="table my-3">
            <thead>
                <tr class="text-center">
                    <th>Size</th>
                    <th>Cân nặng</th>
                </tr>
            </thead>
            <tbody>
            <?php   
            foreach ($sizes as $r): 
                $dssize= new Size;
                $dssized= $r;?>
                            <tr class="text-center">
                            <td><?= $dssized->MaSize ?></td>
                            <td><?= $dssized->CanNang ?></td>
                            </td>
                            </tr>
                    <?php 
                        endforeach; 
                        ?>
                </tbody>
            </table>
        
        </div>
        <?php endif;?>        

</div>
<?php require 'inc/footer.php'; ?>
