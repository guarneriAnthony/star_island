<?php require_once 'config/function.php';
require_once 'inc/header.inc.php';
?>



<!--SECTION TO BECOME A VIP -->
<h2>DEVENIR VIP</h2>
<div class="text-center mx-auto" id="containerVip">
    <img class="border border-danger delImgs imgLeft" src="./assets/Perso1-removebg-preview.png">
    <section class="container d-flex" id="contaireText">

        <div class="align-middle">
            <?php 
            $sql = "SELECT * FROM content WHERE title = 'Vip'";
            $contentVip = execute("$sql")->fetch(PDO::FETCH_ASSOC);
            ?>
            <h3><?= $contentVip['title'] ?></h3>
            <p>
                <?= $contentVip['description'] ?>
            </p>

            <?php 
            $sql = "SELECT * FROM content WHERE title = 'Vip+'";
            $contentVipPlus = execute("$sql")->fetch(PDO::FETCH_ASSOC);
            ?>
            <h3><?= $contentVipPlus['title'] ?></h3>
            <p>
                <?= $contentVipPlus['description'] ?>
            </p>
        </div>

    </section>
    <img class="border border-danger delImgs imgRight" src="./assets/Perso2-removebg-preview.png">
</div>

<?php require_once 'inc/sideBar.php'; ?>
<link rel="stylesheet" href="./css/style_vip.css">
<?php require_once 'inc/footer.inc.php'; ?>