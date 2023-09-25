<?php
$title = 'Cart page';
require 'class/Database.php';
require 'class/Product.php';
require 'inc/init.php';
require 'class/Auth.php';
require 'class/Size.php';
require 'class/Cart.php';
require 'class/Category.php';
$db = new Database();
$pdo = $db->getConnect();
$cart = Cart::getAll($pdo,$_SESSION['log_detail']);
$cate = Category::getAll($pdo);
$t=0;
foreach($cart as $r)
    $t+=$r->quantity;
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
if($action=='update')
{
    if($_SERVER["REQUEST_METHOD"]== "POST")
    {
        if($a->update($pdo, $_SESSION['log_detail'],$_POST['id'],$_POST['qty']))
        header("Location: cart.php?action=update");
        exit;
    }
}

}

?>

<?php require 'inc/header.php'; ?>

<div class="container" style="height: 1000px;">
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
        foreach ($cart as $product): 
               $sum += $product->price *$product->quantity;
               $size = Size::getSizeOnePD($pdo,$product->id);

            ?>
                    <tr class="text-center">
                    <td><a href="product.php?id=<?= $product->id ?>"style="color: black; text-decoration: none;"><?= $product->name ?></a></td>
                    <td><?= $size->MaSize ?></td>
                        <td><?= number_format($product->price, 0, ',', '.') ?> VNĐ</td>
                        <form method="post" > 
                        <td>
                            <input class="form-control" type="number" value="<?= $product->quantity ?>" name="qty" min="1" style="width: 50px;" id="qty" />
                            <input class="form-control" id="id" value="<?= $product->id ?>" type="hidden" name="id" />

                        </td>
                        <td>
                        <button type="submit" class="btn btn-danger" >Update</button>
                        <a href="cart.php?action=delete&id=<?= $product->id ?>" class="btn btn-danger">Delete</a>
                        </td>
                       </form>
                    </tr>
            <?php 
                    $i++; $total += $product->price * $cart['qty'];
                endforeach; 
                ?>
            <tr>
                <td colspan="5" class="text-center">
                    <h4>Tổng tiền: <?= number_format($sum, 0, ',', '.') ?> VNĐ</h4>
                </td>
            </tr>
            <tr>
            </tr>

        </tbody>
    </table>
    <?php if($t!=0):?>
        <div style="text-align: right; padding-right: 50px;">
                    <a href="thanhtoan.php" class="btn btn-danger">Thanh Toán</a>
                </div>
    <?php endif;?>
</div>

<?php require 'inc/footer.php'; ?>