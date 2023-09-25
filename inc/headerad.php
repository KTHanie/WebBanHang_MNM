<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#b1363e">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title><?= $title ?? 'No title' ?></title>
</head>
<body >
    <nav class="navbar navbar-expand" style="background-color: #fceced;">
        <div class="container">
            <a class="navbar-brand" href="indexadmin.php">MyShop</a>
            <div class="navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link"  href="indexadmin.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="new-product.php">Thêm sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="donhang.php">Quản trị đơn hàng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kh.php">Quản trị người dùng </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>                    
                    </li>
                </ul>
                <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Danh mục
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                            <?php foreach ($cate as $row):?>
                                <?php foreach($row as $key => $value):?>
                                    <?php if($key == 'tenLoai') : ?>
                                    <li><a class="dropdown-item" href="productInCate.php?id=<?= $row->maLoai ?>"> <?= $value?></a></li>
                                    <?php endif;?>
                                <?php endforeach;?>
                            <?php endforeach;?>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
    </nav>