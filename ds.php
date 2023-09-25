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
//tìm kiếm
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $s = $_POST['search'];
    if(!empty($s))
        $data=Product::getSearch($pdo,$s);
    else
        $data = Product::getAll($pdo);

}
//thêm vào giỏ hàng
if(isset($_GET['action'])&& isset($_GET['proid']))
    {
        $action =$_GET['action'];
        $id =$_GET['proid'];
        if ($action == 'addcart') {
            $product = Product::getOneByID($pdo, $id);
            if ($product)
            {
                $cart = new Cart;   
                $cart->ktThem($pdo,$_SESSION['log_detail'],$id,$product->tensp,$product->gia);
                header("Location: ds.php");
                exit;            
            }
        }
    }
    //Sắp xếp 
    if(isset($_GET['sapxep']))
    {
        $action =$_GET['sapxep'];
        if ($action == '1') {
            $data=Product::getAllTang($pdo);
            $sx="Giá tăng dần";
        }
        else 
            {
                $data=Product::getAllGiam($pdo);
                $sx="Giá giảm dần";
            }
    } 
    foreach ($cart as $a)
    $t += $a->quantity;

?>

<?php require 'inc/header.php'; ?>
<div class="text-center" style="margin-top: 20px;">
    <form method="post">
        <input type="search" name="search" value="" placeholder="Search">
        <button type="submit" class="btn btn-danger" name="Search">Search</button>
    </form>
</div>
<div class="row" style="margin-top: 20px;">
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
                    <li><a class="dropdown-item" href="ds.php?sapxep=1"> Giá tăng dần</a></li>
                    <li><a class="dropdown-item" href="ds.php?sapxep=0"> Giá giảm dần</a></li>
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
                         <h5 class="card-body"><a href="product.php?id=<?= $row->masp ?>" style="color: black; text-decoration: none;height: 80px;"><?= $value ?></a></h5>
                    <?php elseif ($key == 'gia') : ?>
                        <h5 class="card-body" style="color: red;"><?= number_format($value, 0, ',', '.') ?> VNĐ</h5>

             <?php endif; ?>
            <?php endforeach;?>
            <?php  if(isset($_SESSION['log_detail'])):?>
                <a href="ds.php?action=addcart&proid=<?= $row->masp ?>" style="color: white; text-decoration: none;" class="btn btn-primary">Thêm giỏ hàng</a>
            <?php else:?>
                <a href="login.php" style="color: white; text-decoration: none;" class="btn btn-primary">Thêm giỏ hàng</a>
            <?php endif; ?>
            </div>
            </div>
        <?php endforeach;?>
 </div>
<?php require 'inc/footer.php'; ?>