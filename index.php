<?php require_once 'config/function.php';
require_once 'inc/header.inc.php';
?>
<?php
$dt = time();
$dtFormat = date("d/m/Y", $dt);

if ($_POST) {
    execute("INSERT INTO comment (comment, publish_date, rating) VALUES (:comment, NOW(), :rating)", array(
        ':comment' => $_POST['comment'],
        ':rating' => $_POST['rating'],
    ),);
    header('Location: /PHP/star_island/');
}

$comments = execute("SELECT * FROM comment WHERE validate = 1 ORDER BY id DESC LIMIT 4")->fetchAll(PDO::FETCH_ASSOC);
?>
<script src="script/scriptIndex.js" defer></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


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
            <p class="text-index textIndex">Bienvenue sur notre serveur dédié à FiveM ! Rejoignez notre communauté passionnée et profitez d'une expérience de jeu gratuite et captivante. <br><br>
                Plongez dans un monde ouvert où vous pourrez simuler la vie urbaine, participer à des braquages palpitants et interagir avec une communauté active. <br><br>
                Rejoignez-nous dès maintenant pour des moments distrayants et intenses.</p>
        </div>
        <!--ITEM 2-->
        <div class="carousel-item" id="carouselWidth">
            <h2 class="titleIndexGalerieInside item2">Bienvenue sur <br> Star'island</h2>
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
            <h2 class="titleIndex">Bienvenue sur <br> Star'island</h2>
            <section class="">
                <img class="commentTopServeur" alt="image en attente de api top serveur" src="./assets/topServeurCE.png">
            </section>
        </div>
    </div>
</div>

<!--INCLUDE SIDEBAR DISCORD-->
<?php require_once 'inc/sideBar.php'; ?>

<!--COMMENT SECTION BELOW-->
<div class=" container containerComments">
    <!--COMMENTS LEFT-->
    <section class="commentsLeft commentsBorders">

        <?php
        $avatar = ['Souen4.png', 'charmilia4.png', 'hans4.png'];

        $direction = true;
        foreach ($comments as $comment) :
            if ($direction) {
                $position = "Left";
                $direction = false;
            } else {
                $position = "Right";
                $direction = true;
            }
        ?>
            <?php if ($comment['validate'] == 1) : ?>
                <div class="comment<?= $position ?>">
                    <div class="containerStars">
                        <?php
                        $i = 0;
                        for (; $i < $comment['rating']; $i++) : ?>
                            <img src="./assets/star.png" class="imgComments" alt="image etoile"></img>
                        <?php
                        endfor;
                        for (; $i < 5; $i++) : ?>
                            <img src="./assets/starBlack.png" class="imgComments" alt="image etoile"></img>
                        <?php endfor ?>
                    </div>
                    <div class="containerInterComments">
                        <div class="containerImgComments">

                            <img src="./assets/<?= $avatar[array_rand($avatar)];  ?>" class="imgComments" alt="image avatar">
                        </div>
                        <div class="containerTextComments">
                            <p class="comments"><?= $comment['comment'] ?></p>
                            <p class="dateComments">Publier: <?= $comment['publish_date'] ?></p>
                        </div>

                    </div>
                </div>
            <?php endif; ?>

        <?php endforeach ?>
    </section>

    <!--CARD TO LET ONE NOTICE  -->
    <div class="card text-center avisBottom">
        <div class="card-body formIndex">
            <h5 class="card-title">Votre avis nous intéresse</h5>
            <div class="containerStars">
                <img src="./assets/starBlack.png" class="imgComments changeStar star0" alt="image etoile" data_position="1"></img>
                <img src="./assets/starBlack.png" class="imgComments changeStar star1" alt="image etoile" data_position="2"></img>
                <img src="./assets/starBlack.png" class="imgComments changeStar star2" alt="image etoile" data_position="3"></img>
                <img src="./assets/starBlack.png" class="imgComments changeStar star3" alt="image etoile" data_position="4"></img>
                <img src="./assets/starBlack.png" class="imgComments changeStar star4" alt="image etoile" data_position="5"></img>
            </div>
            <form class="form-floating" method="post">
                <textarea name="comment" id="floatingTextarea2" class="form-control" placeholder="Ecrivez votre commentaire :" style="height: 100px"></textarea>
                <label for="floatingTextarea2">Ecrivez votre commentaire :</label>
                <input type="hidden" id="nbrStar" name="rating" value="" />
                <button type="submit" class="button-46">Publier</button>
            </form>

        </div>
    </div>
    


    <link rel="stylesheet" href="./css/style_index.css">
    <?php require_once 'inc/footer.inc.php'; ?>