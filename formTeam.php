<style>
    main {
        margin-top: 20vh;
    }
</style>
<script src="script/scriptFormTeam.js" defer></script>
<?php
require_once './config/function.php';
require_once './inc/formHeader.inc.php';

$pages =  execute("SELECT * FROM page WHERE meta_title = 'Team'")->fetch(PDO::FETCH_ASSOC);
$typesLink =  execute("SELECT * FROM media_type WHERE type = 'link'")->fetch(PDO::FETCH_ASSOC);
$typesAvatar =  execute("SELECT * FROM media_type WHERE type = 'avatar'")->fetch(PDO::FETCH_ASSOC);

/*Debut de mon controle de formulaie de team*/
if (!empty($_POST)) {
    $error = false;

    if (empty($_POST['nickname'])) {
        $nickname = 'Le nom est obligatoire';
        $error = true;
    }
    if (empty($_POST['role'])) {
        $role = 'Le role est obligatoire';
        $error = true;
    }


    if (!$error) {

        if (empty($_POST['id'])) {

            $lastIdTeam =  execute("INSERT INTO team (nickname, role) VALUES (:nickname, :role)", array(
                ':nickname' => $_POST['nickname'],
                ':role' => $_POST['role']
            ), ' ');

           
            foreach ($_POST['link'] as $key => $value) {
                if (!empty($value)) {
                    $lastIdMedia =  execute("INSERT INTO media (name, path, pages_id, media_type_id) 
                    VALUES (:name, :path, :pages_id, :media_type_id)", array(
                        ':name' => $key,
                        ':path' => $value,
                        ':media_type_id' => $typesLink['id'],
                        ':pages_id' => $pages['id']
                    ), ' ');
                    execute("INSERT INTO team_media (team_id, media_id) VALUES (:team_id, :media_id)", array(
                        ':team_id' => $lastIdTeam,
                        ':media_id' => $lastIdMedia
                    )); 
                }
                
            }
        
            if (!empty($_FILES['media_file']['name'])) {
                 
                $media_path = 'upload/' . $_FILES['media_file']['name'];
                move_uploaded_file($_FILES['media_file']['tmp_name'], $media_path);

                $lastIdImg = execute("INSERT INTO media (name, path, pages_id, media_type_id) 
                VALUES (:name, :path, :pages_id, :media_type_id)", array(
                    ':name' => 'Avatar',
                    ':path' => $media_path,
                    ':media_type_id' => $typesAvatar['id'],
                    ':pages_id' => $pages['id']
                ), ' '); 
                execute("INSERT INTO team_media (team_id, media_id) VALUES (:team_id, :media_id)", array(
                    ':team_id' => $lastIdTeam,
                    ':media_id' => $lastIdImg
                ));
            }
            header("location: ./formTeam.php");
            exit();
        } else {
            execute("UPDATE team SET nickname = :nickname, role = :role WHERE id = :id", array(
                ":nickname" => $_POST['nickname'],
                ":role" => $_POST['role'],
                ":id" => $_POST['id']
            ));
            header('location: ./formTeam.php');
            exit();
        }
    }
}


$teams = execute("SELECT * FROM team")->fetchAll(PDO::FETCH_ASSOC);
$teamMedias = execute("SELECT * FROM team t INNER JOIN team_media tm ON t.id = tm.id")->fetchAll(PDO::FETCH_ASSOC);


if (!empty($_GET) && isset($_GET['id']) && isset($_GET['a']) && $_GET['a'] == 'edit') {
    $team_id = execute("SELECT * FROM team WHERE id = :id", array(
        ':id' => $_GET['id']
    ))->fetch(PDO::FETCH_ASSOC);
}
if (!empty($_GET) && isset($_GET['id']) && isset($_GET['a']) && $_GET['a'] == 'del') {
    $team_id = execute("DELETE FROM team WHERE id = :id", array(
        ':id' => $_GET['id']
    ));
    header('location: ./formTeam.php');
    exit();
}

?>

<!--Post de Media-->


<form class="mt-5 w-75 mx-auto" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="nickname" class="form-label">Nom :</label>
        <input name="nickname" type="text" class="form-control" id="nickname" value="<?= $team_id['nickname'] ?? ""; ?>">
        <small class="text-danger"><?= $nickname ?? ""; ?></small>
    </div>
    <div class="mb-3">
        <label for="role" class="form-label">Role :</label>
        <input name="role" type="text" class="form-control" id="role" value="<?= $team_id['role'] ?? ""; ?>">
        <small class="text-danger"><?= $role ?? ""; ?></small>
    </div>


    <div class="form-check">
        <label class="form-check-label" for="flexCheckDefault"></label>
        <input class="form-check-input" type="checkbox" value="discord" id="flexCheckDefault">
       Votre Discord 
    </div>
    <div class="mb-3  d-none">
        <label for="link" class="form-label"></label>
        <input name="link[discord]" type="text" class="form-control" id="link" value="<?= $team_id['link'] ?? ""; ?>">
        <small class="text-danger"><?= $link ?? ""; ?></small>
    </div>

    <div class="form-check">
        <label class="form-check-label" for="flexCheckDefault"> </label>
        <input class="form-check-input" type="checkbox" value="discord" id="flexCheckDefault">
        Votre Tic-Toc
    </div>
    <div class="mb-3 d-none">
        <label for="link" class="form-label"></label>
        <input name="link[tic]" type="text" class="form-control" id="link" value="<?= $team_id['link'] ?? ""; ?>">
        <small class="text-danger"><?= $link ?? ""; ?></small>
    </div>

    <div class="form-check">
        <label class="form-check-label" for="flexCheckDefault"> </label>
        <input class="form-check-input" type="checkbox" value="discord" id="flexCheckDefault">
        Votre Instagram
    </div>
    <div class="mb-3 d-none">
        <label for="link" class="form-label"></label>
        <input name="link[instagram]" type="text" class="form-control" id="link" value="<?= $team_id['link'] ?? ""; ?>">
        <small class="text-danger"><?= $link ?? ""; ?></small>
    </div>
    <div class="form-check">
        <label class="form-check-label" for="flexCheckDefault"> </label>
        <input class="form-check-input" type="checkbox" value="discord" id="flexCheckDefault">
        Votre Avatar
    </div>
    <div class="mb-3 media-file-wrapper d-none w-25">
        <label for="media_file" class="form-label">Exportez votre média :</label>
        <input name="media_file" type="file" class="form-control" id="media_file">
        <small class="text-danger"><?= $media_file_error ?? ""; ?></small>
    </div>
    <br>

    <input type="hidden" name="id" value="<?= $team_id['id'] ?? ""; ?>">
    <?php

    ?>
    <button type="submit" class="btn btn-primary">Submit Team</button>
</form>

<table class="table table-dark table-striped w-75 mx-auto">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($teams as $team) : ?>
            <tr>
                <td><?= $team['nickname']; ?></td>
                <td><?= $team['role']; ?></td>
                <td>
                    <a href="?id=<?= $team['id']; ?>&a=edit" class="btn btn-outline-info">Modifier</a>
                    <a href="?id=<?= $team['id']; ?>&a=del" onclick="return confirm('Etes-vous sur ?')" class="btn btn-outline-danger">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>