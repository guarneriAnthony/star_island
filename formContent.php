<style>
    main {
        margin-top: 20vh;
    }
</style>
<?php
require_once './config/function.php';
require_once './inc/formHeader.inc.php';


$pages = execute("SELECT * FROM page")->fetchAll(PDO::FETCH_ASSOC);
$contentPages = execute("SELECT c.*, p.meta_title FROM content c INNER JOIN page p ON c.page_id = p.id")->fetchAll(PDO::FETCH_ASSOC);


/*Debut de mon controle de formselectaie de 'content'*/
if (!empty($_POST)) {
    $error = false;

    if (empty($_POST['title'])) {
        $title = 'Le titre du content est obligatoire';
        $error = true;
    }
    if (empty($_POST['description'])) {
        $description = 'La description est obligatoire';
        $error = true;
    }

    if (!$error) {

        if (empty($_POST['id'])) {
            $lastContent = execute("INSERT INTO content (title, description,page_id) VALUES (:title, :description, :page_id)", array(
                ':title' => $_POST['title'],
                ':description' => $_POST['description'],
                'page_id' => $_POST['page_id']
            ), ' ');
            // execute("INSERT INTO event_content (event_id, content_id) VALUES (:event_id, :content_id)", array (
            //     ':event_id'=>
            //     ':content_id'=> $lastContent
            // ));
            // header('location: ./formContent.php');
            // exit();
        } else {
            execute("UPDATE content SET title = :title, description = :description, page_id = :page_id WHERE id = :id", array(
                ":title" => $_POST['title'],
                ":description" => $_POST['description'],
                ":id" => $_POST['id'],
                ':page_id' => $_POST['page_id']
            ));
            header('location: ./formContent.php');
            exit();
        }
    }
}


if (!empty($_GET) && isset($_GET['id']) && isset($_GET['a']) && $_GET['a'] == 'edit') {
    $content_id = execute("SELECT * FROM content WHERE id = :id", array(
        ':id' => $_GET['id']
    ))->fetch(PDO::FETCH_ASSOC);
}
if (!empty($_GET) && isset($_GET['id']) && isset($_GET['a']) && $_GET['a'] == 'del') {
    $content_id = execute("DELETE FROM content WHERE id = :id", array(
        ':id' => $_GET['id']
    ));
    header('location: ./formcontent.php');
    exit();
}
?>


<!--Post de content-->
<form class="mt-5 w-75 mx-auto" method="post" enctype="mselecttipart/form-data">
    <div class="mb-3">
        <label for="title" class="form-label">Nom du content :</label>
        <input name="title" type="text" class="form-control" id="title" value="<?= $content_id['title'] ?? ""; ?>">
        <small class="text-danger"><?= $title ?? ""; ?></small>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description du content :</label>
        <input name="description" type="text" class="form-control" id="description" value="<?= $content_id['description'] ?? ""; ?>">
        <small class="text-danger"><?= $description ?? ""; ?></small>
    </div>
    <label for="page_id">Pour quelle page est il :</label>
    <select name="page_id" id="page_id">
        <?php foreach ($pages as $page) : ?>
            <option <?php
                    if (!empty($content_id['page_id']) && $page['id'] === $content_id['page_id']) {
                        echo 'selected';
                    }
                    ?> value="<?= $page['id']; ?>"><?= $page['meta_title']; ?>
            </option>
        <?php endforeach; ?>
    </select></br></br>
    <input type="hidden" name="id" value="<?= $content_id['id'] ?? ""; ?>">
    <button type="submit" class="btn btn-primary">Submit content</button>
</form>

<table class="table table-dark table-striped w-75 mx-auto">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($contentPages as $contentPage) : ?>
            <tr>
                <td><?= $contentPage['title']; ?></td>
                <td><?= $contentPage['meta_title']; ?></td>
                <td><?= $contentPage['description']; ?></td>
                <td>
                    <a href="?id=<?= $contentPage['id']; ?>&a=edit" class="btn btn-outline-info">Modifier</a>
                    <a href="?id=<?= $contentPage['id']; ?>&a=del" onclick="return confirm('Etes-vous sur ?')" class="btn btn-outline-danger">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>