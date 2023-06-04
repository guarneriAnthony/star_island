<?php 
require_once './config/function.php';
require_once './inc/header.inc.php';

 /*Debut de mon controle de formulaie de 'page'*/ 
 if (!empty($_POST)) {
    $error = false;

    if (empty($_POST['meta_title'])) {
        $nickname='Le nom de la page est obligatoire';
        $error=true;
     }

     if (!$error) {
        $resultPost=execute("INSERT INTO page (meta_title) VALUES (:meta_title)", array(
            ':meta_title'=>$_POST['meta_title'],
        ), 'ggg');
    }
 }
?>


<!--Post de Page-->
<form class="mt-5 w-75 mx-auto" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="namePage" class="form-label">Nom / Titre de la page :</label>
        <input name="meta_title" type="text" class="form-control" id="namePage">
        <small class="text-danger"><?= $nickname ?? ""; ?></small>
    </div>
    <button type="submit" class="btn btn-primary">Submit Page</button>
</form>

