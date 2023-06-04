<?php 
require_once './config/function.php';
require_once './inc/header.inc.php';

 /*Debut de mon controle de formulaie de 'page'*/ 
 if (!empty($_POST)) {
    $error = false;

    if (empty($_POST['title'])) {
        $nickname='Le nom de la page est obligatoire';
        $error=true;
     }

     if (!$error) {
        $resultPost=execute("INSERT INTO media_type (title) VALUES (:title)", array(
            ':title'=>$_POST['title'],
        ),);
    }
 }
?>


<!--Post de Media_type-->
<form class="mt-5 w-75 mx-auto" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="mediaType" class="form-label">Type de media :</label>
        <input name="title" type="text" class="form-control" id="mediaType">
        <small class="text-danger"><?= $nickname ?? ""; ?></small>
    </div>
    <button type="submit" class="btn btn-primary">Submit Media_type</button>
</form>

