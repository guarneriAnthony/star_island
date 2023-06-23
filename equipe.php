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
    <li id="developpeur">Développeur</li>
    <li id="mappeur">Mappeur</li>
    <li class="lastLi" id="helper">Helpers</li>
</ul>
<div class="container">
    <!--ROW 1 / 3-->
    <div class="row">
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
                <p class="role">Admin</p>
                <p class="name">Name</p>
            </div>
        </div>
        <div class="col-2">
            <div class="dropdown">
                <a class="dropdown-toggle" type="button" onclick="toggleDropdown(this)" aria-haspopup="true" aria-expanded="false">
                    <img src="./assets/Souen4.png" alt="avatar" id="" class="myImage">
                    <p class="role">Modo</p>
                    <p class="name">Name</p>
                </a>
                <div class="dropdown-menu" style="display: none;">
                    <a class="dropdown-item" href="lien_vers_reseau_social_1">Réseau social 1</a>
                    <a class="dropdown-item" href="lien_vers_reseau_social_2">Réseau social 2</a>
                    <a class="dropdown-item" href="lien_vers_reseau_social_3">Réseau social 3</a>
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="dropdown">
                <a class="dropdown-toggle" type="button" onclick="toggleDropdown(this)" aria-haspopup="true" aria-expanded="false">
                    <img src="./assets/charmilia4.png" alt="avatar" id="" class="myImage">
                    <p class="role">mappeur , modo</p>
                    <p class="name">Name</p>
                </a>
                <div class="dropdown-menu" style="display: none;">
                    <a class="dropdown-item" href="lien_vers_reseau_social_1">Réseau social 1</a>
                    <a class="dropdown-item" href="lien_vers_reseau_social_2">Réseau social 2</a>
                    <a class="dropdown-item" href="lien_vers_reseau_social_3">Réseau social 3</a>
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="dropdown">
                <a class="dropdown-toggle" type="button" onclick="toggleDropdown(this)" aria-haspopup="true" aria-expanded="false">
                    <img src="./assets/hans4.png" alt="avatar" id="" class="myImage">
                    <p class="role">developpeur</p>
                    <p class="name">Name</p>
                </a>
                <div class="dropdown-menu" style="display: none;">
                    <a class="dropdown-item" href="lien_vers_reseau_social_1">Réseau social 1</a>
                    <a class="dropdown-item" href="lien_vers_reseau_social_2">Réseau social 2</a>
                    <a class="dropdown-item" href="lien_vers_reseau_social_3">Réseau social 3</a>
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="dropdown">
                <a class="dropdown-toggle" type="button" onclick="toggleDropdown(this)" aria-haspopup="true" aria-expanded="false">
                    <img src="./assets/Souen4.png" alt="avatar" id="" class="myImage">
                    <p class="role">Helper</p>
                    <p class="name">Name</p>
                </a>
                <div class="dropdown-menu" style="display: none;">
                    <a class="dropdown-item" href="lien_vers_reseau_social_1">Réseau social 1</a>
                    <a class="dropdown-item" href="lien_vers_reseau_social_2">Réseau social 2</a>
                    <a class="dropdown-item" href="lien_vers_reseau_social_3">Réseau social 3</a>
                </div>
            </div>
        </div>
        <!--ROW 2 / 3-->
        <div class="row">
            <div class="col-2">
                <img src="./assets/hans4.png" alt="avatar" class="myImage">
                <p class="role">mappeur</p>
                <p class="name">Name</p>
            </div>
            <div class="col-2">
                <img src="./assets/Souen4.png" alt="avatar" class="myImage">
                <p class="role">developpeur</p>
                <p class="name">Name</p>
            </div>
            <div class="col-2">
                <img src="./assets/hans4.png" alt="avatar" class="myImage">
                <p class="role">Helper</p>
                <p class="name">Name</p>
            </div>
            <div class="col-2">
                <img src="./assets/charmilia4.png" alt="avatar" class="myImage">
                <p class="role">Modo</p>
                <p class="name">Name</p>
            </div>
            <div class="col-2">
                <img src="./assets/hans4.png" alt="avatar" class="myImage">
                <p class="role">developpeur</p>
                <p class="name">Name</p>
            </div>
            <div class="col-2">
                <img src="./assets/Souen4.png" alt="avatar" class="myImage">
                <p class="role">mappeur</p>
                <p class="name">Name</p>
            </div>
        </div>
        <!--ROW 3 / 3-->
        <div class="row">
            <div class="col-2">
                <img src="./assets/hans4.png" alt="avatar" class="myImage">
                <p class="role">Helper</p>
                <p class="name">Name</p>
            </div>
            <div class="col-2">
                <img src="./assets/Souen4.png" alt="avatar" class="myImage">
                <p class="role">developpeur</p>
                <p class="name">Name</p>
            </div>
            <div class="col-2">
                <img src="./assets/hans4.png" alt="avatar" class="myImage">
                <p class="role">admin</p>
                <p class="name">Name</p>
            </div>
            <div class="col-2">
                <img src="./assets/charmilia4.png" alt="avatar" class="myImage">
                <p class="role">mappeur</p>
                <p class="name">Name</p>
            </div>
            <div class="col-2">
                <img src="./assets/hans4.png" alt="avatar" class="myImage">
                <p class="role">developpeur</p>
                <p class="name">Name</p>
            </div>
        </div>
    </div>
</div>

<?php require_once 'inc/sideBar.php'; ?>
<link rel="stylesheet" href="./css/style_equipe.css">
<?php require_once 'inc/footer.inc.php'; ?>