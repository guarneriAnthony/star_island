<?php require_once 'config/function.php';
require_once 'inc/header.inc.php';
?>


<div id="carouselIndicators" class="carousel slide">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <!--ITEM 1-->
        <div class="carousel-item active">
            <h2>First slide label</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id iure rem sequi similique. Doloremque ducimus ea magni nam nisi omnis soluta! Amet doloremque itaque, labore officia pariatur quae quo sunt!</p>
        </div>
        <!--ITEM 2-->
        <div class="carousel-item" id="carouselWidth">
            <div class="gallery">
                <div id="slider" class="slider">
                </div>
                <div class="arrows">
                    <div class="left">
                        <button class="carousel-control-prev" type="button">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                    </div>
                    <div class="right">
                        <button class="carousel-control-next" type="button">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!--ITEM 3-->
        <div class="carousel-item">
            <section class="commentTopServeur">
                <img class="" src="./assets/discord.png">
            </section>
        </div>
    </div>
</div>
<!--Espace commentaire du bas-->
<div class="containerComments">
    <div class="commentOne rounded-top rounded-start"></div>
    <div class="commentTwo"></div>
    <div class="commentThree"></div>
    <div class="commentFour"></div>

    <div class="card text-center">
        <div class="card-body">
            <h5 class="card-title">Votre avis nous intéresse</h5>
            <p class="card-text"><img src="./assets/RéseauxSociaux.png"></p>
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
            <a href="#" class="btn btn-primary">Publier</a>
        </div>

    </div>




    <?php require_once 'inc/footer.inc.php'; ?>