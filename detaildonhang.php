<?php
$title = 'Cart page';
require 'class/Database.php';
require 'class/Product.php';
require 'inc/init.php';
require 'class/Auth.php';
require 'class/Size.php';
require 'class/Cart.php';
require 'class/Category.php';
require 'class/DonHang.php';
if (! isset($_GET["id"])) {
    die("Cần cung cấp id sản phẩm !!!");
}

$db = new Database();
$pdo = $db->getConnect();
$cate = Category::getAll($pdo);
$dh = DonHang::getCT($pdo,$_GET['id']);
if (!$dh) {
    die("id không hợp lệ.");
}
if (isset($_GET['action'])) {
    echo $_GET['qty'];
    $action = $_GET['action'];
    $a= new Cart;
    if ($action == 'delete') 
    {
        if (isset($_GET['id'])) 
        {
            if ($a->delete($pdo, $_SESSION['log_detail'],$_GET['id'])) {
                header("Location: cart.php?action=update");
                exit;
        }
    }
}

}

?>

<?php require 'inc/headerad.php'; ?>

<div class="container" style="height: 1000px; padding-top: 30px;">
<h3>Mã đơn: <?= $_GET['id']?></h3>
    <table class="table my-3">
        <thead>
            <tr class="text-center">
                <th>Tên sản phẩm</th>
                <th>Size</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php
         $sum=0; 
        foreach ($dh as $row):
            $product = Product::getOneByID($pdo,$row->MaSP); 
            $size = Size::getSizeOnePD($pdo,$product->masp);
            $sl= DonHang::getSL($pdo,$row->MaSP,$_GET['id']);
            ?>
                    <tr class="text-center">
                    <td><?= $product->tensp ?></td>
                    <td><?= $size->MaSize ?></td>
                        <td><?= number_format($product->gia, 0, ',', '.') ?> VNĐ</td>
                        <?php foreach ($sl as $key =>$value):
                            if($key =='SL'):?>
                                <td><?= $value?></td>
                            <?php endif;
                        endforeach; ?>
                    </tr>
            <?php 
                endforeach; 
                ?>

        </tbody>
    </table>
</div>

<?php require 'inc/footer.php'; ?>