<?php require_once 'config/function.php';
require_once 'inc/header.inc.php';
?>
<script src="./script/scripGalerie.js" defer></script>


<div class="containerGallerie">
    <h2 class="headerGalerie">GALERIE</h2>
    <!--ZOOM IN ON THE ACTIVE IMAGE IN THE GALLERY-->
    <div id="selectedImage"></div>
    <!--GALLERY-->
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

<?php require_once 'inc/sideBar.php'; ?>
<link rel="stylesheet" href="./css/style_galerie.css">
<?php require_once 'inc/footer.inc.php'; ?>