<?php require_once 'config/function.php';
require_once 'inc/header.inc.php';
?>
<script src="./script/scriptTeam.js" defer></script>



<!--ROLES OF TEAMMATES-->
<h2>Team</h2>
<ul class="roles" id="filtrer">
    <li class="firstLi" id="all">Tous</li>
    <li id="admin">Admins</li>
    <li id="moderateur">Modérateurs</li>
    <li id="developpeur">Développeurs</li>
    <li id="mapper">Mappeurs</li>
    <li id="helper" class="lastLi">Helpers</li>
</ul>
<div class="container">
    <!--ROW 1 / 1-->
    <div class="row">
        <?php
        $avatar = ['Souen4.png', 'charmilia4.png', 'hans4.png'];
        $teams = execute("SELECT * FROM team")->fetchAll(PDO::FETCH_ASSOC);

        foreach ($teams as $key => $team) :
            $sql = "SELECT m.name, m.path, mt.type 
        FROM media m
        INNER JOIN media_type mt ON mt.id = m.media_type_id
        INNER JOIN team_media tm ON  tm.media_id = m.id
        WHERE tm.team_id = '$team[id]'
         ";
            $medias = execute($sql)->fetchAll(PDO::FETCH_ASSOC);

            $tab = [];
            foreach ($medias as $media) {
                $tab[$media['type']][] = $media;
            }
            $medias = $tab;


        ?>
            <div class="col-2">
                <div class="dropdown">
                    <a class="dropdown-toggle" type="button" onclick="toggleDropdown(this)" aria-haspopup="true" aria-expanded="false">
                        <?php if ($medias['link'] == 'avatar') : ?>
                            <img src="<?= $medias['path'];  ?>" alt="avatar" id="" class="myImage">
                        <?php else : ?>
                            <img src="./assets/<?= $avatar[array_rand($avatar)];  ?>" alt="avatar" id="" class="myImage">
                        <?php endif; ?>
                    </a>
                    <div class="dropdown-menu" style="display: none;">
                        <a class="dropdown-item" href="lien_vers_reseau_social_1"></a>

                        <?php
                        foreach ($medias['link'] as $media) : ?>
                            
                            
                       
                        
                            <a class="dropdown-item" href="<?= $media['path'] ?>"><?= $media['name'] ?></a>
                        <?php ;
                        endforeach; 
                        ?>
                    </div>
                    <p class="name"><?= $team['nickname'] ?></p>
                    <p class="role"><?= $team['role'] ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>




<?php require_once 'inc/sideBar.php'; ?>
<link rel="stylesheet" href="./css/style_team.css">
<?php require_once 'inc/footer.inc.php'; ?>