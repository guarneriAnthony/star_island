<?php 
require_once '../config/function.php';
require_once '../inc/header.inc.php';

if (!empty($_POST)) {
$error=false;

    if (empty($_POST['vendeur'])) {
        $vendeur = "Le nom du vendeur est obligatoire";
        $error = true;
    }else {
        if (strlen($_POST['vendeur']) < 2 || strlen($_POST['vendeur']) > 20) {
            $vendeur = "Le nom du vendeur doit être compris entre 2 et 20 caractères";
            $error = true;
        }
    }

    if (empty($_POST['telephone'])) {
        $telephone = "Le numero de télephone est obligatoire";
        $error = true;
    } else {
        if (strlen($_POST['telephone']) < 1 and strlen($_POST['telephone']) > 10) {
            $telephone = "Le numero de télephone doit avoir 10 chiffres";
            $error = true;
        }
    }

    if (empty($_POST['annonce'])) {
        $annonce = "La description est obligatoire";
        $error = true;
    } else {
        if (strlen($_POST['annonce']) < 2 || strlen($_POST['annonce']) > 200) {
            $annonce = "La description doit être compris entre 2 et 200 caractères";
            $error = true;
        }
    }

    if (!$error) {
        $inserForm = execute("INSERT INTO vendeurs (vendeur, telephone, annonce) VALUES(:vendeur, :telephone, :annonce)", array(
            ':vendeur' => $_POST['vendeur'],
            ':telephone' => $_POST['telephone'],
            ':annonce' => $_POST['annonce']
        ), 'ggg');
    }
}

?>
<h2>Déposez votre annonce :</h2>
<form class="mt-5 w-75 mx-auto" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="vendeur" class="form-label">Nom :</label>
        <input name="vendeur" type="text" class="form-control" id="vendeur">
        <small class="text-danger"><?= $vendeur ?? ""; ?></small>
    </div>
    <div class="mb-3">
        <label for="telephone" class="form-label">Telephone :</label>
        <input name="telephone" type="tel" class="form-control" id="telephone"
         pattern="[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}">
        <small class="text-danger"><?= $telephone ?? ""; ?></small>
    </div>
    <br><br>
    <div class="mb-3">
        <label for="annonce" class="form-label">Annonce :</label>
        <input name="annonce" type="text" class="form-control" id="annonce" >
        <small class="text-danger"><?= $annonce ?? ""; ?></small>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>



<?php 
require_once '../inc/footer.inc.php';
?>