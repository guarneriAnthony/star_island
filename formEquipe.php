<style>
    main {
        margin-top: 20vh;
    }
    form input::placeholder {
        color: #000 !important;
        opacity: 0.5 !important;
    }
</style>
<?php 
require_once './config/function.php';
require_once './inc/formHeader.inc.php';

$team = execute("SELECT * FROM team") -> fetchAll(PDO::FETCH_ASSOC);
if (!empty($_POST)) {
    $error = false;

    if (empty($_POST['nickname'])) {
        $nickName = 'Le nom est obligatoire';
        $error = true;
        if (empty($_POST['role'])) {
            $role = 'Le role est obligatoire';
            $error = true;
        }
    }

    if (!$error) {
        execute("INSERT INTO team (nickname, role) VALUES (:nickname, :role)", array(
            ':nickname' => $_POST['nickname'],
            ':role' => $_POST['role']
        ),);
    }
}
?>

<!--Post de Media-->
<form class="mt-5 w-75 mx-auto" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="nickname" class="form-label">Nom :</label>
        <input name="nickname" type="text" class="form-control" id="nickname">
        <small class="text-danger"> <?=  $nickName ?? ""; ?> </small>
    </div>
    <div class="mb-3">
        <label for="role" class="form-label">Role :</label>
        <input name="role" type="text" class="form-control" id="role" placeholder="Admin,  Moderateur,  developpeur,  Mapper,  Helper">
        <small class="text-danger"> <?= $role ?? ""; ?> </small>
    </div>
    <button type="submit" class="btn btn-primary">Submite</button>
</form>

/*il manque le crud de team  */