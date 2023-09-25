<?php
$title = 'Cart page';
require 'class/Database.php';
require 'class/Product.php';
require 'inc/init.php';
require 'class/Auth.php';
require 'class/Size.php';
require 'class/Cart.php';
require 'class/DonHang.php';
require 'class/KH.php';
require 'class/Category.php';
$db = new Database();
$pdo = $db->getConnect();
$cart = Cart::getAll($pdo,$_SESSION['log_detail']);
$cate = Category::getAll($pdo);
$kh = KH::getKHbyId($pdo,$_SESSION['log_detail']);
$dh = DonHang::getAll($pdo);
$i=1;
foreach($dh as $q)
    $i++;

$t=0;
$date = getdate();
if($date['mon']<10)
    $thang="0".$date['mon'];
else
    $thang=$date['mon'];

$a= $date['year']."-".$thang."-".$date['mday'];
foreach($cart as $r)
    $t+=$r->quantity;
if (isset($_GET['action'])) {
    $taodon= new DonHang;
    $taodon->MaKH=$kh->MaKH;
    $taodon->NgayTao=$a;
    $taodon->TinhTrang="0";
    $taodon->MaDH=$i;
    do{
        $j=$taodon->create($pdo);
     if($j)
        {
            foreach ($cart as $product)
            if($taodon->createCT($pdo,$product,$i))
            {  }            
            if(Cart::deleteAll($pdo, $_SESSION['log_detail']))
            {
                header('location: dathangthanhcong.php');
                exit;        
            
            }
        }
        $i++;
        $taodon->MaDH=$i;
    }while(!$j);
}
?>

<?php require 'inc/header.php'; ?>
<div class="container" style="height: 1000px; padding-top: 30px;">
    <div class="row">
        <div class="col-8">

            <h3 style="color: brown; ">Thông tin đơn hàng</h3>
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
                                    <?= $product->quantity ?>
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
                <div style="text-align: right; padding-right: 50px;">
                                <a href="thanhtoan.php?action=pay" class="btn btn-danger">Xác Nhận Đơn Hàng</a>
                </div>
            </div>
            <div class="col-4">

                <h3 style="color: brown;">Thông tin giao hàng</h3>
                <div style="padding-left: 30px;">
                    <a><b>Họ Tên KH:</b> <?= $kh->TenKH?></a></br>
                    <a><b>Số điện thoại:</b> <?= $kh->SoDT?></a></br>
                    <a><b>Địa chỉ:</b> <?= $kh->DiaChi?></a></br>
                </div>
            </div>

        </div>

</div>

<?php require 'inc/footer.php'; ?>