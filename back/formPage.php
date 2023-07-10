<style>
    main {
        margin-top: 20vh;
    }
</style>
<?php 
require_once '../config/function.php';
require_once '../inc/formHeader.inc.php';
?>

<h2 class="text-center">PAGES</h2>

<?php
 /*Debut de mon controle de formulaie de 'page'*/ 
 if (!empty($_POST)) {
    $error = false;

    if (empty($_POST['meta_title'])) {
        $meta_title='Le titre de la page est obligatoire';
        $error = true;
     }
     if (empty($_POST ['meta_description'])) {
        $meta_description = 'La meta_description est obligatoire';
        $error = true;
     }
     
     if (!$error) {
        
        if (empty($_POST['id'])) {
            execute("INSERT INTO page (meta_title, meta_description) VALUES (:meta_title, :meta_description)", array(
                ':meta_title' => $_POST['meta_title'],
                ':meta_description' => $_POST['meta_description']
            ));
            header('location: ./formPage.php');
            exit();
        } else {
            execute("UPDATE page SET meta_title = :meta_title, meta_description = :meta_description WHERE id = :id" ,array(
                ":meta_title"=> $_POST['meta_title'],
                ":meta_description" => $_POST['meta_description'],
                ":id" => $_POST['id']
            ));
            header('location: ./formPage.php');
            exit(); 
        }
       
    }
 }
 $pages = execute ("SELECT * FROM page") -> fetchAll(PDO::FETCH_ASSOC);

if (!empty($_GET) && isset($_GET['id']) && isset($_GET['a']) && $_GET['a'] == 'edit') {
    $page_id = execute("SELECT * FROM page WHERE id = :id", array (
        ':id' =>$_GET['id']
    ))->fetch(PDO::FETCH_ASSOC);
}
if (!empty($_GET) && isset($_GET['id']) && isset($_GET['a']) && $_GET['a'] == 'del') {
    $page_id = execute("DELETE FROM page WHERE id = :id", array (
        ':id' => $_GET['id']
    ));
    header('location: ./formPage.php');
    exit();
}

?>


<!--Post de Page-->
<form class="mt-5 w-75 mx-auto" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="meta_title" class="form-label">Nom de la page :</label>
        <input name="meta_title" type="text" class="form-control" id="meta_title" value="<?= $page_id['meta_title'] ?? ""; ?>">
        <small class="text-danger"><?= $meta_title ?? ""; ?></small>
    </div>
    <div class="mb-3">
        <label for="meta_description" class="form-label">Description de la page :</label>
        <input name="meta_description" type="text" class="form-control" id="meta_description" value="<?= $page_id['meta_description'] ?? ""; ?>">
        <small class="text-danger"><?= $meta_description ?? ""; ?></small>
    </div>
    <input type="hidden" name="id" value="<?= $page_id['id'] ?? ""; ?>">
    <button type="submit" class="btn btn-primary">Submit Page</button>
</form>

<table class="table table-dark table-striped w-75 mx-auto">
    <thead>
        <tr>
            <th>Titre</th>
            <th >Description</th>
            <th >Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pages as $page) : ?>
        <tr>
            <td ><?= $page['meta_title']; ?></td>
            <td ><?= $page['meta_description']; ?></td>
            <td>
                <a href="?id=<?= $page['id']; ?>&a=edit" class="btn btn-outline-info">Modifier</a>
                <a href="?id=<?= $page['id']; ?>&a=del" onclick="return confirm('Etes-vous sur ?')" class="btn btn-outline-danger">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>


