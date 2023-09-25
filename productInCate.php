<?php
$title = 'PD page';
require 'class/Database.php';
require 'class/Product.php';
require 'inc/init.php';
require 'class/Auth.php';
require 'class/Cart.php';
require 'class/Category.php';
if (! isset($_GET["id"])) {
    die("Cần cung cấp id sản phẩm !!!");
}

$id = $_GET["id"];
$db = new Database();
$pdo = $db->getConnect();
$cate = Category::getAll($pdo);
$data = Product::getPDinCate($pdo,$id);
$cart = Cart::getAll($pdo,$_SESSION['log_detail']);
$t=0;
foreach ($cart as $a)
$t += $a->quantity;

$sx="Sắp xếp";
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
                header("Location: productInCate.php?id=$id");
                exit;

            }
        }
    } 

if(isset($_GET['sapxep']))
{
    $action =$_GET['sapxep'];
    if ($action == '1') {
        $data=Product::getPDinCateTang($pdo,$id);
        $sx="Giá tăng dần";
    }
    else 
        {
            $data=Product::getPDinCateGiam($pdo,$id);
            $sx="Giá giảm dần";
        }
} 

?>

<?php if($_SESSION['log_detail']!='admin')
    require 'inc/header.php'; 
    else 
    require 'inc/headerad.php'; 

?>

<div class="row">
    <div class="col-6">
        <h2 style="padding-top: 20px;padding-left: 50px;color: #5e3434;">Danh sách sản phẩm</h2>
    </div>
    <div class="col-2">
    <nav class="navbar navbar-expand">
        <div class="collapse navbar-collapse" id="navbarNavDarkDropdown" style="background-color: #fceced; ">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" >
                    <?= $sx?>
                    </a>
                    <ul class="dropdown-menu ">
                    <li><a class="dropdown-item" href="productInCate.php?sapxep=1&id=<?= $id?>"> Giá tăng dần</a></li>
                    <li><a class="dropdown-item" href="productInCate.php?sapxep=0&id=<?= $id?>"> Giá giảm dần</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        </nav>
    </div>
</div>
<div class="row" style="padding-left: 50px;padding-right:50px; margin-bottom: 30px;">
 <?php foreach ($data as $row): ?>
        <div class="col-4 " style="padding-top: 50px;">
            <div class="card h-80 "> 
            <?php foreach($row as $key=>$value):?>
             <?php if ($key == 'hinh') : ?>
                 <img class="card-img-top" src="image/<?= $value ?>" style="width: 100%; height: 400px;">
                     <?php elseif ($key == 'tensp'): ?>
                        <?php if($_SESSION['log_detail']!='admin') : ?>
                            <h5 class="card-body"><a href="product.php?id=<?= $row->masp ?>" style="color: black; text-decoration: none;height: 80px;"><?= $value ?></a></h5>
                        <?php else:?>
                            <h5 class="card-body" style="height: 80px;"><a href="productad.php?id=<?= $row->masp ?>" style="color: black; text-decoration: none;"><?= $value ?></a></h5>
                        <?php endif;?>
                    <?php elseif ($key == 'gia') : ?>
                        <h5 class="card-body" style="color: red;"><?= number_format($value, 0, ',', '.') ?> VNĐ</h5>

             <?php endif; ?>
            <?php endforeach;?>
            <?php if($_SESSION['log_detail']!='admin') : ?>
                <?php  if(isset($_SESSION['log_detail'])):?>
                    <a href="productInCate.php?action=addcart&proid=<?= $row->masp ?>&id=<?= $id ?>" style="color: white; text-decoration: none;"class="btn btn-primary">Thêm giỏ hàng</a>
                <?php else:?>
                    <a href="login.php" style="color: white; text-decoration: none;" class="btn btn-primary">Thêm giỏ hàng</a>
                <?php endif; ?>
            <?php endif;?>

            </div>
            </div>
        <?php endforeach;?>
 </div>
<?php require 'inc/footer.php'; ?>