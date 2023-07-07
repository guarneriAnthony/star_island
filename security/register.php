<?php require_once '../config/function.php';
require_once '../inc/formHeader.inc.php';
?>


<?php
if (!empty($_POST)) {
$error=false;

    if (empty($_POST['email'])) {
         $email='Email obligatoire';
         $error=true;
    }else{
        $sql = "SELECT * 
        FROM user 
        WHERE email = :email";
        $user=execute($sql,array(
               ':email'=>$_POST['email']
        ));

        if ($user->rowCount() == 0){
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                $email='Format invalide';
                $error=true;
            }
        }else{ 
            $unique_email='<div class="alert alert-danger w-50 mx-auto mt-5">Un compte existe à cette adresse mail, procédez à une demande de réinitialisation de mot de passe</div>';
            $error=true;
        }
    }


    if (empty($_POST['password'])) {
         $password='Mot de passe obligatoire';
         $error=true;
    }else{
        if (!password_strength_check($_POST['password'])){            
            $password='Votre mot de passe doit contenir entre 6 et 15 caractères dont au minimum une minuscule, une majuscule, un caractère numérique et un caractère spécial';
            $error=true;
        }
    }


    
    $mdp = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO user (email, password) VALUES (:email, :password)";
    $result = execute($sql, array(
          ':email'=> $_POST['email'],
          ':password'=> $mdp
        ),);   
}
?>

<?=  $unique_email ?? ""; ?>
<form class="mt-5 w-75 mx-auto" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input name="email" type="text" class="form-control" id="email" aria-describedby="emailHelp">
        <small class="text-danger"><?= $email ?? ""; ?></small>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <input name="password" type="password" class="form-control" id="password">
        <small class="text-danger"><?= $password  ?? ""; ?></small>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>


<link rel="stylesheet" href="../css/style_register.css">