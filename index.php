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
            <!--ITEM 2-->
                <div class="carousel-item">
                    
                <div class="gallery">
    <div id="slider" class="slider">
    </div>
    <div class="arrows">
        <div class="left">
        <svg viewBox="0 0 512 512" width="100" title="chevron-circle-left">
            <path d="M256 504C119 504 8 393 8 256S119 8 256 8s248 111 248 248-111 248-248 248zM142.1 273l135.5 135.5c9.4 9.4 24.6 9.4 33.9 0l17-17c9.4-9.4 9.4-24.6 0-33.9L226.9 256l101.6-101.6c9.4-9.4 9.4-24.6 0-33.9l-17-17c-9.4-9.4-24.6-9.4-33.9 0L142.1 239c-9.4 9.4-9.4 24.6 0 34z" />
        </svg>
        </div>
        <div class="right">
        <svg viewBox="0 0 512 512" width="100" title="chevron-circle-right">
            <path d="M256 8c137 0 248 111 248 248S393 504 256 504 8 393 8 256 119 8 256 8zm113.9 231L234.4 103.5c-9.4-9.4-24.6-9.4-33.9 0l-17 17c-9.4 9.4-9.4 24.6 0 33.9L285.1 256 183.5 357.6c-9.4 9.4-9.4 24.6 0 33.9l17 17c9.4 9.4 24.6 9.4 33.9 0L369.9 273c9.4-9.4 9.4-24.6 0-34z" />
        </svg>
        </div>
    </div>
    </div>
            </div>
            <!--FIN ITEM 2-->
            <!--Troisieme item Carousel-->
            <div class="carousel-item">
                <section class="commentTopServeur">
                <img class="" src="./assets/discord.png">
                </section>
            </div>
            <!--FIN troisieme item Carousel-->
        </div>
    </div>
    <!--Espace commentaire du bas-->
    <div class="containerComments">
        <div class="commentOne"></div>
        <div class="commentTwo"></div>
        <div class="commentThree"></div>
        <div class="commentFour"></div>

        <div class="card text-center">
  <div class="card-header">
    Featured
  </div>
  <div class="card-body">
    <h5 class="card-title">Votre avis nous intéresse</h5>
    <p class="card-text"><img src="./assets/RéseauxSociaux.png"></p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
  
</div>
    <!--FIN Espace commentaire du bas-->
</section>




<?php     require_once 'inc/footer.inc.php'; ?>
