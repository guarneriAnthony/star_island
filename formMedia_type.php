<?php 
require_once './config/function.php';
require_once './inc/header.inc.php';

 /*Debut de mon controle de formulaie de 'page'*/ 
 if (!empty($_POST)) {
    $error = false;

    if (empty($_POST['name'])) {
        $mediaName='Le nom du media est obligatoire.';
        $error=true;
     }
     if (empty($_POST['link'])) {
        $link='Le Link du media est obligatoire';
        $error=true;
     }

     if (!$error) {
        execute("INSERT INTO media_type (name) VALUES (:name)", array(
            ':name'=>$_POST['name'],
        ),);
        execute("INSERT INTO media_type (link) VALUES (:link)", array(
            ':link'=>$_POST['link'],
        ),);
    }
 }
?>


<!--Post de Media_type-->
<form class="mt-5 w-75 mx-auto" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="Nom du media" class="form-label">Nom du media :</label>
        <input name="nameMedia" type="text" class="form-control" id="nameMedia">
        <small class="text-danger"><?= $mediaName ?? ""; ?></small>
    </div>
    <div class="mb-3">
        <label for="Link du media" class="form-label">Link du media :</label>
        <input name="linkMedia" type="text" class="form-control" id="linkMedia">
        <small class="text-danger"><?= $link ?? ""; ?></small>
    </div>
    <button type="submit" class="btn btn-primary">Submit Media_type</button>
</form>

