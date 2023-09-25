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
$cate = Category::getAll($pdo);
$dh = DonHang::getAll($pdo);

if (isset($_GET['action'])) {
    $donhang= new DonHang;
    $action = $_GET['action'];
    if (isset($_GET['id'])) 
    {
       if ($action == 'delete') 
        {        
            if ($donhang->deleteCT($pdo,$_GET['id'])&& $donhang->delete($pdo,$_GET['id']))
             {
                header("Location: donhang.php");
                exit;
            }
         }
         if ($action == 'update') 
            if($donhang->update($pdo,$_GET['id']))
            {
                header("Location: donhang.php");
                exit;
            }
        }
}
?>

<?php require 'inc/headerad.php'; ?>

<div class="container" style="height: 1000px;">
    <table class="table my-3">
        <thead>
            <tr class="text-center">
                <th>Mã đơn hàng</th>
                <th>Họ tên</th>
                <th>Địa chỉ</th>
                <th>SĐT</th>
                <th>Ngày tạo</th>
                <th>Tình trạng</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php
         $sum=0; 
        foreach ($dh as $product): 
            $kh1 = KH::getKHbyMa($pdo,$product->MaKH);
            ?>
                    <tr class="text-center">
                    <td><?= $product->MaDH ?></td>
                    <td><?= $kh1->TenKH ?></td>
                    <td><?= $kh1->DiaChi ?></td>
                    <td><?= $kh1->SoDT ?></td>
                    <td><?= $product->NgayTao ?></td>
                    <td>
                        <?php if($product->TinhTrang == 1):?> 
                            <a>Đã hoàn thành</a>
                        <?php else:?>
                            <a>Chưa hoàn thành</a>
                        <?php endif;?>
                    </td>

                    <td>
                        <a href="detaildonhang.php?id=<?= $product->MaDH ?>" class="btn btn-danger">Chi tiết</a>
                        <?php if($product->TinhTrang == 0):?> 
                            <a href="donhang.php?action=update&id=<?= $product->MaDH ?>" class="btn btn-danger">Đã giao</a>
                        <?php else:?>
                            <a  class="btn btn-dark">Đã giao</a>
                        <?php endif;?>
                        <a href="donhang.php?action=delete&id=<?= $product->MaDH ?>" class="btn btn-danger">Delete</a>

                    </td>
                    </tr>
            <?php 
                endforeach; 
                ?>
        </tbody>
    </table>
</div>
<?php require 'inc/footer.php'; ?>