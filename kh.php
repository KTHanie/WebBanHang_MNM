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
$kh = KH::getAll($pdo);
$dh = DonHang::getAll($pdo);

?>

<?php require 'inc/headerad.php'; ?>

<div class="container" style="height: 1000px;">
<a href="newuser.php" class="btn btn-danger">Thêm người dùng</a>

    <table class="table my-3">
        <thead>
            <tr class="text-center">
                <th>Mã KH</th>
                <th>Họ tên</th>
                <th>Địa chỉ</th>
                <th>SĐT</th>
                <th>username</th>
                <th>password</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php
         $sum=0; 
        foreach ($kh as $kh1): 
            ?>
                    <tr class="text-center">
                    <td><?= $kh1->MaKH ?></td>
                    <td><?= $kh1->TenKH ?></td>
                    <td><?= $kh1->DiaChi ?></td>
                    <td><?= $kh1->SoDT ?></td>
                    <td><?= $kh1->username ?></td>
                    <td><?= $kh1->password ?></td>

                    <td>
                        <a href="updatekh.php?id=<?= $kh1->MaKH ?>" class="btn btn-danger">Update</a>
                    </td>
                    </tr>
            <?php 
                endforeach; 
                ?>
        </tbody>
    </table>
</div>
<?php require 'inc/footer.php'; ?>