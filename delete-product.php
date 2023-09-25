<?php
$title = 'Delete Product';
require 'class/Database.php';
require 'class/Product.php';
require 'class/Category.php';
require 'class/Size.php';
$db = new Database();
$pdo = $db->getConnect();
$cate = Category::getAll($pdo);
if (! isset($_GET["id"])) {
    die("Cần cung cấp id sản phẩm !!!");
}

$id = $_GET["id"];
$product = Product::getOneByID($pdo, $id);
$s= new Size;
if (!$product) {
    die("id không hợp lệ.");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($s->delete($pdo,$id))
    if($product->delete($pdo)) {
        header("Location: indexadmin.php");
        exit;
    }
}
?>
<?php require 'inc/headerad.php'; ?>
<form method="post" class="w-50 m-auto " style="height: 1000px;">
    <a>Bạn có chắc chắn muốn xoá sảm phẩm?</a>
    </br>
        <button type="submit" class="btn btn-primary">Yes</button>
        <a class="btn btn-primary" href="productad.php?id=<?= $product->masp ?>">Cancel</a>
</form>
<?php require 'inc/footer.php'; ?>
