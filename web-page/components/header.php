<nav class="navbar navbar-expand-lg bg-body-tertiary container">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <div class="img-logo"><img class="d-block w-100" src="https://i.imgur.com/wyemBld.png" alt=""></div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="btn btn-sm" href="index.php">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-sm" href="index.php?page=product">Sản phẩm</a>
                </li>
                <li class="nav-item"> <a class="btn btn-sm" href="index.php?page=news">Tin tức</a></li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            </form>
            <div class="user-action d-flex align-center">
                <?php if (isset($_SESSION["user_id"])) : ?>
                    <p class="user-name btn btn-sm">Chào mừng <a href="#"><?= $user["name_user"]; ?></a></p>
                    <p class="user-name btn btn-sm"><a href="./web-page/reglogin/logout.php">Đăng xuất</a></p>
                <?php else : ?>
                    <p><a class="btn btn-sm" href="./web-page/reglogin/login.php">Đăng nhập</a></p>
                    <p><a class="btn btn-sm" href="./web-page/reglogin/resign.php">Đăng ký</a></p>
                <?php endif; ?>
                <div class="cart-mean">
                    <a class="btn btn-sm" href="index.php?page=cart">Cart</a>
                    <?php
                    if (isset($_SESSION["user_id"])) :
                    ?>
                        <p class="number-oder"> <?php
                                                echo count($_SESSION["cart"]);
                                                ?>
                        </p>
                    <?php else : ?>
                        <p></p>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</nav>