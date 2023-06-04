<?php 
require_once './config/function.php';
require_once './inc/header.inc.php';

 /*Debut de mon controle de formulaie de 'page'*/ 
 if (!empty($_POST)) {
    $error = false;

    if (empty($_POST['name'])) {
        $mediaName = 'Le nom du media est obligatoire';
        $error = true;
        if (empty($_POST['link'])) {
            $link = 'Le link est obligatoire';
            $error = true;
        }
     }


/* Je doit rajouter le page_id et voir commetn on gerer les img qui sont un varchar dans la bdd*/
     if (!$error) {
        $resultPost=execute("INSERT INTO media (name, link) VALUES (:name, :link)", array(
            ':name'=>$_POST['name'],
            ':link' =>$_POST['link']
        ),);
    }
 }
?>


<!--Post de Media-->
<form class="mt-5 w-75 mx-auto" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="mediaName" class="form-label">Nom de media :</label>
        <input name="name" type="text" class="form-control" id="mediaName">
        <small class="text-danger"><?= $mediaName  ?? ""; ?></small>
    </div>
    <!-- JE doit changer le type de input pour mettre une selection dimage ? -->
    <div class="mb-3">
        <label for="linkName" class="form-label">type du link :</label>
        <input name="link" type="text" class="form-control" id="linkName">
        <small class="text-danger"><?= $link  ?? ""; ?></small>
    </div>
    <button type="submit" class="btn btn-primary">Submit Name</button>
</form>

