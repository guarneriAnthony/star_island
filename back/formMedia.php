<style>
    main {
        margin-top: 20vh;
    }
    .media-file-wrapper {
        width: 30%;
    }
</style>
<?php
require_once '../config/function.php';
require_once '../inc/formHeader.inc.php';

$medias = execute("SELECT * FROM media")->fetchAll(PDO::FETCH_ASSOC);
$media_types = execute("SELECT * FROM media_type")->fetchAll(PDO::FETCH_ASSOC);
$mediaPages = execute("SELECT * FROM page")->fetchAll(PDO::FETCH_ASSOC);
/*$mediaPages = execute("SELECT m.*, p.* FROM media m INNER JOIN page p ON m.pages_id = p.id")->fetchAll(PDO::FETCH_ASSOC);*/

/*Début de mon contrôle de formulaire de 'media'*/
if (!empty($_POST)) {
    $error = false;

    if (empty($_POST['name'])) {
        $name = 'Le titre du média est obligatoire';
        $error = true;
    }

    if (!$error) {


        if (empty($_POST['media_file']) && !empty($_POST['link'])) {
            $media_path = $_POST['link'];
        } else {
            $media_file = $_FILES['media_file'];
            $media_path = 'upload/' . $media_file['name'];
            move_uploaded_file($media_file['tmp_name'], $media_path);
        }



        if (empty($_POST['id'])) {
            execute("INSERT INTO media (name, path, pages_id, media_type_id) VALUES (:name, :path, :pages_id, :media_type_id)", array(
                ':name' => $_POST['name'],
                ':path' => empty($_POST['media_link']) ? $media_path : $_POST['media_link'],
                'pages_id' => $_POST['page_id'],
                'media_type_id' => $_POST['type_id']

            ));
             header('location: ./formMedia.php');
             exit();
        } else {
            execute("UPDATE media SET name = :name, path = :path WHERE id = :id", array(
                ":name" => $_POST['name'],
                ":path" => empty($_POST['media_link']) ? $media_path : $_POST['media_link'],
                ":id" => $_POST['id']
            ));
        }
    }
}


if (!empty($_GET) && isset($_GET['id']) && isset($_GET['a']) && $_GET['a'] == 'edit') {
    $media_id = execute("SELECT * FROM media WHERE id = :id", array(
        ':id' => $_GET['id']
    ))->fetch(PDO::FETCH_ASSOC);
}
if (!empty($_GET) && isset($_GET['id']) && isset($_GET['a']) && $_GET['a'] == 'del') {
    $media_id = execute("DELETE FROM media WHERE id = :id", array(
        ':id' => $_GET['id']
    ));
                          
    header('location: ./formMedia.php');
    exit();
}
?>


<!--Formulaire de média-->
<form class="mt-5 w-75 mx-auto" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="name" class="form-label">Nom du média :</label>
        <input name="name" type="text" class="form-control" id="name" value="<?= $media_id['name'] ?? ""; ?>">
        <small class="text-danger"><?= $name ?? ""; ?></small>
    </div>
    <div class="mb-3">
        <label for="link" class="form-label">Lien du média :</label>
        <input name="link" type="text" class="form-control" id="link" value="<?= $media_id['link'] ?? ""; ?>">
        <small class="text-danger"><?= $link ?? ""; ?></small>
    </div>
    <div class="mb-3 media-file-wrapper">
        <label for="media_file" class="form-label">Exportez votre média :</label>
        <input name="media_file" type="file" class="form-control" id="media_file">
        <small class="text-danger"><?= $media_file_error ?? ""; ?></small>
    </div>
    
    <label for="page_id">Pour quelle page est-il :</label><br><br>
    <select name="page_id" id="page_id">
        <?php foreach ($mediaPages as $media) : ?>
            <option value="<?= $media['id']; ?>"><?= $media['meta_title']; ?></option>
        <?php endforeach; ?>
    </select><br><br>
    <label for="type_id">Quel est le type de média :</label><br><br>
    <select name="type_id" id="type_id">
        <?php foreach ($media_types as $mediaType) : ?>
            <option value="<?= $mediaType['id']; ?>"><?= $mediaType['type']; ?></option>
        <?php endforeach; ?>
    </select><br><br>
    <input type="hidden" name="id" value="<?= $media_id['id'] ?? ""; ?>">
    <button type="submit" class="btn btn-primary">Soumettre le média</button>
</form>

<table class="table table-dark table-striped w-75 mx-auto">
    <thead>
        <tr>
            <th>Nom du média</th>
            <th>Path du média</th>
            <th>Lien / image</th>
            <th >Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($medias as $media) : ?>
            <tr>
                <td><?= $media['name']; ?></td>
                <td><?= $media['path']; ?></td>
                <td>
                    <?php
                    $extension = pathinfo($media['path'], PATHINFO_EXTENSION);
                    if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
                        echo '<img src="' . $media['path'] . '" alt="' . $media['name'] . '" width="200">';
                    } else if ($extension == 'link') {
                        echo '<a href="' . $media['path'] . '">' . $media['name'] . '</a>';
                    } else {
                        echo $media['path'];
                    }
                    ?>
                </td>
                <td>
                    <a href="?id=<?= $media['id']; ?>&a=edit" class="btn btn-outline-info">Modifier</a>
                    <a href="?id=<?= $media['id']; ?>&a=del" onclick="return confirm('Êtes-vous sûr ?')" class="btn btn-outline-danger">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


si team media, supprimer dans team media
