<?php
$title = 'Home page';
require 'class/Database.php';
require 'class/Product.php';
require 'inc/init.php';
require 'class/Auth.php';
require 'class/Cart.php';
require 'class/Category.php';

$db = new Database();
$pdo = $db->getConnect();
$data = Product::getAll($pdo);
$cate= Category::getAll($pdo);
$sx="Sắp xếp";

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
?>

<?php require 'inc/headerad.php'; ?>

<div style="background-color: #f5caca;" class="container-fluid">
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
                    <li><a class="dropdown-item" href="indexadmin.php?sapxep=1"> Giá tăng dần</a></li>
                    <li><a class="dropdown-item" href="indexadmin.php?sapxep=0"> Giá giảm dần</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        </nav>
    </div>
</div>
<div class="row" style="padding-left: 50px;padding-right:50px; padding-bottom: 30px; ">
 <?php foreach ($data as $row): ?>
        <div class="col-4 " style="padding-top: 30px;">
            <div class="card h-80 "> 
            <?php foreach($row as $key=>$value):?>
             <?php if ($key == 'hinh') : ?>
                 <img class="card-img-top" src="image/<?= $value ?>" style="width: 100%; height: 400px;">
                     <?php elseif ($key == 'tensp'): ?>
                         <h5 class="card-body" style="height: 80px;"><a href="productad.php?id=<?= $row->masp ?>" style="color: black; text-decoration: none;"><?= $value ?></a></h5>
                    <?php elseif ($key == 'gia') : ?>
                        <h5 class="card-body" style="color: red; text-align: center;"><?= number_format($value, 0, ',', '.') ?> VNĐ</h5>

             <?php endif; ?>
            <?php endforeach;?>
            </div>
            </div>
        <?php endforeach;?>
        </div>
        </div>
<?php require 'inc/footer.php'; ?>