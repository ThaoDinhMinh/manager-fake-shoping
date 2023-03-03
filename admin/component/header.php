<div class="d-flex align-items-center justify-content-center">
    <?php if (isset($_SESSION["admin_id"])) : ?>
        <p class="text-name">Hello <?= $admin["name"] ?></p>
        <p class=""><a class="btn btn-primary" href="index.php?quanly=banners">Quản lý banner</a></p>
        <p class=""><a class="btn btn-primary" href="index.php?quanly=products">Quản lý product</a></p>
        <p class=""><a class="btn btn-primary" href="index.php?quanly=order">Quản lý oder user</a></p>
        <p class=""><a class="btn btn-primary" href="index.php?quanly=users">Quản lý users</a></p>
        <p class=""><a class="btn btn-secondary" href="logout.php">Đăng xuất</a></p>

    <?php else : ?>
        <div class="d-flex align-items-center">
            <p class=""><a class="btn btn-primary" href="login.php">Đăng nhập</a></p>
            <p class=""><a class="btn btn-primary" href="signup.php">Đăng ký</a></p>
        </div>
    <?php endif; ?>
</div>