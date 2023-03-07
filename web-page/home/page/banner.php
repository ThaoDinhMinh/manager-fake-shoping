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
            <img src={$banner[3]} class='d-block w-100 img-banner' alt={$banner[1]}>
                <div class='carousel-caption d-none d-md-block'>
                <p>{$banner[1]}</p>
                <h5 class='text-banner'>{$banner[2]}</h5>
                <p>{$banner[1]}</p>
                <div class='btn mt-3 mb-1 btn-banner'>
                Show
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