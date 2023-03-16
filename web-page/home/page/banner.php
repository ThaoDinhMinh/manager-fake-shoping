<?php
$sql_banner = "SELECT * FROM banners";
$getBanner = $mysqli->query($sql_banner);

?>


<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <?php
        while ($banner = mysqli_fetch_array($getBanner)) {
            echo   " <div class='carousel-item active'>
            <img src='/admin/banners/action/{$banner['img_upload']}' class='d-block w-100 img-banner' alt={$banner['title']}>
                <div class='carousel-caption d-none d-md-block'>
                <p>{$banner['title']}</p>
                <h5 class='text-banner'>{$banner['content']}</h5>
                <p>{$banner['title']}</p>
                <div class='mt-3 mb-1 '>
                <a class='btn-banner' href='index.php?page=product'>Xem thêm</a>
                </div>
            </div>
        </div>";
        }
        ?>

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>