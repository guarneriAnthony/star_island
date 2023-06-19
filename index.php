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
        <h2 class="titleIndex">Bienvenue sur <br> Star'island</h2>
            <p class="text-index">Bienvenue sur notre serveur dédié à GTA 5 ! Rejoignez notre communauté passionnée et profitez d'une expérience de jeu gratuite et captivante. <br><br>
                Plongez dans un monde ouvert où vous pourrez simuler la vie urbaine, participer à des braquages palpitants et interagir avec une communauté active. <br><br>
                Rejoignez-nous dès maintenant pour des moments distrayants et intenses.</p>
        </div>
        <!--ITEM 2-->
        <div class="carousel-item" id="carouselWidth">
        <h2 class="titleIndexGalerieInside">Bienvenue sur <br> Star'island</h2>
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
        <h2 class="titleIndex">Bienvenue sur Star'island</h2>
            <section class="commentTopServeur">
                <img class="" src="./assets/topServeurCE.png">
            </section>
        </div>
    </div>
</div>
<!--ATTENTION LE STYLE DE SIDEBAR AFFECT LINDEX-->
<?php require_once 'inc/sideBar.php';?>
<!--Espace commentaire du bas-->
<div class=" container containerComments">
    <section class="commentsLeft commentsBorders">
        <div class="commentOne commentsBordersLeft"></div>
        <div class="commentTwo commentsBordersRight"></div>
    </section>
    <section class="commentsRight">
        <div class="commentThree commentsBordersLeft"></div>
        <div class="commentFour commentsBordersRight"></div>
    </section>


    <div class=" text-center avisBottom">
        <div class="card-body" >
            <h5 class="card-title">Votre avis nous intéresse</h5>
            <p class="card-text"><img src="./assets/RéseauxSociaux.png"></p>
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
            <button></button>
            
        </div>

    </div>




    <?php require_once 'inc/footer.inc.php'; ?>