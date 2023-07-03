<style>
    main {
        margin-top: 20vh;
    }
</style>
<?php 
require_once './config/function.php';
require_once './inc/formHeader.inc.php';




 /*Debut de mon controle de formulaie de team*/ 
 if (!empty($_POST)) {
    $error = false;

    if (empty($_POST['nickname'])) {
        $nickname='Le nom est obligatoire';
        $error = true;
     }
     if (empty($_POST ['role'])) {
        $role = 'Le role est obligatoire';
        $error = true;
     }
     
     if (!$error) {
        
        if (empty($_POST['id'])) {
            execute("INSERT INTO team (nickname, role) VALUES (:nickname, :role)", array(
                ':nickname' => $_POST['nickname'],
                ':role' => $_POST['role']
            ));
            header('location: ./formEquipe.php');
            exit();
        } else {
            execute("UPDATE team SET nickname = :nickname, role = :role WHERE id = :id" ,array(
                ":nickname"=> $_POST['nickname'],
                ":role" => $_POST['role'],
                ":id" => $_POST['id']
            ));
            header('location: ./formEquipe.php');
            exit(); 
        }
       
    }
 }
 $teams = execute ("SELECT * FROM team") -> fetchAll(PDO::FETCH_ASSOC);

if (!empty($_GET) && isset($_GET['id']) && isset($_GET['a']) && $_GET['a'] == 'edit') {
    $team_id = execute("SELECT * FROM team WHERE id = :id", array (
        ':id' =>$_GET['id']
    ))->fetch(PDO::FETCH_ASSOC);
}
if (!empty($_GET) && isset($_GET['id']) && isset($_GET['a']) && $_GET['a'] == 'del') {
    $team_id = execute("DELETE FROM team WHERE id = :id", array (
        ':id' => $_GET['id']
    ));
    header('location: ./formteam.php');
    exit();
}

?>

<!--Post de Media-->
<form class="mt-5 w-75 mx-auto" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="nickname" class="form-label">Nom  :</label>
        <input name="nickname" type="text" class="form-control" id="nickname" value="<?= $team_id['nickname'] ?? ""; ?>">
        <small class="text-danger"><?= $nickname ?? ""; ?></small>
    </div>
    <div class="mb-3">
        <label for="role" class="form-label">Role :</label>
        <input name="role" type="text" class="form-control" id="role" value="<?= $team_id['role'] ?? ""; ?>">
        <small class="text-danger"><?= $role ?? ""; ?></small>
    </div>
    <input type="hidden" name="id" value="<?= $team_id['id'] ?? ""; ?>">
    <button type="submit" class="btn btn-primary">Submit Team</button>
</form>

<table class="table table-dark table-striped w-75 mx-auto">
    <thead>
        <tr>
            <th>Nom</th>
            <th >Role</th>
            <th >Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($teams as $team) : ?>
        <tr>
            <td ><?= $team['nickname']; ?></td>
            <td ><?= $team['role']; ?></td>
            <td>
                <a href="?id=<?= $team['id']; ?>&a=edit" class="btn btn-outline-info">Modifier</a>
                <a href="?id=<?= $team['id']; ?>&a=del" onclick="return confirm('Etes-vous sur ?')" class="btn btn-outline-danger">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>