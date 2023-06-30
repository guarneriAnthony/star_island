<style>
    main {
        margin-top: 20vh;
    }
</style>
<?php
require_once './config/function.php';
require_once './inc/formHeader.inc.php';

/*Debut de mon controle de formulaie de 'page'*/
if (!empty($_POST)) {
    $error = false;

    if (empty($_POST['type'])) {
        $type = 'Le type est obligatoire.';
        $error = true;
    }
    if (!$error) {
        if (empty($_POST['id'])) {
            execute("INSERT INTO media_type (type) VALUES (:type)", array(
                ':type' => $_POST['type'],
            ),);
            header('location: ./formMedia_type.php');
            exit();
        } else {
            execute("UPDATE media_type SET type = :type WHERE id = :id", array(
                ":id" => $_POST['id'],
                ':type' => $_POST['type']
            ));
            header('location: ./formMedia_type.php');
            exit();
        }
    }
}

$media_types = execute("SELECT * FROM media_type")->fetchAll(PDO::FETCH_ASSOC);

if (!empty($_GET) && isset($_GET['id']) && isset($_GET['a']) && $_GET['a'] == 'edit') {
    $media_type_id = execute("SELECT * FROM media_type WHERE id = :id", array(
        ':id' => $_GET['id']
    ))->fetch(PDO::FETCH_ASSOC);
}
if (!empty($_GET) && isset($_GET['id']) && isset($_GET['a']) && $_GET['a'] == 'del') {
    $media_type_id = execute("DELETE FROM media_type WHERE id = :id", array(
        ':id' => $_GET['id']
    ));
    header('location: ./formMedia_type.php');
    exit();
}

?>


<!--Post de Media_type-->
<form class="mt-5 w-75 mx-auto" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="type" class="form-label">Type de media :</label>
        <input name="type" type="text" class="form-control" id="type" value="<?= $media_type_id['type'] ?? ''; ?>">
        <small class="text-danger"><?= $type ?? ""; ?></small>
    </div>
    <input type="hidden" name="id" value="<?= $media_type_id['id'] ?? ''; ?>">
    <button type="submit" class="btn btn-primary">Valider</button>
</form>

<table class="table table-dark table-striped w-75 mx-auto">
    <thead>
        <tr>
            <th>Type</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($media_types as $media_type) : ?>
            <tr>
                <td class="text-center"><?= $media_type['type']; ?></td>
                <td class="text-center">
                    <a href="?id=<?= $media_type['id']; ?>&a=edit" class="btn btn-outline-info">Modifier</a>
                    <a href="?id=<?= $media_type['id']; ?>&a=del" onclick="return confirm('Etes-vous sûr?')" class="btn btn-outline-danger">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>