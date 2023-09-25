<?php
$title = 'New Product';
require 'class/Database.php';
require 'class/Product.php';
require 'inc/init.php';
require 'class/Category.php';
require 'class/Size.php';
$error = '';

$name = '';
$desc = '';
$price = '';
$ma='';
$size='';
$maErrors='';
$nameErrors = '';
$loaiErrors = '';
$sizeErrors = '';
$descErrors = '';
$priceErrors = '';
$imageErrors ='';
$db = new Database();
$pdo = $db->getConnect();
$cate = Category::getAll($pdo);
$sizes = Size::getAll($pdo);
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $ma=$_POST['ma'];
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $loai= $_POST['loai'];
    $size =$_POST['size'];
    if (empty($name)) {
        $nameErrors = 'Tên sản phẩm không được để trống';
    }
    if (empty($ma)) {
        $maErrors = 'Mã sản phẩm không được để trống';
    }
    else
    {
        $product = Product::getOneByID($pdo, $ma);
        if($product)
        $maErrors = 'Mã sản phẩm đã tồn tại';

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
    if(empty($size))
        {
            $sizeErrors = 'Size không được để trống';
        }
    else
        if($size <0 || $loai > count($sizes))
            $sizeErrors = 'Size nhập vào không hợp lệ';
    try {
        if (empty($_FILES['file'])) {
            throw new Exception('Invalid upload');
        }

        switch ($_FILES['file']['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                throw new Exception('No file uploaded.');
            default:
                throw new Exception('An error occured');
        }
        if ($_FILES['file']['size'] > 1000000) {
            throw new Exception('File too large.');
        }

        $mime_types = ['image/gif', 'image/jpeg', 'image/png'];
        $file_info = finfo_open(FILEINFO_MIME_TYPE);
        $mime_type = finfo_file($file_info, $_FILES['file']['tmp_name']);
        if (!in_array($mime_type, $mime_types)) {
            throw new Exception('Invalid file type.');
        }
        $pathinfo = pathinfo($_FILES['file']['name']);
        // $fname = $pathinfo['filename'];
        $fname = 'image';
        $extension = $pathinfo['extension'];
        $dest =   $fname . '.' . $extension;
        $i = 1;
        while (file_exists('image/'.$dest)){
            $dest =  $fname . "-$i" .'.' . $extension;
            $i++;
        }
        // Write file
    if (move_uploaded_file($_FILES['file']['tmp_name'], 'image/'.$dest)) {
        // No errors ???
    if (!$nameErrors && !$descErrors && !$priceErrors && !$loaiErrors && !$maErrors && !$sizeErrors) {
        $db = new Database();
        $s = new Size;
        $pdo = $db->getConnect();
        
        $product = new Product();
        $product->masp=$ma;
        $product->tensp = $name;
        $product->thietKe = $desc;
        $product->gia = $price;
        $product->hinh= $dest;
        $product->loaisp=$loai;
        if ($product->create($pdo) && $s->creatSizeOfPD($pdo,$ma,$size)) {
            header("Location: indexadmin.php");
            exit;
        }
    }
    }
    else {
            throw new Exception('Unable to move file');
        }

    } catch (Exception $e) {
        $imageErrors=$e->getMessage() ;
    }
}
?>

<?php require 'inc/headerad.php'; ?>

<?php if (!$error) : ?>

<h2>Thêm sản phẩm mới</h2>
<form method="post" class="w-50 m-auto" enctype="multipart/form-data" style="padding-bottom: 50px">
<div class="mb-3">
        <label for="ma" class="form-label">Mã sản phẩm (*)</label>
        <input class="form-control" id="ma" name="ma" value="<?= $ma ?>" /> 
        <span class="text-danger fw-bold"><?= $maErrors ?></span>
    </div>

    <div class="mb-3">
        <label for="name" class="form-label">Tên sản phẩm (*)</label>
        <input class="form-control" id="name" name="name" value="<?= $name ?>" /> 
        <span class="text-danger fw-bold"><?= $nameErrors ?></span>
    </div>
    <div class="mb-3">
        <label for="desc" class="form-label">Thiết kế (*)</label>
        <textarea class="form-control" id="desc" name="desc" rows="4"><?= $desc ?></textarea> <span class="text-danger fw-bold"><?= $descErrors ?></span>
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
                    <a> <?=$value?> </a>
                <?php endforeach;?>
                <br>
            <?php endforeach;?>
        </div>
        <input class="form-control" id="loai" name="loai" type="number" value="<?= $loai ?>" /> <span class="text-danger fw-bold"><?= $loaiErrors ?></span>
    </div>
    <div class="mb-3">
        <label for="size" class="form-label">Size (*)</label>
        <div style="padding-left: 50px; padding-bottom: 20px;">
            <?php foreach ($sizes as $row):?>
                <?php foreach($row as $key=>$value):?>
                    <a> <?=$value?> </a>
                <?php endforeach;?>
                <br>
            <?php endforeach;?>
        </div>
        <input class="form-control" id="size" name="size" type="number" value="<?= $size ?>" /> <span class="text-danger fw-bold"><?= $sizeErrors ?></span>
    </div>

    <div>
    <label  class="form-label">Hình ảnh (*)</label>
    </br>
                <label for="file">Image file</label>
                <input type="file" name="file" />
                <span class="text-danger fw-bold"><?= $imageErrors ?></span>
    </div>
    </br>
    <div class="text-center" style="padding-bottom: 50px;">
    <button type="submit" class="btn btn-danger">Add new</button>
    </div>
</form>

<?php else: ?>

<h2 class="text-center text-danger"><?= $error ?></h2>

<?php endif; ?>

<?php require 'inc/footer.php'; ?>