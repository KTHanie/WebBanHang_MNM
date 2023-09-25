<?php
$title = 'Edit Product';
require 'class/Database.php';
require 'class/Product.php';
require 'inc/init.php';

// $error = Auth::requireLogin();
$error = '';

$name = '';
$desc = '';
$price = '';
$imageErrors ='';
$nameErrors = '';
$loaiErrors = '';
$descErrors = '';
$priceErrors = '';
if (! isset($_GET["id"])) {
    die("Cần cung cấp id sản phẩm !!!");
}

$id = $_GET["id"];
$db = new Database();
$pdo = $db->getConnect();
$product = Product::getOneByID($pdo, $id);
require 'class/Category.php';
$cate = Category::getAll($pdo);

if (!$product) {
    die("id không hợp lệ.");
}
else
    foreach($product as $key=>$value)
        if($key =='gia')
            $price =$value;
        else
            if($key =='tensp')
                $name=$value;
        else
            if($key =='thietKe')
                $desc=$value;
                else
                if($key =='loaisp')
                $loai=$value;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $loai=$_POST['loai'];
    if (empty($name)) {
        $nameErrors = 'Tên sản phẩm không được để trống';
    }

    if (empty($desc)) {
        $descErrors = 'Thiết kế không được để trống';
    }

    if (empty($price)) {
        $priceErrors = 'Giá không được để trống';
    } elseif ($price % 1000 != 0) {
        $priceErrors = 'Giá phải chia hết cho 1000';
    }
    if(empty($loai))
    {
        $loaiErrors = 'Loại không được để trống';
    }
    else
    if($loai <0 || $loai > count($cate))
        $loaiErrors = 'Loại nhập vào không hợp lệ';

    if (!$nameErrors && !$descErrors && !$priceErrors && !$loaiErrors) {
        $db = new Database();
        $pdo = $db->getConnect();       
        $product = new Product();
        $product->tensp = $name;
        $product->thietKe = $desc;
        $product->gia = $price;
        $product->masp = $id;
        $product->hinh= null;
        $product->loaisp=$loai;
        if ($product->edit($pdo)) {
            header("Location: indexadmin.php");
        }
    }
}
?>

<?php require 'inc/headerad.php'; ?>

<?php if (!$error) : ?>

<h2 style="padding-top: 20px; padding-left: 50px;">Chỉnh sửa thông tin sản phẩm</h2>
<form method="post" class="w-50 m-auto" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="name" class="form-label">Tên sản phẩm (*)</label>
        <input class="form-control" id="name" name="name" value="<?= $name ?>" /> <span class="text-danger fw-bold"><?= $nameErrors ?></span>
    </div>
    <div class="mb-3">
        <label for="desc" class="form-label">Thiết kế (*)</label>
        <textarea class="form-control" id="desc" name="desc" rows="4"value="<?= $desc ?>"><?= $desc ?></textarea> <span class="text-danger fw-bold"><?= $descErrors ?></span>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Giá (*)</label>
        <input class="form-control" id="price" name="price" type="number" value="<?= $price ?>" /> <span class="text-danger fw-bold"><?= $priceErrors ?></span>
    </div>
    <div class="mb-3">
        <label for="loai" class="form-label">Loại (*)</label>
        <div style="padding-left: 50px; padding-bottom: 20px;">
            <?php foreach ($cate as $row):?>
                <?php foreach($row as $key=>$value):?>
                    <a><?=$value?></a>
                <?php endforeach;?>
                <br>
            <?php endforeach;?>
        </div>
        <input class="form-control" id="loai" name="loai" type="number" value="<?= $loai ?>" /> <span class="text-danger fw-bold"><?= $loaiErrors ?></span>
    </div>
    </div>
    </br>
<div class="text-center" style="padding-bottom: 50px;">
    <button type="submit" class="btn btn-danger ">Save</button>
    </div>
</form>

<?php else: ?>

<h2 class="text-center text-danger"><?= $error ?></h2>

<?php endif; ?>

<?php require 'inc/footer.php'; ?>