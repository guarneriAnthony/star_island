<?php require_once 'config/function.php';
require_once 'inc/header.inc.php';
?>
<script src="./script/scriptEquipe.js" defer></script>


<!--ROLES OF TEAMMATES-->
<h2>L'equipe</h2>
<ul class="roles" id="filtrer">
    <li class="firstLi" id="all">Tous</li>
    <li id="admin">Admin</li>
    <li id="modo">Modo</li>
    <li id="développeur">Développeur</li>
    <li id="mapper">Mappeur</li>
    <li class="lastLi" id="helper">Helpers</li>
</ul>
<div class="container">
    <!--ROW 1 / 3-->
    <div class="row">
        <?php
        $i = 0;
        $teams = execute("SELECT * FROM team")->fetchAll(PDO::FETCH_ASSOC);
        foreach ($teams as $team) {
        ?>
            <div class="col-2">
                <div class="dropdown">
                    <a class="dropdown-toggle" type="button" onclick="toggleDropdown(this)" aria-haspopup="true" aria-expanded="false">
                        <img src="./assets/hans4.png" alt="avatar" id="" class="myImage">
                    </a>
                    <div class="dropdown-menu" style="display: none;">
                        <a class="dropdown-item" href="lien_vers_reseau_social_1">Réseau social 1</a>
                        <a class="dropdown-item" href="lien_vers_reseau_social_2">Réseau social 2</a>
                        <a class="dropdown-item" href="lien_vers_reseau_social_3">Réseau social 3</a>
                    </div>
                    <p class="role"><?= $team['role'] ?></p>
                    <p class="name"><?= $team['nickname'] ?></p>
                </div>
            </div>
        <?php } ?>
    </div>
</div>





<?php require_once 'inc/sideBar.php'; ?>
<link rel="stylesheet" href="./css/style_equipe.css">
<?php require_once 'inc/footer.inc.php'; ?>