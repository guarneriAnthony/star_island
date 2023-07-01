<style>
    main {
        margin-top: 20vh;
    }
</style>
<?php 
require_once './config/function.php';
require_once './inc/formHeader.inc.php';


$medias = execute("SELECT * FROM media")->fetchAll(PDO::FETCH_ASSOC);
$media_types = execute("SELECT * FROM media_type")->fetchAll(PDO::FETCH_ASSOC);
$mediaPages = execute("SELECT * FROM page")->fetchAll(PDO::FETCH_ASSOC);

/*$mediaPages = execute("SELECT m.*, p.* FROM media m INNER JOIN page p ON m.pages_id = p.id")->fetchAll(PDO::FETCH_ASSOC);*/

 /*Debut de mon controle de formulaie de 'media'*/ 
 if (!empty($_POST)) {
    $error = false;

    if (empty($_POST['name'])) {
        $name='Le titre du media est obligatoire';
        $error = true;
     }
     if (empty($_POST ['path'])) {
        $path = 'La path est obligatoire';
        $error = true;
     }
     
     if (!$error) {
        
        if (empty($_POST['id'])) {
            execute("INSERT INTO media (name, path, pages_id, media_type_id) VALUES (:name, :path, :pages_id, :media_type_id)", array(
                ':name' => $_POST['name'],
                ':path' => $_POST['path'],
                'pages_id' => $_POST['page_id'],
                'media_type_id' => $_POST['type_id']
            ));
            header('location: ./formmedia.php');
            exit();
        } else {
            execute("UPDATE media SET name = :name, path = :path WHERE id = :id" ,array(
                ":name"=> $_POST['name'],
                ":path" => $_POST['path'],
                ":id" => $_POST['id']
            ));
            header('location: ./formmedia.php');
            exit(); 
        }
       
    }
 }


if (!empty($_GET) && isset($_GET['id']) && isset($_GET['a']) && $_GET['a'] == 'edit') {
    $media_id = execute("SELECT * FROM media WHERE id = :id", array (
        ':id' =>$_GET['id']
    ))->fetch(PDO::FETCH_ASSOC);
}
if (!empty($_GET) && isset($_GET['id']) && isset($_GET['a']) && $_GET['a'] == 'del') {
    $media_id = execute("DELETE FROM media WHERE id = :id", array (
        ':id' => $_GET['id']
    ));
    header('location: ./formmedia.php');
    exit();
}
?>


<!--Post de media-->
<form class="mt-5 w-75 mx-auto" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="name" class="form-label">Titre du media :</label>
        <input name="name" type="text" class="form-control" id="name" value="<?= $media_id['name'] ?? ""; ?>">
        <small class="text-danger"><?= $name ?? ""; ?></small>
    </div>
    <div class="mb-3">
        <label for="path" class="form-label">path du media :</label>
        <input name="path" type="text" class="form-control" id="path" value="<?= $media_id['path'] ?? ""; ?>">
        <small class="text-danger"><?= $path ?? ""; ?></small>
    </div>
<label for="favoriteOnly">Pour quelle page est il :</label>
<select name="page_id" id="favoriteOnly">
    <?php foreach ($mediaPages as $media) : ?>
        <option value="<?= $media['id']; ?>"><?= $media['meta_title']; ?></option>
        <?php endforeach; ?>
</select></br></br>
<label for="favoriteOnly">Quelle est le type de media :</label>
<select name="type_id" id="favoriteOut">
    <?php foreach ($media_types as $mediaItem) : ?>
        <option value="<?= $mediaItem['id']; ?>"><?= $mediaItem['type']; ?></option>
        <?php endforeach; ?>
</select></br></br>
    <input type="hidden" name="id" value="<?= $media_id['id'] ?? ""; ?>">
    <button type="submit" class="btn btn-primary">Submit media</button>
</form>

<table class="table table-dark table-striped w-75 mx-auto">
    <thead>
        <tr>
            <th>Nom du media</th>
            <th >Path du media</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($medias as $media) : ?>
        <tr>
            <td ><?= $media['name']; ?></td>
            <td ><?= $media['path']; ?></td>
            <td>
                <a href="?id=<?= $media['id']; ?>&a=edit" class="btn btn-outline-info">Modifier</a>
                <a href="?id=<?= $media['id']; ?>&a=del" onclick="return confirm('Etes-vous sur ?')" class="btn btn-outline-danger">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>


/*La modification des id externe ne marche pas  */