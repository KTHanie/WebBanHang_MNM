<?php
$title = 'Product page';
if (! isset($_GET["id"])) {
    die("Cần cung cấp id sản phẩm !!!");
}

$id = $_GET["id"];
require 'class/Database.php';
require 'class/Product.php';
require 'class/Category.php';
require 'class/Size.php';
require 'inc/init.php';
$db = new Database();
$pdo = $db->getConnect();
$product = Product::getOneByID($pdo, $id);
$cate = Category::getAll($pdo);
$size = Size::getSizeOnePD($pdo,$product->masp);

if (!$product) {
    die("id không hợp lệ.");
}
else
    $cate1 = Category::getOneByID($pdo,$product->loaisp);

?>

<?php require 'inc/headerad.php'; ?>
<br>
<h2 >Thông tin sản phẩm</h2>
<div class="container" style="padding-bottom: 30px;">
    <div class="align-items-center text-center">
        <?php if($product->hinh != null):        ?>
        <img src="image/<?= $product->hinh ?>" width="300px"></h4>
        <?php endif; ?>
        </div>
    <br>

<table class="table text-center" style="background-color: #fceced; ">
    <tr>
        <td class="table-dark" style="width: 10%">Mã SP</td>
        <td><?= $product->masp ?></td>
    </tr>
    <tr>
        <td class="table-dark">Tên SP</td>
        <td><?= $product->tensp ?></td>
    </tr>
    <tr>
        <td class="table-dark">Mô tả</td>
        <td><?= $product->thietKe ?></td>
    </tr>
    <tr>
        <td class="table-dark">Giá</td>
        <td><?= number_format($product->gia, 0, ',', '.') ?> VNĐ</td>
    </tr>
    <tr>
        <td class="table-dark">Loại sản phẩm</td>
        <td><?= $cate1->tenLoai ?></td>
    </tr>
    <td class="table-dark">Size</td>
        <td><?= $size->MaSize?></td>

    <tr>
    <td class="table-dark">Tuỳ chỉnh</td>
        <td colspan="2" >
            <a class="btn btn-info" href="edit-product.php?id=<?= $product->masp ?>">Edit</a> 
            <a class="btn btn-danger" href="delete-product.php?id=<?= $product->masp ?>">Delete</a> 
        </td>
    </tr>
</table>
        </div>
<?php require 'inc/footer.php'; ?>