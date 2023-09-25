<?php
$title = 'Login page';
require 'inc/init.php';
require 'class/Auth.php';
require 'class/Database.php';
require 'class/Category.php';
$db = new Database();
$pdo = $db->getConnect();
$cate = Category::getAll($pdo);

$error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $error = Auth::login($username, $password);
}
?>
<?php require 'inc/header.php'; ?>

<div class="container text-center d-flex align-items-center min-vh-100">
    <div class="card mx-auto py-5" style="width: 25rem; background-color:#eea5a4 ;">
        <h1>Login</h1>
        <div class="card-body">
            <form method="post" >
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary" name="login">Login</button>
            </form>
        </div>
        <?php if ($error): ?>
            <div class="card-footer">
                <p class="text-danger"><?= $error ?></p>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php
    require 'inc/footer.php';
?>