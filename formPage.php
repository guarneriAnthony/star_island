<?php 
require_once './config/function.php';
require_once './inc/header.inc.php';

 /*Debut de mon controle de formulaie de 'page'*/ 
 if (!empty($_POST)) {
    $error = false;

    if (empty($_POST['title_page'])) {
        $nickname='Le nom de la page est obligatoire';
        $error=true;
     }

     if (!$error) {
        $resultPost=execute("INSERT INTO page (title_page) VALUES (:title_page)", array(
            ':title_page'=>$_POST['title_page'],
        ), 'ggg');
    }

    echo '<pre>';
var_dump($resultPost);
echo'</pre>';
 }
 



?>



<form class="mt-5 w-75 mx-auto" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="namePage" class="form-label">Nom / Titre de la page :</label>
        <input name="title_page" type="text" class="form-control" id="namePage">
        <small class="text-danger"><?= $nickname ?? ""; ?></small>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>