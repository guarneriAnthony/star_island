<?php      require_once 'config/function.php';
            require_once 'inc/header.inc.php';                   
?>

<section>
    <div id="carouselIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <h2>First slide label</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id iure rem sequi similique. Doloremque ducimus ea magni nam nisi omnis soluta! Amet doloremque itaque, labore officia pariatur quae quo sunt!</p>
            </div>
            <div class="carousel-item">

                <div id="carouselGalerieIndicators" class="carousel slide">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://picsum.photos/200" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/200" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/200" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselGalerieIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselGalerieIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="carousel-item">
                <h2>Second slide label</h2>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus alias at, dolorum eaque enim eum illo iste libero nesciunt nobis non nostrum quaerat quidem quos recusandae reiciendis saepe! Itaque, repellendus.
            </div>
        </div>

    </div>
</section>




<?php     require_once 'inc/footer.inc.php'; ?>
