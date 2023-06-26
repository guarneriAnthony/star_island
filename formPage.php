<?php 
require_once './config/function.php';


$pages = execute ("SELECT * FROM page") -> fetchAll(PDO::FETCH_ASSOC);
$contents = execute ("SELECT * FROM content") -> fetchAll(PDO:: FETCH_ASSOC);

 /*Debut de mon controle de formulaie de 'page'*/ 
 if (!empty($_POST)) {
    $error = false;

    if (empty($_POST['meta_title'])) {
        $namePage='Le nom / titre de la page est obligatoire';
        $error=true;
     }

     if (!$error) {
        execute("INSERT INTO page (meta_title) VALUES (:meta_title)", array(
            ':meta_title' => $_POST['meta_title']
        ));
    }
 }
?>


<!--Post de Page-->
<form class="mt-5 w-75 mx-auto" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="namePage" class="form-label">Nom de la page :</label>
        <input name="meta_title" type="text" class="form-control" id="namePage">
        <small class="text-danger"><?= $namePage ?? ""; ?></small>
    </div>
    <button type="submit" class="btn btn-primary">Submit Page</button>
</form>


<div>
    <?php if (!empty($pages) && (!empty($contents))) : ?>
        <?php $lastPage = end($pages);?>
        <p><?= $lastPage['meta_title'] ?></p>
    <?php endif; ?>
</div>
